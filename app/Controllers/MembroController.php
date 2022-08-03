<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MembroCapacitacaoModel;
use App\Models\MembroHistoricoModel;
use App\Models\MembroModel;
use App\Models\PessoaModel;
use App\Models\ProfissaoModel;
use App\Models\TipoMembroModel;
use DateTime;
use Exception;

class MembroController extends BaseController
{

    private $route = 'membro';
    private $titlePage = 'Membresia';
    private $dirView = 'Membro';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new MembroModel();
        $data['registros'] = $model
            ->select("Pessoa.*, Membro.numeroRolPermanente, Membro.dataRecepcao dataRecepcao")
            ->join("Pessoa", "Pessoa.id = Membro.pessoaId", "left")
            ->where("Membro.instituicaoId", $this->instituicao["id"])
            ->where("Membro.situacao <>", 5)
            ->where("Pessoa.isAtivo", true)
            ->orderBy('Pessoa.nome', 'ASC');

        //caso seja necessário pesquisar por nome
        if ($this->request->getGet("nome"))
            $data['registros'] = $data['registros']->like('Pessoa.nome', $this->request->getGet("nome"));

        $data['registros']  =  $data['registros']->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;

        return view($this->dirView . '/list', $data);
    }

    public function new()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;

        $data["EstadoCivil"] = [
            ["id" => 1, "nome" => "Solteiro"],
            ["id" => 2, "nome" => "Casado"],
            ["id" => 3, "nome" => "Viuvo"],
            ["id" => 4, "nome" => "Divorciado"],
            ["id" => 5, "nome" => "União Estavel"],
        ];


        $data["Situacao"] = [
            ["id" => 1, "nome" => "Ativo"],
            ["id" => 2, "nome" => "Disciplinado"],
            ["id" => 3, "nome" => "Desligado"],
            //["id" => 4, "nome" => "Desligado"],
            ["id" => 5, "nome" => "Em transferência"],
            ["id" => 6, "nome" => "Transferência Cancelada"],
        ];

        $data["TipoPessoa"] = [
            ["id" => 1, "nome" => "Membro"],
            ["id" => 2, "nome" => "Congregado"],
        ];

        $data["MotivoExclusao"] = [
            ["id" => 1, "nome" => "I - A pedido"],
            ["id" => 2, "nome" => "II - Abandono"],
            ["id" => 3, "nome" => "III - Falecimento"],
            ["id" => 4, "nome" => "IV - Justa Causa"],
            ["id" => 5, "nome" => "V - Divórcio"],
        ];

        $data["Escolaridade"] = [
            ["id" => 1, "nome" => "Sem Instrução"],
            ["id" => 2, "nome" => "Fundamental"],
            ["id" => 3, "nome" => "Ensino Médio"],
            ["id" => 4, "nome" => "Superior"],
            ["id" => 5, "nome" => "Especialista"],
            ["id" => 6, "nome" => "Mestre"],
            ["id" => 7, "nome" => "Doutor"],
            ["id" => 8, "nome" => "Pós-Doutor"],
        ];

        $data["Paises"] = $this->getPaises();

        $profissaoModel = new ProfissaoModel();
        $data["Profissao"] = $profissaoModel->findAll();



        return view($this->dirView . '/new', $data);
    }

    private function getDadosPessoa()
    {

        $data["nome"] = $this->request->getPost("nome");

        if ($this->request->getPost('dataNascimento') != "") {
            $dataAdmisao = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataNascimento'));
            $data["dataNascimento"] = date_format($dataAdmisao, "Y-m-d");
        }

        $data["cpf"] = preg_replace('/[^0-9]/', '', $this->request->getPost("cpf"));
        $data["email"] = $this->request->getPost("email");

        $data["estadoCivil"] = $this->request->getPost("estadoCivil");
        $data["nomeConjuge"] = $this->request->getPost("nomeConjuge");
        $data["nomePai"] = $this->request->getPost("nomePai");
        $data["nomeMae"] = $this->request->getPost("nomeMae");
        $data["profissaoId"] = $this->request->getPost("profissaoId");
        $data["escolaridadeId"] = $this->request->getPost("escolaridadeId");


        $data["cep"] = $this->request->getPost("cep");
        $data["endereco"] = $this->request->getPost("endereco");
        $data["numero"] = $this->request->getPost("numero");
        $data["complemento"] = $this->request->getPost("complemento");
        $data["bairro"] = $this->request->getPost("bairro");
        $data["cidade"] = $this->request->getPost("cidade");
        $data["estado"] = $this->request->getPost("estado");
        $data["pais"] = $this->request->getPost("pais");
        $data["telefone"] = $this->request->getPost("telefone");
        $data["celular"] = $this->request->getPost("celular");
        $data["filhos"] = $this->request->getPost("filhos");
        $data["tipoPessoa"] = $this->request->getPost("tipoPessoa");
        $data["instituicaoId"] = $this->instituicao["id"];

        $img = $this->request->getFile('foto');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/Pessoa/', $newName);
            $data["foto"] = $newName;
        }
        
        $img = $this->request->getFile('formularioLgpd');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/FormularioLgpd/', $newName);
            $data["formularioLgpd"] = $newName;
        }


        // $data["isAtivo"] = ($this->request->getPost("isAtivo") != null) ? 1 : 0;
        // if ($this->request->getPost('dataInativo') != "") {
        //     $dataInativo = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataInativo'));
        //     $data["dataInativo"] = date_format($dataInativo, "Y-m-d");
        // }

        return $data;
    }

    private function getDadosMembro()
    {
        $data["pessoaId"] = $this->request->getPost("pessoaId");
        $data["numeroRolPermanente"] = $this->request->getPost("numeroRolPermanente");
        $data["anoConversao"] = $this->request->getPost("anoConversao");

        if ($this->request->getPost('dataBatismo') != "") {
            $dataBatismo = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataBatismo'));
            $data["dataBatismo"] = date_format($dataBatismo, "Y-m-d");
        }

        if ($this->request->getPost('dataRecepcao') != "") {
            $dataRecepcao = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataRecepcao'));
            $data["dataRecepcao"] = date_format($dataRecepcao, "Y-m-d");
        }

        $data["situacao"] = $this->request->getPost("situacao");
        $data["motivoExclusaoId"] = $this->request->getPost("motivoExclusaoId");

        $data["instituicaoId"] = $this->instituicao["id"];

        if ($this->request->getPost('dataSaida') != "") {
            $dataSaida = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataSaida'));
            $data["dataSaida"] = date_format($dataSaida, "Y-m-d");
        }

        return $data;
    }

    private function getValidator()
    {

        return $this->validate([
            'anoConversao' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Campo obrigatório',
                ]
            ],
            'dataBatismo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Campo obrigatório',
                ]
            ],
            'dataRecepcao' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Campo obrigatório',
                ]
            ],
            'situacao' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Campo obrigatório',
                ]
            ],
        ]);
    }


    public function create()
    {
        helper(['form', 'url']);

        $pessoaModel = new PessoaModel();
        $dataPessoa = $this->getDadosPessoa();
        $dataPessoa["isAtivo"] = 1;
        $dataPessoa["created_by"] = $this->usuario["id"];

        $model = new MembroModel();
        $dataMembro = $this->getDadosMembro();
        $dataMembro["created_by"] = $this->usuario["id"];


        try {
            $idPessoa = null;

            $idMembro = null;

            //
            // cadastro de membros
            //
            if ($dataPessoa["tipoPessoa"] == 1) {

                //
                // testando a validação
                //
                $idPessoa = $pessoaModel->insert($dataPessoa);
                $dataMembro["pessoaId"] = $idPessoa;

                //
                //buscar numero do rol permanente
                //
                $ultimaPessoa = $model->where("instituicaoId", $this->instituicao["id"])->orderby("numeroRolPermanente", "desc")->first();
                if ($ultimaPessoa != null) {
                    $dataMembro["numeroRolPermanente"] = $ultimaPessoa["numeroRolPermanente"] + 1;
                } else {
                    $dataMembro["numeroRolPermanente"] = 1;
                }

                $idMembro = $model->insert($dataMembro);

                //
                // testa se o membro foi inserido com sucesso.
                //

                if ($idMembro != null) {
                    return redirect()->to(base_url($this->route . "/" . $idMembro  . "?msg=Membro cadastrado com Sucesso!"));
                } else {
                    return redirect()->to(base_url($this->route . "?erro=Houve uma falha ao salvar."));
                }
            } else {

                //
                //cadastro do congregado
                //

                $idPessoa = $pessoaModel->insert($dataPessoa);

                //
                // testa se a pessoa/congregado foi inserida com sucesso.
                //

                if ($idPessoa != null) {
                    return redirect()->to(base_url($this->route . "/" . $idPessoa  . "?msg=Congregado cadastrado com Sucesso!"));
                } else {
                    return redirect()->to(base_url($this->route . "?erro=Houve uma falha ao salvar."));
                }
            }
        } catch (Exception $ex) {
            return redirect()->to(base_url($this->route . "?erro=" . $ex->getMessage()));
        }
    }


    public function edit($id = null)
    {
        helper(['form', 'url']);
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;

        if ($this->request->getGet("tipo") == null){

        $model = new MembroModel();
        $data['entidade'] = $model
            ->select("Pessoa.*, Membro.pessoaId, Membro.numeroRolPermanente, Membro.anoConversao, Membro.dataBatismo, Membro.dataRecepcao, Membro.situacao, Membro.dataSaida, Membro.motivoExclusaoId")
            ->join("Pessoa", "Pessoa.id = Membro.pessoaId")
            ->find($id);

        }
        else {
            
            $model = new PessoaModel();
            $data['entidade'] = $model
            ->select("Pessoa.*, Membro.pessoaId, Membro.numeroRolPermanente, Membro.anoConversao, Membro.dataBatismo, Membro.dataRecepcao, Membro.situacao, Membro.dataSaida, Membro.motivoExclusaoId")
            ->join("Membro", "Pessoa.id = Membro.pessoaId", "left")
            ->find($id);
        }


        $data["EstadoCivil"] = [
            ["id" => 1, "nome" => "Solteiro"],
            ["id" => 2, "nome" => "Casado"],
            ["id" => 3, "nome" => "Viuvo"],
            ["id" => 4, "nome" => "Divorciado"],
            ["id" => 5, "nome" => "União Estavel"],
        ];

        $data["Situacao"] = [
            ["id" => 1, "nome" => "Ativo"],
            ["id" => 2, "nome" => "Disciplinado"],
            ["id" => 3, "nome" => "Desligado"],
            //["id" => 4, "nome" => "Desligado"],
            ["id" => 5, "nome" => "Em transferência"],
            ["id" => 6, "nome" => "Transferência Cancelada"],
        ];

        $data["TipoPessoa"] = [
            ["id" => 1, "nome" => "Membro"],
            ["id" => 2, "nome" => "Congregado"],
        ];

        $data["Escolaridade"] = [
            ["id" => 1, "nome" => "Sem Instrução"],
            ["id" => 2, "nome" => "Fundamental"],
            ["id" => 3, "nome" => "Ensino Médio"],
            ["id" => 4, "nome" => "Superior"],
            ["id" => 5, "nome" => "Especialista"],
            ["id" => 6, "nome" => "Mestre"],
            ["id" => 7, "nome" => "Doutor"],
            ["id" => 8, "nome" => "Pós-Doutor"],
        ];

        $data["MotivoExclusao"] = [
            ["id" => 1, "nome" => "I - A pedido"],
            ["id" => 2, "nome" => "II - Abandono"],
            ["id" => 3, "nome" => "III - Falecimento"],
            ["id" => 4, "nome" => "IV - Justa Causa"],
            ["id" => 5, "nome" => "V - Divórcio"],
        ];

        $data["Paises"] = $this->getPaises();

        $profissaoModel = new ProfissaoModel();
        $data["Profissao"] = $profissaoModel->findAll();


        //historico
        $historicoModel = new MembroHistoricoModel();
        $data["MembroHistorico"] = $historicoModel
            ->select("MembroHistorico.*, origem.nome origemNome, destino.nome destinoNome")
            ->join("Instituicao origem", "origem.id = MembroHistorico.instituicaoOrigemId")
            ->join("Instituicao destino", "destino.id = MembroHistorico.instituicaoDestinoId")
            ->where("MembroHistorico.membroId", $id)->findAll();

        //Capacitacao
        $capacitacaoModel = new MembroCapacitacaoModel();
        $data["MembroCapacitacao"] = $capacitacaoModel->where("membroId", $id)->orderBy("dataCapacitacao")->findAll();

        return view($this->dirView . '/edit', $data);
    }

    public function update($id = null)
    {
        $membroModel = new MembroModel();
        $dataMembro = $this->getDadosMembro();
        $dataMembro["updated_by"] = $this->usuario["id"];

        $pessoaModel = new PessoaModel();
        $dataPessoa = $this->getDadosPessoa();
        $dataPessoa["updated_by"] = $this->usuario["id"];

        try {

            $idPessoa = null;

            $idMembro = null;

            //
            // alterar o cadastro de membros
            //
            if ($dataPessoa["tipoPessoa"] == 1) {


                $pessoaModel->update($dataMembro["pessoaId"], $dataPessoa);
                $membroModel->update($id, $dataMembro);

                if (true) {
                    return redirect()->to(base_url($this->route . "?msg=Cadastro do Membro alterado com Sucesso!"));
                } else {
                    return redirect()->to(base_url($this->route . "?erro=Houve uma falha ao alterar."));
                }
            } else {
                //
                // caso seja congregado
                //
                $pessoaModel->update($dataMembro["pessoaId"], $dataPessoa);

                if (true) {
                    return redirect()->to(base_url($this->route . "?msg=Cadastro do Congreagdo alterado com Sucesso!"));
                } else {
                    return redirect()->to(base_url($this->route . "?erro=Houve uma falha ao alterar."));
                }

            }
        } catch (Exception $ex) {
            return redirect()->to(base_url($this->route . "?erro=" . $ex->getMessage()));
        }
    }


    public function delete($id = null)
    {

        $membroModel = new MembroModel();
        $dataMembro = $membroModel->find($id);
        $dataMembro["situacao"] = 5;
        $dataMembro["updated_by"] = $this->usuario["id"];

        $pessoaModel = new PessoaModel();
        $dataPessoa = $pessoaModel->find($dataMembro["pessoaId"]);
        $dataPessoa["isAtivo"] = 0;
        $dataPessoa["dataInativo"] = date("Y-m-d H:i:s");
        $dataPessoa["updated_by"] = $this->usuario["id"];

        try {

            $membroModel->update($id, $dataMembro);
            $pessoaModel->update($dataMembro["pessoaId"], $dataPessoa);

            if (true) {
                return redirect()->to(base_url($this->route . "?msg=Cadastro alterado com Sucesso!"));
            } else {
                return redirect()->to(base_url($this->route . "?erro=Houve uma falha ao alterar."));
            }
        } catch (Exception $ex) {
            return redirect()->to(base_url($this->route . "?erro=" . $ex->getMessage()));
        }


        $model = new MembroModel();

        try {

            if ($model->delete($id)) {
                return redirect()->to(base_url($this->route . "?msg=Cadastro removido com Sucesso!"));
            } else {
                return redirect()->to(base_url($this->route . "?erro=Houve uma falha ao remover."));
            }
        } catch (Exception $ex) {
            return redirect()->to(base_url($this->route . "?erro=" . $ex->getMessage()));
        }
    }

    private function getPaises()
    {
        return array(
            0 =>
            array(
                'id' => 1,
                'nome' => 'Afeganistão',
                'sigla2' => 'AF',
                'sigla3' => 'AFG',
                'codigo' => '004',
            ),
            1 =>
            array(
                'id' => 2,
                'nome' => 'África do Sul',
                'sigla2' => 'ZA',
                'sigla3' => 'ZAF',
                'codigo' => '710',
            ),
            2 =>
            array(
                'id' => 3,
                'nome' => 'Albânia',
                'sigla2' => 'AL',
                'sigla3' => 'ALB',
                'codigo' => '008',
            ),
            3 =>
            array(
                'id' => 4,
                'nome' => 'Alemanha',
                'sigla2' => 'DE',
                'sigla3' => 'DEU',
                'codigo' => '276',
            ),
            4 =>
            array(
                'id' => 5,
                'nome' => 'Andorra',
                'sigla2' => 'AD',
                'sigla3' => 'AND',
                'codigo' => '020',
            ),
            5 =>
            array(
                'id' => 6,
                'nome' => 'Angola',
                'sigla2' => 'AO',
                'sigla3' => 'AGO',
                'codigo' => '024',
            ),
            6 =>
            array(
                'id' => 7,
                'nome' => 'Anguilla',
                'sigla2' => 'AI',
                'sigla3' => 'AIA',
                'codigo' => '660',
            ),
            7 =>
            array(
                'id' => 8,
                'nome' => 'Antártida',
                'sigla2' => 'AQ',
                'sigla3' => 'ATA',
                'codigo' => '010',
            ),
            8 =>
            array(
                'id' => 9,
                'nome' => 'Antígua e Barbuda',
                'sigla2' => 'AG',
                'sigla3' => 'ATG',
                'codigo' => '028',
            ),
            9 =>
            array(
                'id' => 10,
                'nome' => 'Antilhas Holandesas',
                'sigla2' => 'AN',
                'sigla3' => 'ANT',
                'codigo' => '530',
            ),
            10 =>
            array(
                'id' => 11,
                'nome' => 'Arábia Saudita',
                'sigla2' => 'SA',
                'sigla3' => 'SAU',
                'codigo' => '682',
            ),
            11 =>
            array(
                'id' => 12,
                'nome' => 'Argélia',
                'sigla2' => 'DZ',
                'sigla3' => 'DZA',
                'codigo' => '012',
            ),
            12 =>
            array(
                'id' => 13,
                'nome' => 'Argentina',
                'sigla2' => 'AR',
                'sigla3' => 'ARG',
                'codigo' => '032',
            ),
            13 =>
            array(
                'id' => 14,
                'nome' => 'Armênia',
                'sigla2' => 'AM',
                'sigla3' => 'ARM',
                'codigo' => '51',
            ),
            14 =>
            array(
                'id' => 15,
                'nome' => 'Aruba',
                'sigla2' => 'AW',
                'sigla3' => 'ABW',
                'codigo' => '533',
            ),
            15 =>
            array(
                'id' => 16,
                'nome' => 'Austrália',
                'sigla2' => 'AU',
                'sigla3' => 'AUS',
                'codigo' => '036',
            ),
            16 =>
            array(
                'id' => 17,
                'nome' => 'Áustria',
                'sigla2' => 'AT',
                'sigla3' => 'AUT',
                'codigo' => '040',
            ),
            17 =>
            array(
                'id' => 18,
                'nome' => 'Azerbaijão',
                'sigla2' => 'AZ  ',
                'sigla3' => 'AZE',
                'codigo' => '31',
            ),
            18 =>
            array(
                'id' => 19,
                'nome' => 'Bahamas',
                'sigla2' => 'BS',
                'sigla3' => 'BHS',
                'codigo' => '044',
            ),
            19 =>
            array(
                'id' => 20,
                'nome' => 'Bahrein',
                'sigla2' => 'BH',
                'sigla3' => 'BHR',
                'codigo' => '048',
            ),
            20 =>
            array(
                'id' => 21,
                'nome' => 'Bangladesh',
                'sigla2' => 'BD',
                'sigla3' => 'BGD',
                'codigo' => '050',
            ),
            21 =>
            array(
                'id' => 22,
                'nome' => 'Barbados',
                'sigla2' => 'BB',
                'sigla3' => 'BRB',
                'codigo' => '052',
            ),
            22 =>
            array(
                'id' => 23,
                'nome' => 'Belarus',
                'sigla2' => 'BY',
                'sigla3' => 'BLR',
                'codigo' => '112',
            ),
            23 =>
            array(
                'id' => 24,
                'nome' => 'Bélgica',
                'sigla2' => 'BE',
                'sigla3' => 'BEL',
                'codigo' => '056',
            ),
            24 =>
            array(
                'id' => 25,
                'nome' => 'Belize',
                'sigla2' => 'BZ',
                'sigla3' => 'BLZ',
                'codigo' => '084',
            ),
            25 =>
            array(
                'id' => 26,
                'nome' => 'Benin',
                'sigla2' => 'BJ',
                'sigla3' => 'BEN',
                'codigo' => '204',
            ),
            26 =>
            array(
                'id' => 27,
                'nome' => 'Bermudas',
                'sigla2' => 'BM',
                'sigla3' => 'BMU',
                'codigo' => '060',
            ),
            27 =>
            array(
                'id' => 28,
                'nome' => 'Bolívia',
                'sigla2' => 'BO',
                'sigla3' => 'BOL',
                'codigo' => '068',
            ),
            28 =>
            array(
                'id' => 29,
                'nome' => 'Bósnia-Herzegóvina',
                'sigla2' => 'BA',
                'sigla3' => 'BIH',
                'codigo' => '070',
            ),
            29 =>
            array(
                'id' => 30,
                'nome' => 'Botsuana',
                'sigla2' => 'BW',
                'sigla3' => 'BWA',
                'codigo' => '072',
            ),
            30 =>
            array(
                'id' => 31,
                'nome' => 'Brasil',
                'sigla2' => 'BR',
                'sigla3' => 'BRA',
                'codigo' => '076',
            ),
            31 =>
            array(
                'id' => 32,
                'nome' => 'Brunei',
                'sigla2' => 'BN',
                'sigla3' => 'BRN',
                'codigo' => '096',
            ),
            32 =>
            array(
                'id' => 33,
                'nome' => 'Bulgária',
                'sigla2' => 'BG',
                'sigla3' => 'BGR',
                'codigo' => '100',
            ),
            33 =>
            array(
                'id' => 34,
                'nome' => 'Burkina Fasso',
                'sigla2' => 'BF',
                'sigla3' => 'BFA',
                'codigo' => '854',
            ),
            34 =>
            array(
                'id' => 35,
                'nome' => 'Burundi',
                'sigla2' => 'BI',
                'sigla3' => 'BDI',
                'codigo' => '108',
            ),
            35 =>
            array(
                'id' => 36,
                'nome' => 'Butão',
                'sigla2' => 'BT',
                'sigla3' => 'BTN',
                'codigo' => '064',
            ),
            36 =>
            array(
                'id' => 37,
                'nome' => 'Cabo Verde',
                'sigla2' => 'CV',
                'sigla3' => 'CPV',
                'codigo' => '132',
            ),
            37 =>
            array(
                'id' => 38,
                'nome' => 'Camarões',
                'sigla2' => 'CM',
                'sigla3' => 'CMR',
                'codigo' => '120',
            ),
            38 =>
            array(
                'id' => 39,
                'nome' => 'Camboja',
                'sigla2' => 'KH',
                'sigla3' => 'KHM',
                'codigo' => '116',
            ),
            39 =>
            array(
                'id' => 40,
                'nome' => 'Canadá',
                'sigla2' => 'CA',
                'sigla3' => 'CAN',
                'codigo' => '124',
            ),
            40 =>
            array(
                'id' => 41,
                'nome' => 'Cazaquistão',
                'sigla2' => 'KZ',
                'sigla3' => 'KAZ',
                'codigo' => '398',
            ),
            41 =>
            array(
                'id' => 42,
                'nome' => 'Chade',
                'sigla2' => 'TD',
                'sigla3' => 'TCD',
                'codigo' => '148',
            ),
            42 =>
            array(
                'id' => 43,
                'nome' => 'Chile',
                'sigla2' => 'CL',
                'sigla3' => 'CHL',
                'codigo' => '152',
            ),
            43 =>
            array(
                'id' => 44,
                'nome' => 'China',
                'sigla2' => 'CN',
                'sigla3' => 'CHN',
                'codigo' => '156',
            ),
            44 =>
            array(
                'id' => 45,
                'nome' => 'Chipre',
                'sigla2' => 'CY',
                'sigla3' => 'CYP',
                'codigo' => '196',
            ),
            45 =>
            array(
                'id' => 46,
                'nome' => 'Cingapura',
                'sigla2' => 'SG',
                'sigla3' => 'SGP',
                'codigo' => '702',
            ),
            46 =>
            array(
                'id' => 47,
                'nome' => 'Colômbia',
                'sigla2' => 'CO',
                'sigla3' => 'COL',
                'codigo' => '170',
            ),
            47 =>
            array(
                'id' => 48,
                'nome' => 'Congo',
                'sigla2' => 'CG',
                'sigla3' => 'COG',
                'codigo' => '178',
            ),
            48 =>
            array(
                'id' => 49,
                'nome' => 'Coréia do Norte',
                'sigla2' => 'KP',
                'sigla3' => 'PRK',
                'codigo' => '408',
            ),
            49 =>
            array(
                'id' => 50,
                'nome' => 'Coréia do Sul',
                'sigla2' => 'KR',
                'sigla3' => 'KOR',
                'codigo' => '410',
            ),
            50 =>
            array(
                'id' => 51,
                'nome' => 'Costa do Marfim',
                'sigla2' => 'CI',
                'sigla3' => 'CIV',
                'codigo' => '384',
            ),
            51 =>
            array(
                'id' => 52,
                'nome' => 'Costa Rica',
                'sigla2' => 'CR',
                'sigla3' => 'CRI',
                'codigo' => '188',
            ),
            52 =>
            array(
                'id' => 53,
                'nome' => 'Croácia (Hrvatska)',
                'sigla2' => 'HR',
                'sigla3' => 'HRV',
                'codigo' => '191',
            ),
            53 =>
            array(
                'id' => 54,
                'nome' => 'Cuba',
                'sigla2' => 'CU',
                'sigla3' => 'CUB',
                'codigo' => '192',
            ),
            54 =>
            array(
                'id' => 55,
                'nome' => 'Dinamarca',
                'sigla2' => 'DK',
                'sigla3' => 'DNK',
                'codigo' => '208',
            ),
            55 =>
            array(
                'id' => 56,
                'nome' => 'Djibuti',
                'sigla2' => 'DJ',
                'sigla3' => 'DJI',
                'codigo' => '262',
            ),
            56 =>
            array(
                'id' => 57,
                'nome' => 'Dominica',
                'sigla2' => 'DM',
                'sigla3' => 'DMA',
                'codigo' => '212',
            ),
            57 =>
            array(
                'id' => 58,
                'nome' => 'Egito',
                'sigla2' => 'EG',
                'sigla3' => 'EGY',
                'codigo' => '818',
            ),
            58 =>
            array(
                'id' => 59,
                'nome' => 'El Salvador',
                'sigla2' => 'SV',
                'sigla3' => 'SLV',
                'codigo' => '222',
            ),
            59 =>
            array(
                'id' => 60,
                'nome' => 'Emirados Árabes Unidos',
                'sigla2' => 'AE',
                'sigla3' => 'ARE',
                'codigo' => '784',
            ),
            60 =>
            array(
                'id' => 61,
                'nome' => 'Equador',
                'sigla2' => 'EC',
                'sigla3' => 'ECU',
                'codigo' => '218',
            ),
            61 =>
            array(
                'id' => 62,
                'nome' => 'Eritréia',
                'sigla2' => 'ER',
                'sigla3' => 'ERI',
                'codigo' => '232',
            ),
            62 =>
            array(
                'id' => 63,
                'nome' => 'Eslováquia',
                'sigla2' => 'SK',
                'sigla3' => 'SVK',
                'codigo' => '703',
            ),
            63 =>
            array(
                'id' => 64,
                'nome' => 'Eslovênia',
                'sigla2' => 'SI',
                'sigla3' => 'SVN',
                'codigo' => '705',
            ),
            64 =>
            array(
                'id' => 65,
                'nome' => 'Espanha',
                'sigla2' => 'ES',
                'sigla3' => 'ESP',
                'codigo' => '724',
            ),
            65 =>
            array(
                'id' => 66,
                'nome' => 'Estados Unidos',
                'sigla2' => 'US',
                'sigla3' => 'USA',
                'codigo' => '840',
            ),
            66 =>
            array(
                'id' => 67,
                'nome' => 'Estônia',
                'sigla2' => 'EE',
                'sigla3' => 'EST',
                'codigo' => '233',
            ),
            67 =>
            array(
                'id' => 68,
                'nome' => 'Etiópia',
                'sigla2' => 'ET',
                'sigla3' => 'ETH',
                'codigo' => '231',
            ),
            68 =>
            array(
                'id' => 69,
                'nome' => 'Fiji',
                'sigla2' => 'FJ',
                'sigla3' => 'FJI',
                'codigo' => '242',
            ),
            69 =>
            array(
                'id' => 70,
                'nome' => 'Filipinas',
                'sigla2' => 'PH',
                'sigla3' => 'PHL',
                'codigo' => '608',
            ),
            70 =>
            array(
                'id' => 71,
                'nome' => 'Finlândia',
                'sigla2' => 'FI',
                'sigla3' => 'FIN',
                'codigo' => '246',
            ),
            71 =>
            array(
                'id' => 72,
                'nome' => 'França',
                'sigla2' => 'FR',
                'sigla3' => 'FRA',
                'codigo' => '250',
            ),
            72 =>
            array(
                'id' => 73,
                'nome' => 'Gabão',
                'sigla2' => 'GA',
                'sigla3' => 'GAB',
                'codigo' => '266',
            ),
            73 =>
            array(
                'id' => 74,
                'nome' => 'Gâmbia',
                'sigla2' => 'GM',
                'sigla3' => 'GMB',
                'codigo' => '270',
            ),
            74 =>
            array(
                'id' => 75,
                'nome' => 'Gana',
                'sigla2' => 'GH',
                'sigla3' => 'GHA',
                'codigo' => '288',
            ),
            75 =>
            array(
                'id' => 76,
                'nome' => 'Geórgia',
                'sigla2' => 'GE',
                'sigla3' => 'GEO',
                'codigo' => '268',
            ),
            76 =>
            array(
                'id' => 77,
                'nome' => 'Gibraltar',
                'sigla2' => 'GI',
                'sigla3' => 'GIB',
                'codigo' => '292',
            ),
            77 =>
            array(
                'id' => 78,
                'nome' => 'Grã-Bretanha (Reino Unido, UK)',
                'sigla2' => 'GB',
                'sigla3' => 'GBR',
                'codigo' => '826',
            ),
            78 =>
            array(
                'id' => 79,
                'nome' => 'Granada',
                'sigla2' => 'GD',
                'sigla3' => 'GRD',
                'codigo' => '308',
            ),
            79 =>
            array(
                'id' => 80,
                'nome' => 'Grécia',
                'sigla2' => 'GR',
                'sigla3' => 'GRC',
                'codigo' => '300',
            ),
            80 =>
            array(
                'id' => 81,
                'nome' => 'Groelândia',
                'sigla2' => 'GL',
                'sigla3' => 'GRL',
                'codigo' => '304',
            ),
            81 =>
            array(
                'id' => 82,
                'nome' => 'Guadalupe',
                'sigla2' => 'GP',
                'sigla3' => 'GLP',
                'codigo' => '312',
            ),
            82 =>
            array(
                'id' => 83,
                'nome' => 'Guam (Território dos Estados Unidos)',
                'sigla2' => 'GU',
                'sigla3' => 'GUM',
                'codigo' => '316',
            ),
            83 =>
            array(
                'id' => 84,
                'nome' => 'Guatemala',
                'sigla2' => 'GT',
                'sigla3' => 'GTM',
                'codigo' => '320',
            ),
            84 =>
            array(
                'id' => 85,
                'nome' => 'Guernsey',
                'sigla2' => 'G',
                'sigla3' => 'GGY',
                'codigo' => '832',
            ),
            85 =>
            array(
                'id' => 86,
                'nome' => 'Guiana',
                'sigla2' => 'GY',
                'sigla3' => 'GUY',
                'codigo' => '328',
            ),
            86 =>
            array(
                'id' => 87,
                'nome' => 'Guiana Francesa',
                'sigla2' => 'GF',
                'sigla3' => 'GUF',
                'codigo' => '254',
            ),
            87 =>
            array(
                'id' => 88,
                'nome' => 'Guiné',
                'sigla2' => 'GN',
                'sigla3' => 'GIN',
                'codigo' => '324',
            ),
            88 =>
            array(
                'id' => 89,
                'nome' => 'Guiné Equatorial',
                'sigla2' => 'GQ',
                'sigla3' => 'GNQ',
                'codigo' => '226',
            ),
            89 =>
            array(
                'id' => 90,
                'nome' => 'Guiné-Bissau',
                'sigla2' => 'GW',
                'sigla3' => 'GNB',
                'codigo' => '624',
            ),
            90 =>
            array(
                'id' => 91,
                'nome' => 'Haiti',
                'sigla2' => 'HT',
                'sigla3' => 'HTI',
                'codigo' => '332',
            ),
            91 =>
            array(
                'id' => 92,
                'nome' => 'Holanda',
                'sigla2' => 'NL',
                'sigla3' => 'NLD',
                'codigo' => '528',
            ),
            92 =>
            array(
                'id' => 93,
                'nome' => 'Honduras',
                'sigla2' => 'HN',
                'sigla3' => 'HND',
                'codigo' => '340',
            ),
            93 =>
            array(
                'id' => 94,
                'nome' => 'Hong Kong',
                'sigla2' => 'HK',
                'sigla3' => 'HKG',
                'codigo' => '344',
            ),
            94 =>
            array(
                'id' => 95,
                'nome' => 'Hungria',
                'sigla2' => 'HU',
                'sigla3' => 'HUN',
                'codigo' => '348',
            ),
            95 =>
            array(
                'id' => 96,
                'nome' => 'Iêmen',
                'sigla2' => 'YE',
                'sigla3' => 'YEM',
                'codigo' => '887',
            ),
            96 =>
            array(
                'id' => 97,
                'nome' => 'Ilha Bouvet (Território da Noruega)',
                'sigla2' => 'BV',
                'sigla3' => 'BVT',
                'codigo' => '074',
            ),
            97 =>
            array(
                'id' => 98,
                'nome' => 'Ilha do Homem',
                'sigla2' => 'IM',
                'sigla3' => 'IMN',
                'codigo' => '833',
            ),
            98 =>
            array(
                'id' => 99,
                'nome' => 'Ilha Natal',
                'sigla2' => 'CX',
                'sigla3' => 'CXR',
                'codigo' => '162',
            ),
            99 =>
            array(
                'id' => 100,
                'nome' => 'Ilha Pitcairn',
                'sigla2' => 'PN',
                'sigla3' => 'PCN',
                'codigo' => '612',
            ),
            100 =>
            array(
                'id' => 101,
                'nome' => 'Ilha Reunião',
                'sigla2' => 'RE',
                'sigla3' => 'REU',
                'codigo' => '638',
            ),
            101 =>
            array(
                'id' => 102,
                'nome' => 'Ilhas Aland',
                'sigla2' => 'AX',
                'sigla3' => 'ALA',
                'codigo' => '248',
            ),
            102 =>
            array(
                'id' => 103,
                'nome' => 'Ilhas Cayman',
                'sigla2' => 'KY',
                'sigla3' => 'CYM',
                'codigo' => '136',
            ),
            103 =>
            array(
                'id' => 104,
                'nome' => 'Ilhas Cocos',
                'sigla2' => 'CC',
                'sigla3' => 'CCK',
                'codigo' => '166',
            ),
            104 =>
            array(
                'id' => 105,
                'nome' => 'Ilhas Comores',
                'sigla2' => 'KM',
                'sigla3' => 'COM',
                'codigo' => '174',
            ),
            105 =>
            array(
                'id' => 106,
                'nome' => 'Ilhas Cook',
                'sigla2' => 'CK',
                'sigla3' => 'COK',
                'codigo' => '184',
            ),
            106 =>
            array(
                'id' => 107,
                'nome' => 'Ilhas Faroes',
                'sigla2' => 'FO',
                'sigla3' => 'FRO',
                'codigo' => '234',
            ),
            107 =>
            array(
                'id' => 108,
                'nome' => 'Ilhas Falkland (Malvinas)',
                'sigla2' => 'FK',
                'sigla3' => 'FLK',
                'codigo' => '238',
            ),
            108 =>
            array(
                'id' => 109,
                'nome' => 'Ilhas Geórgia do Sul e Sandwich do Sul',
                'sigla2' => 'GS',
                'sigla3' => 'SGS',
                'codigo' => '239',
            ),
            109 =>
            array(
                'id' => 110,
                'nome' => 'Ilhas Heard e McDonald (Território da Austrália)',
                'sigla2' => 'HM',
                'sigla3' => 'HMD',
                'codigo' => '334',
            ),
            110 =>
            array(
                'id' => 111,
                'nome' => 'Ilhas Marianas do Norte',
                'sigla2' => 'MP',
                'sigla3' => 'MNP',
                'codigo' => '580',
            ),
            111 =>
            array(
                'id' => 112,
                'nome' => 'Ilhas Marshall',
                'sigla2' => 'MH',
                'sigla3' => 'MHL',
                'codigo' => '584',
            ),
            112 =>
            array(
                'id' => 113,
                'nome' => 'Ilhas Menores dos Estados Unidos',
                'sigla2' => 'UM',
                'sigla3' => 'UMI',
                'codigo' => '581',
            ),
            113 =>
            array(
                'id' => 114,
                'nome' => 'Ilhas Norfolk',
                'sigla2' => 'NF',
                'sigla3' => 'NFK',
                'codigo' => '574',
            ),
            114 =>
            array(
                'id' => 115,
                'nome' => 'Ilhas Seychelles',
                'sigla2' => 'SC',
                'sigla3' => 'SYC',
                'codigo' => '690',
            ),
            115 =>
            array(
                'id' => 116,
                'nome' => 'Ilhas Solomão',
                'sigla2' => 'SB',
                'sigla3' => 'SLB',
                'codigo' => '090',
            ),
            116 =>
            array(
                'id' => 117,
                'nome' => 'Ilhas Svalbard e Jan Mayen',
                'sigla2' => 'SJ',
                'sigla3' => 'SJM',
                'codigo' => '744',
            ),
            117 =>
            array(
                'id' => 118,
                'nome' => 'Ilhas Tokelau',
                'sigla2' => 'TK',
                'sigla3' => 'TKL',
                'codigo' => '772',
            ),
            118 =>
            array(
                'id' => 119,
                'nome' => 'Ilhas Turks e Caicos',
                'sigla2' => 'TC',
                'sigla3' => 'TCA',
                'codigo' => '796',
            ),
            119 =>
            array(
                'id' => 120,
                'nome' => 'Ilhas Virgens (Estados Unidos)',
                'sigla2' => 'VI',
                'sigla3' => 'VIR',
                'codigo' => '850',
            ),
            120 =>
            array(
                'id' => 121,
                'nome' => 'Ilhas Virgens (Inglaterra)',
                'sigla2' => 'VG',
                'sigla3' => 'VGB',
                'codigo' => '092',
            ),
            121 =>
            array(
                'id' => 122,
                'nome' => 'Ilhas Wallis e Futuna',
                'sigla2' => 'WF',
                'sigla3' => 'WLF',
                'codigo' => '876',
            ),
            122 =>
            array(
                'id' => 123,
                'nome' => 'índia',
                'sigla2' => 'IN',
                'sigla3' => 'IND',
                'codigo' => '356',
            ),
            123 =>
            array(
                'id' => 124,
                'nome' => 'Indonésia',
                'sigla2' => 'ID',
                'sigla3' => 'IDN',
                'codigo' => '360',
            ),
            124 =>
            array(
                'id' => 125,
                'nome' => 'Irã',
                'sigla2' => 'IR',
                'sigla3' => 'IRN',
                'codigo' => '364',
            ),
            125 =>
            array(
                'id' => 126,
                'nome' => 'Iraque',
                'sigla2' => 'IQ',
                'sigla3' => 'IRQ',
                'codigo' => '368',
            ),
            126 =>
            array(
                'id' => 127,
                'nome' => 'Irlanda',
                'sigla2' => 'IE',
                'sigla3' => 'IRL',
                'codigo' => '372',
            ),
            127 =>
            array(
                'id' => 128,
                'nome' => 'Islândia',
                'sigla2' => 'IS',
                'sigla3' => 'ISL',
                'codigo' => '352',
            ),
            128 =>
            array(
                'id' => 129,
                'nome' => 'Israel',
                'sigla2' => 'IL',
                'sigla3' => 'ISR',
                'codigo' => '376',
            ),
            129 =>
            array(
                'id' => 130,
                'nome' => 'Itália',
                'sigla2' => 'IT',
                'sigla3' => 'ITA',
                'codigo' => '380',
            ),
            130 =>
            array(
                'id' => 131,
                'nome' => 'Jamaica',
                'sigla2' => 'JM',
                'sigla3' => 'JAM',
                'codigo' => '388',
            ),
            131 =>
            array(
                'id' => 132,
                'nome' => 'Japão',
                'sigla2' => 'JP',
                'sigla3' => 'JPN',
                'codigo' => '392',
            ),
            132 =>
            array(
                'id' => 133,
                'nome' => 'Jersey',
                'sigla2' => 'JE',
                'sigla3' => 'JEY',
                'codigo' => '832',
            ),
            133 =>
            array(
                'id' => 134,
                'nome' => 'Jordânia',
                'sigla2' => 'JO',
                'sigla3' => 'JOR',
                'codigo' => '400',
            ),
            134 =>
            array(
                'id' => 135,
                'nome' => 'Kênia',
                'sigla2' => 'KE',
                'sigla3' => 'KEN',
                'codigo' => '404',
            ),
            135 =>
            array(
                'id' => 136,
                'nome' => 'Kiribati',
                'sigla2' => 'KI',
                'sigla3' => 'KIR',
                'codigo' => '296',
            ),
            136 =>
            array(
                'id' => 137,
                'nome' => 'Kuait',
                'sigla2' => 'KW',
                'sigla3' => 'KWT',
                'codigo' => '414',
            ),
            137 =>
            array(
                'id' => 138,
                'nome' => 'Laos',
                'sigla2' => 'LA',
                'sigla3' => 'LAO',
                'codigo' => '418',
            ),
            138 =>
            array(
                'id' => 139,
                'nome' => 'Látvia',
                'sigla2' => 'LV',
                'sigla3' => 'LVA',
                'codigo' => '428',
            ),
            139 =>
            array(
                'id' => 140,
                'nome' => 'Lesoto',
                'sigla2' => 'LS',
                'sigla3' => 'LSO',
                'codigo' => '426',
            ),
            140 =>
            array(
                'id' => 141,
                'nome' => 'Líbano',
                'sigla2' => 'LB',
                'sigla3' => 'LBN',
                'codigo' => '422',
            ),
            141 =>
            array(
                'id' => 142,
                'nome' => 'Libéria',
                'sigla2' => 'LR',
                'sigla3' => 'LBR',
                'codigo' => '430',
            ),
            142 =>
            array(
                'id' => 143,
                'nome' => 'Líbia',
                'sigla2' => 'LY',
                'sigla3' => 'LBY',
                'codigo' => '434',
            ),
            143 =>
            array(
                'id' => 144,
                'nome' => 'Liechtenstein',
                'sigla2' => 'LI',
                'sigla3' => 'LIE',
                'codigo' => '438',
            ),
            144 =>
            array(
                'id' => 145,
                'nome' => 'Lituânia',
                'sigla2' => 'LT',
                'sigla3' => 'LTU',
                'codigo' => '440',
            ),
            145 =>
            array(
                'id' => 146,
                'nome' => 'Luxemburgo',
                'sigla2' => 'LU',
                'sigla3' => 'LUX',
                'codigo' => '442',
            ),
            146 =>
            array(
                'id' => 147,
                'nome' => 'Macau',
                'sigla2' => 'MO',
                'sigla3' => 'MAC',
                'codigo' => '446',
            ),
            147 =>
            array(
                'id' => 148,
                'nome' => 'Macedônia (República Yugoslava)',
                'sigla2' => 'MK',
                'sigla3' => 'MKD',
                'codigo' => '807',
            ),
            148 =>
            array(
                'id' => 149,
                'nome' => 'Madagascar',
                'sigla2' => 'MG',
                'sigla3' => 'MDG',
                'codigo' => '450',
            ),
            149 =>
            array(
                'id' => 150,
                'nome' => 'Malásia',
                'sigla2' => 'MY',
                'sigla3' => 'MYS',
                'codigo' => '458',
            ),
            150 =>
            array(
                'id' => 151,
                'nome' => 'Malaui',
                'sigla2' => 'MW',
                'sigla3' => 'MWI',
                'codigo' => '454',
            ),
            151 =>
            array(
                'id' => 152,
                'nome' => 'Maldivas',
                'sigla2' => 'MV',
                'sigla3' => 'MDV',
                'codigo' => '462',
            ),
            152 =>
            array(
                'id' => 153,
                'nome' => 'Mali',
                'sigla2' => 'ML',
                'sigla3' => 'MLI',
                'codigo' => '466',
            ),
            153 =>
            array(
                'id' => 154,
                'nome' => 'Malta',
                'sigla2' => 'MT',
                'sigla3' => 'MLT',
                'codigo' => '470',
            ),
            154 =>
            array(
                'id' => 155,
                'nome' => 'Marrocos',
                'sigla2' => 'MA',
                'sigla3' => 'MAR',
                'codigo' => '504',
            ),
            155 =>
            array(
                'id' => 156,
                'nome' => 'Martinica',
                'sigla2' => 'MQ',
                'sigla3' => 'MTQ',
                'codigo' => '474',
            ),
            156 =>
            array(
                'id' => 157,
                'nome' => 'Maurício',
                'sigla2' => 'MU',
                'sigla3' => 'MUS',
                'codigo' => '480',
            ),
            157 =>
            array(
                'id' => 158,
                'nome' => 'Mauritânia',
                'sigla2' => 'MR',
                'sigla3' => 'MRT',
                'codigo' => '478',
            ),
            158 =>
            array(
                'id' => 159,
                'nome' => 'Mayotte',
                'sigla2' => 'YT',
                'sigla3' => 'MYT',
                'codigo' => '175',
            ),
            159 =>
            array(
                'id' => 160,
                'nome' => 'México',
                'sigla2' => 'MX',
                'sigla3' => 'MEX',
                'codigo' => '484',
            ),
            160 =>
            array(
                'id' => 161,
                'nome' => 'Micronésia',
                'sigla2' => 'FM',
                'sigla3' => 'FSM',
                'codigo' => '583',
            ),
            161 =>
            array(
                'id' => 162,
                'nome' => 'Moçambique',
                'sigla2' => 'MZ',
                'sigla3' => 'MOZ',
                'codigo' => '508',
            ),
            162 =>
            array(
                'id' => 163,
                'nome' => 'Moldova',
                'sigla2' => 'MD',
                'sigla3' => 'MDA',
                'codigo' => '498',
            ),
            163 =>
            array(
                'id' => 164,
                'nome' => 'Mônaco',
                'sigla2' => 'MC',
                'sigla3' => 'MCO',
                'codigo' => '492',
            ),
            164 =>
            array(
                'id' => 165,
                'nome' => 'Mongólia',
                'sigla2' => 'MN',
                'sigla3' => 'MNG',
                'codigo' => '496',
            ),
            165 =>
            array(
                'id' => 166,
                'nome' => 'Montenegro',
                'sigla2' => 'ME',
                'sigla3' => 'MNE',
                'codigo' => '499',
            ),
            166 =>
            array(
                'id' => 167,
                'nome' => 'Montserrat',
                'sigla2' => 'MS',
                'sigla3' => 'MSR',
                'codigo' => '500',
            ),
            167 =>
            array(
                'id' => 168,
                'nome' => 'Myanma',
                'sigla2' => 'MM',
                'sigla3' => 'MMR',
                'codigo' => '104',
            ),
            168 =>
            array(
                'id' => 169,
                'nome' => 'Namíbia',
                'sigla2' => 'NA',
                'sigla3' => 'NAM',
                'codigo' => '516',
            ),
            169 =>
            array(
                'id' => 170,
                'nome' => 'Nauru',
                'sigla2' => 'NR',
                'sigla3' => 'NRU',
                'codigo' => '520',
            ),
            170 =>
            array(
                'id' => 171,
                'nome' => 'Nepal',
                'sigla2' => 'NP',
                'sigla3' => 'NPL',
                'codigo' => '524',
            ),
            171 =>
            array(
                'id' => 172,
                'nome' => 'Nicarágua',
                'sigla2' => 'NI',
                'sigla3' => 'NIC',
                'codigo' => '558',
            ),
            172 =>
            array(
                'id' => 173,
                'nome' => 'Níger',
                'sigla2' => 'NE',
                'sigla3' => 'NER',
                'codigo' => '562',
            ),
            173 =>
            array(
                'id' => 174,
                'nome' => 'Nigéria',
                'sigla2' => 'NG',
                'sigla3' => 'NGA',
                'codigo' => '566',
            ),
            174 =>
            array(
                'id' => 175,
                'nome' => 'Niue',
                'sigla2' => 'NU',
                'sigla3' => 'NIU',
                'codigo' => '570',
            ),
            175 =>
            array(
                'id' => 176,
                'nome' => 'Noruega',
                'sigla2' => 'NO',
                'sigla3' => 'NOR',
                'codigo' => '578',
            ),
            176 =>
            array(
                'id' => 177,
                'nome' => 'Nova Caledônia',
                'sigla2' => 'NC',
                'sigla3' => 'NCL',
                'codigo' => '540',
            ),
            177 =>
            array(
                'id' => 178,
                'nome' => 'Nova Zelândia',
                'sigla2' => 'NZ',
                'sigla3' => 'NZL',
                'codigo' => '554',
            ),
            178 =>
            array(
                'id' => 179,
                'nome' => 'Omã',
                'sigla2' => 'OM',
                'sigla3' => 'OMN',
                'codigo' => '512',
            ),
            179 =>
            array(
                'id' => 180,
                'nome' => 'Palau',
                'sigla2' => 'PW',
                'sigla3' => 'PLW',
                'codigo' => '585',
            ),
            180 =>
            array(
                'id' => 181,
                'nome' => 'Panamá',
                'sigla2' => 'PA',
                'sigla3' => 'PAN',
                'codigo' => '591',
            ),
            181 =>
            array(
                'id' => 182,
                'nome' => 'Papua-Nova Guiné',
                'sigla2' => 'PG',
                'sigla3' => 'PNG',
                'codigo' => '598',
            ),
            182 =>
            array(
                'id' => 183,
                'nome' => 'Paquistão',
                'sigla2' => 'PK',
                'sigla3' => 'PAK',
                'codigo' => '586',
            ),
            183 =>
            array(
                'id' => 184,
                'nome' => 'Paraguai',
                'sigla2' => 'PY',
                'sigla3' => 'PRY',
                'codigo' => '600',
            ),
            184 =>
            array(
                'id' => 185,
                'nome' => 'Peru',
                'sigla2' => 'PE',
                'sigla3' => 'PER',
                'codigo' => '604',
            ),
            185 =>
            array(
                'id' => 186,
                'nome' => 'Polinésia Francesa',
                'sigla2' => 'PF',
                'sigla3' => 'PYF',
                'codigo' => '258',
            ),
            186 =>
            array(
                'id' => 187,
                'nome' => 'Polônia',
                'sigla2' => 'PL',
                'sigla3' => 'POL',
                'codigo' => '616',
            ),
            187 =>
            array(
                'id' => 188,
                'nome' => 'Porto Rico',
                'sigla2' => 'PR',
                'sigla3' => 'PRI',
                'codigo' => '630',
            ),
            188 =>
            array(
                'id' => 189,
                'nome' => 'Portugal',
                'sigla2' => 'PT',
                'sigla3' => 'PRT',
                'codigo' => '620',
            ),
            189 =>
            array(
                'id' => 190,
                'nome' => 'Qatar',
                'sigla2' => 'QA',
                'sigla3' => 'QAT',
                'codigo' => '634',
            ),
            190 =>
            array(
                'id' => 191,
                'nome' => 'Quirguistão',
                'sigla2' => 'KG',
                'sigla3' => 'KGZ',
                'codigo' => '417',
            ),
            191 =>
            array(
                'id' => 192,
                'nome' => 'República Centro-Africana',
                'sigla2' => 'CF',
                'sigla3' => 'CAF',
                'codigo' => '140',
            ),
            192 =>
            array(
                'id' => 193,
                'nome' => 'República Democrática do Congo',
                'sigla2' => 'CD',
                'sigla3' => 'COD',
                'codigo' => '180',
            ),
            193 =>
            array(
                'id' => 194,
                'nome' => 'República Dominicana',
                'sigla2' => 'DO',
                'sigla3' => 'DOM',
                'codigo' => '214',
            ),
            194 =>
            array(
                'id' => 195,
                'nome' => 'República Tcheca',
                'sigla2' => 'CZ',
                'sigla3' => 'CZE',
                'codigo' => '203',
            ),
            195 =>
            array(
                'id' => 196,
                'nome' => 'Romênia',
                'sigla2' => 'RO',
                'sigla3' => 'ROM',
                'codigo' => '642',
            ),
            196 =>
            array(
                'id' => 197,
                'nome' => 'Ruanda',
                'sigla2' => 'RW',
                'sigla3' => 'RWA',
                'codigo' => '646',
            ),
            197 =>
            array(
                'id' => 198,
                'nome' => 'Rússia (antiga URSS) - Federação Russa',
                'sigla2' => 'RU',
                'sigla3' => 'RUS',
                'codigo' => '643',
            ),
            198 =>
            array(
                'id' => 199,
                'nome' => 'Saara Ocidental',
                'sigla2' => 'EH',
                'sigla3' => 'ESH',
                'codigo' => '732',
            ),
            199 =>
            array(
                'id' => 200,
                'nome' => 'Saint Vincente e Granadinas',
                'sigla2' => 'VC',
                'sigla3' => 'VCT',
                'codigo' => '670',
            ),
            200 =>
            array(
                'id' => 201,
                'nome' => 'Samoa Americana',
                'sigla2' => 'AS',
                'sigla3' => 'ASM',
                'codigo' => '016',
            ),
            201 =>
            array(
                'id' => 202,
                'nome' => 'Samoa Ocidental',
                'sigla2' => 'WS',
                'sigla3' => 'WSM',
                'codigo' => '882',
            ),
            202 =>
            array(
                'id' => 203,
                'nome' => 'San Marino',
                'sigla2' => 'SM',
                'sigla3' => 'SMR',
                'codigo' => '674',
            ),
            203 =>
            array(
                'id' => 204,
                'nome' => 'Santa Helena',
                'sigla2' => 'SH',
                'sigla3' => 'SHN',
                'codigo' => '654',
            ),
            204 =>
            array(
                'id' => 205,
                'nome' => 'Santa Lúcia',
                'sigla2' => 'LC',
                'sigla3' => 'LCA',
                'codigo' => '662',
            ),
            205 =>
            array(
                'id' => 206,
                'nome' => 'São Bartolomeu',
                'sigla2' => 'BL',
                'sigla3' => 'BLM',
                'codigo' => '652',
            ),
            206 =>
            array(
                'id' => 207,
                'nome' => 'São Cristóvão e Névis',
                'sigla2' => 'KN',
                'sigla3' => 'KNA',
                'codigo' => '659',
            ),
            207 =>
            array(
                'id' => 208,
                'nome' => 'São Martim',
                'sigla2' => 'MF',
                'sigla3' => 'MAF',
                'codigo' => '663',
            ),
            208 =>
            array(
                'id' => 209,
                'nome' => 'São Tomé e Príncipe',
                'sigla2' => 'ST',
                'sigla3' => 'STP',
                'codigo' => '678',
            ),
            209 =>
            array(
                'id' => 210,
                'nome' => 'Senegal',
                'sigla2' => 'SN',
                'sigla3' => 'SEN',
                'codigo' => '686',
            ),
            210 =>
            array(
                'id' => 211,
                'nome' => 'Serra Leoa',
                'sigla2' => 'SL',
                'sigla3' => 'SLE',
                'codigo' => '694',
            ),
            211 =>
            array(
                'id' => 212,
                'nome' => 'Sérvia',
                'sigla2' => 'RS',
                'sigla3' => 'SRB',
                'codigo' => '688',
            ),
            212 =>
            array(
                'id' => 213,
                'nome' => 'Síria',
                'sigla2' => 'SY',
                'sigla3' => 'SYR',
                'codigo' => '760',
            ),
            213 =>
            array(
                'id' => 214,
                'nome' => 'Somália',
                'sigla2' => 'SO',
                'sigla3' => 'SOM',
                'codigo' => '706',
            ),
            214 =>
            array(
                'id' => 215,
                'nome' => 'Sri Lanka',
                'sigla2' => 'LK',
                'sigla3' => 'LKA',
                'codigo' => '144',
            ),
            215 =>
            array(
                'id' => 216,
                'nome' => 'St. Pierre and Miquelon',
                'sigla2' => 'PM',
                'sigla3' => 'SPM',
                'codigo' => '666',
            ),
            216 =>
            array(
                'id' => 217,
                'nome' => 'Suazilândia',
                'sigla2' => 'SZ',
                'sigla3' => 'SWZ',
                'codigo' => '748',
            ),
            217 =>
            array(
                'id' => 218,
                'nome' => 'Sudão',
                'sigla2' => 'SD',
                'sigla3' => 'SDN',
                'codigo' => '736',
            ),
            218 =>
            array(
                'id' => 219,
                'nome' => 'Suécia',
                'sigla2' => 'SE',
                'sigla3' => 'SWE',
                'codigo' => '752',
            ),
            219 =>
            array(
                'id' => 220,
                'nome' => 'Suíça',
                'sigla2' => 'CH',
                'sigla3' => 'CHE',
                'codigo' => '756',
            ),
            220 =>
            array(
                'id' => 221,
                'nome' => 'Suriname',
                'sigla2' => 'SR',
                'sigla3' => 'SUR',
                'codigo' => '740',
            ),
            221 =>
            array(
                'id' => 222,
                'nome' => 'Tadjiquistão',
                'sigla2' => 'TJ',
                'sigla3' => 'TJK',
                'codigo' => '762',
            ),
            222 =>
            array(
                'id' => 223,
                'nome' => 'Tailândia',
                'sigla2' => 'TH',
                'sigla3' => 'THA',
                'codigo' => '764',
            ),
            223 =>
            array(
                'id' => 224,
                'nome' => 'Taiwan',
                'sigla2' => 'TW',
                'sigla3' => 'TWN',
                'codigo' => '158',
            ),
            224 =>
            array(
                'id' => 225,
                'nome' => 'Tanzânia',
                'sigla2' => 'TZ',
                'sigla3' => 'TZA',
                'codigo' => '834',
            ),
            225 =>
            array(
                'id' => 226,
                'nome' => 'Território Britânico do Oceano índico',
                'sigla2' => 'IO',
                'sigla3' => 'IOT',
                'codigo' => '086',
            ),
            226 =>
            array(
                'id' => 227,
                'nome' => 'Territórios do Sul da França',
                'sigla2' => 'TF',
                'sigla3' => 'ATF',
                'codigo' => '260',
            ),
            227 =>
            array(
                'id' => 228,
                'nome' => 'Territórios Palestinos Ocupados',
                'sigla2' => 'PS',
                'sigla3' => 'PSE',
                'codigo' => '275',
            ),
            228 =>
            array(
                'id' => 229,
                'nome' => 'Timor Leste',
                'sigla2' => 'TP',
                'sigla3' => 'TMP',
                'codigo' => '626',
            ),
            229 =>
            array(
                'id' => 230,
                'nome' => 'Togo',
                'sigla2' => 'TG',
                'sigla3' => 'TGO',
                'codigo' => '768',
            ),
            230 =>
            array(
                'id' => 231,
                'nome' => 'Tonga',
                'sigla2' => 'TO',
                'sigla3' => 'TON',
                'codigo' => '776',
            ),
            231 =>
            array(
                'id' => 232,
                'nome' => 'Trinidad and Tobago',
                'sigla2' => 'TT',
                'sigla3' => 'TTO',
                'codigo' => '780',
            ),
            232 =>
            array(
                'id' => 233,
                'nome' => 'Tunísia',
                'sigla2' => 'TN',
                'sigla3' => 'TUN',
                'codigo' => '788',
            ),
            233 =>
            array(
                'id' => 234,
                'nome' => 'Turcomenistão',
                'sigla2' => 'TM',
                'sigla3' => 'TKM',
                'codigo' => '795',
            ),
            234 =>
            array(
                'id' => 235,
                'nome' => 'Turquia',
                'sigla2' => 'TR',
                'sigla3' => 'TUR',
                'codigo' => '792',
            ),
            235 =>
            array(
                'id' => 236,
                'nome' => 'Tuvalu',
                'sigla2' => 'TV',
                'sigla3' => 'TUV',
                'codigo' => '798',
            ),
            236 =>
            array(
                'id' => 237,
                'nome' => 'Ucrânia',
                'sigla2' => 'UA',
                'sigla3' => 'UKR',
                'codigo' => '804',
            ),
            237 =>
            array(
                'id' => 238,
                'nome' => 'Uganda',
                'sigla2' => 'UG',
                'sigla3' => 'UGA',
                'codigo' => '800',
            ),
            238 =>
            array(
                'id' => 239,
                'nome' => 'Uruguai',
                'sigla2' => 'UY',
                'sigla3' => 'URY',
                'codigo' => '858',
            ),
            239 =>
            array(
                'id' => 240,
                'nome' => 'Uzbequistão',
                'sigla2' => 'UZ',
                'sigla3' => 'UZB',
                'codigo' => '860',
            ),
            240 =>
            array(
                'id' => 241,
                'nome' => 'Vanuatu',
                'sigla2' => 'VU',
                'sigla3' => 'VUT',
                'codigo' => '548',
            ),
            241 =>
            array(
                'id' => 242,
                'nome' => 'Vaticano',
                'sigla2' => 'VA',
                'sigla3' => 'VAT',
                'codigo' => '336',
            ),
            242 =>
            array(
                'id' => 243,
                'nome' => 'Venezuela',
                'sigla2' => 'VE',
                'sigla3' => 'VEN',
                'codigo' => '862',
            ),
            243 =>
            array(
                'id' => 244,
                'nome' => 'Vietnã',
                'sigla2' => 'VN',
                'sigla3' => 'VNM',
                'codigo' => '704',
            ),
            244 =>
            array(
                'id' => 245,
                'nome' => 'Zâmbia',
                'sigla2' => 'ZM',
                'sigla3' => 'ZMB',
                'codigo' => '894',
            ),
            245 =>
            array(
                'id' => 246,
                'nome' => 'Zimbábue',
                'sigla2' => 'ZW',
                'sigla3' => 'ZWE',
                'codigo' => '716',
            ),
        );
    }
}
