<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MembroCapacitacaoModel;
use App\Models\MembroHistoricoModel;
use App\Models\MembroModel;
use App\Models\PessoaModel;
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
            ->select("Pessoa.*")
            ->join("Pessoa", "Pessoa.id = Membro.pessoaId")
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
            ["id" => 4, "nome" => "Excluído"],
        ];

        $data["TipoPessoa"] = [
            ["id" => 1, "nome" => "Membro"],
            ["id" => 2, "nome" => "Congregado"],
        ];


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

        $img = $this->request->getFile('foto');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/Pessoa/', $newName);
            $data["foto"] = $newName;
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

        $data["profissao"] = $this->request->getPost("profissao");
        $data["situacao"] = $this->request->getPost("situacao");

        $data["instituicaoId"] = $this->instituicao["id"];

        return $data;
    }


    public function create()
    {
        helper(['form', 'url']);

        $pessoaModel = new PessoaModel();
        $dataPessoa = $this->getDadosPessoa();
        $dataPessoa["created_by"] = $this->usuario["id"];

        $model = new MembroModel();
        $dataMembro = $this->getDadosMembro();
        $dataMembro["created_by"] = $this->usuario["id"];

        try {
            $idPessoa = $pessoaModel->insert($dataPessoa);

            $idMembro = null; 

            if ($dataPessoa["tipoPessoa"] == 1) {
                $dataMembro["pessoaId"] = $idPessoa;
                $idMembro = $model->insert($dataMembro);
            }

            if ($idMembro != null) {
                return redirect()->to(base_url($this->route . "/" . $idMembro  . "?msg=Cadastro realizado com Sucesso!"));
            } else {
                return redirect()->to(base_url($this->route . "?erro=Houve uma falha ao salvar."));
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

        $model = new MembroModel();
        $data['entidade'] = $model
            ->select("Pessoa.*, Membro.pessoaId, Membro.numeroRolPermanente, Membro.anoConversao, Membro.dataBatismo, Membro.profissao, Membro.situacao")
            ->join("Pessoa", "Pessoa.id = Membro.pessoaId")
            ->find($id);

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
            ["id" => 4, "nome" => "Excluído"],
        ];

        $data["TipoPessoa"] = [
            ["id" => 1, "nome" => "Membro"],
            ["id" => 2, "nome" => "Congregado"],
        ];

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
}
