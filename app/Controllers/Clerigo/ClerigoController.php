<?php namespace App\Controllers\Clerigo;

use App\Controllers\BaseController;
use App\Models\Clerigo\ClerigoCurriculoModel;
use App\Models\Clerigo\ClerigoDependenteModel;
use App\Models\Clerigo\ClerigoModel;
use App\Models\Clerigo\TipoClerigoModel;
use App\Models\EscolaridadeModel;
use App\Models\RacaModel;
use DateTime;
use Exception;

class ClerigoController extends BaseController
{
    private $route = 'clerigos';
    private $titlePage = 'Clérigos';
    private $dirView = 'Clerigo/Clerigo';
    
    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new ClerigoModel();
        $data['registros'] = $model->orderBy('nome', 'ASC');

        //caso seja necessário pesquisar por nome
        if ($this->request->getGet("nome"))
            $data['registros'] = $data['registros']->like('nome', $this->request->getGet("nome"));
            
        $data['registros']  =  $data['registros']->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;

        return view( $this->dirView. '/list', $data);
       
    }
    
    public function new()
    {
        $data['titlePage'] = $this->titlePage;
        $data['dirView'] = $this->dirView;
        $data["route"]      = $this->route;

        $tipoClerigoModel = new TipoClerigoModel();
        $data["clerigo_tipo_clerigo"] = $tipoClerigoModel->findAll();

        $escolaridadeModel = new EscolaridadeModel();
        $data["escolaridade"] = $escolaridadeModel->findAll();

        $racaModel = new RacaModel();
        $data["raca"] = $racaModel->findAll();

        return view( $this->dirView . '/new',$data);
    }
    
    private function getDados(){

        
        


        $data = [
            'usuarioId'     => $this->usuario['id'],
            'tipoClerigoId'          => $this->request->getPost('tipoClerigoId'),
            'nome'          => $this->request->getPost('nome'),
            'email'          => $this->request->getPost('email'),
            'nacionalidade'          => $this->request->getPost('nacionalidade'),
            'escolaridadeId'          => $this->request->getPost('escolaridadeId'),
            'sexo'          => $this->request->getPost('sexo'),

            'racaId'          => $this->request->getPost('racaId'),
            'isPne'          => $this->request->getPost('isPne'),
            'estadoCivil'          => $this->request->getPost('estadoCivil'),
            'nomeConjuge'          => $this->request->getPost('nomeConjuge'),
            'conjugeCPF'          => $this->request->getPost('conjugeCPF'),
            'conjugeRg'          => $this->request->getPost('conjugeRg'),
            'prebendas'          => str_replace(",", ".", $this->request->getPost('prebendas')),
            
            'conjugeRegimeBens'          => $this->request->getPost('conjugeRegimeBens'),
            'nomePai'          => $this->request->getPost('nomePai'),
            'nomeMae'          => $this->request->getPost('nomeMae'),
            'cpf'          => preg_replace('/[^0-9]/', '', $this->request->getPost("cpf")),
            'rg'          => $this->request->getPost('rg'),
            
            'ctps'          => $this->request->getPost('ctps'),
            
            'pis'          => $this->request->getPost('pis'),
            'tituloEleitoral'          => $this->request->getPost('tituloEleitoral'),
            'tituloEleitoralZona'          => $this->request->getPost('tituloEleitoralZona'),
            'tituloEleitoralSecao'          => $this->request->getPost('tituloEleitoralSecao'),
            'cep'          => $this->request->getPost('cep'),
            'endereco'          => $this->request->getPost('endereco'),
            'numero'          => $this->request->getPost('numero'),
            'complemento'          => $this->request->getPost('complemento'),
            'bairro'          => $this->request->getPost('bairro'),
            'cidade'          => $this->request->getPost('cidade'),
            'estado'          => $this->request->getPost('estado'),
            'pais'          => $this->request->getPost('pais'),
            'telefone'          => $this->request->getPost('telefone'),
            'celular'          => $this->request->getPost('celular'),
            'isFilhos'          => $this->request->getPost('isFilhos'),
            'isAtivo'          => $this->request->getPost('isAtivo'),
            
            'criadoPor'     => $this->usuario['id'],
            'alteradoPor'   => $this->usuario['id'],
        ];

        $img = $this->request->getFile('foto');
        if ( $img != null &&  $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["foto"] = $newName;
        }

        $arquivoCtpsFile = $this->request->getFile('arquivoCtps');
        if ( $img != null && $arquivoCtpsFile->isValid() && !$arquivoCtpsFile->hasMoved()) {
            $newName = $data["cpf"] . $arquivoCtpsFile->getRandomName();
            $arquivoCtpsFile->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoCtps"] = $newName;
        }

        $arquivoPisFile = $this->request->getFile('arquivoPis');
        if ( $img != null && $arquivoPisFile->isValid() && !$arquivoPisFile->hasMoved()) {
            $newName = $data["cpf"] . $arquivoPisFile->getRandomName();
            $arquivoPisFile->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoPis"] = $newName;
        }
        
        $arquivoRgFile = $this->request->getFile('arquivoRg');
        if ( $img != null && $arquivoRgFile->isValid() && !$arquivoRgFile->hasMoved()) {
            $newName = $data["cpf"] . $arquivoRgFile->getRandomName();
            $arquivoRgFile->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoRg"] = $newName;
        }

        $arquivoCpfFile = $this->request->getFile('arquivoCpf');
        if ( $img != null && $arquivoCpfFile->isValid() && !$arquivoCpfFile->hasMoved()) {
            $newName = $data["cpf"] . $arquivoCpfFile->getRandomName();
            $arquivoCpfFile->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoCpf"] = $newName;
        }
        
        $arquivoTituloEleitorFile = $this->request->getFile('arquivoTituloEleitor');
        if ( $img != null && $arquivoTituloEleitorFile->isValid() && !$arquivoTituloEleitorFile->hasMoved()) {
            $newName = $data["cpf"] . $arquivoTituloEleitorFile->getRandomName();
            $arquivoTituloEleitorFile->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoTituloEleitor"] = $newName;
        }
        
        $arquivo = $this->request->getFile('arquivoCertidaoNascimentoCasamento');
        if ( $img != null && $arquivo->isValid() && !$arquivo->hasMoved()) {
            $newName = $data["cpf"] . $arquivo->getRandomName();
            $arquivo->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoCertidaoNascimentoCasamento"] = $newName;
        }
        
        $arquivo = $this->request->getFile('arquivoComprovanteResidencia');
        if ( $img != null && $arquivo->isValid() && !$arquivo->hasMoved()) {
            $newName = $data["cpf"] . $arquivo->getRandomName();
            $arquivo->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoComprovanteResidencia"] = $newName;
        }
        
        $arquivo = $this->request->getFile('arquivoExtratoPrevidenciario');
        if ( $img != null && $arquivo->isValid() && !$arquivo->hasMoved()) {
            $newName = $data["cpf"] . $arquivo->getRandomName();
            $arquivo->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoExtratoPrevidenciario"] = $newName;
        }

        if ($this->request->getPost('dataNascimento') != "") {
            $dataAdmisao = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataNascimento'));
            $data["dataNascimento"] = date_format($dataAdmisao, "Y-m-d");
        }

        if ($this->request->getPost('dataConsagracao') != "") {
            $dataConsagracao = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataConsagracao'));
            $data["dataConsagracao"] = date_format($dataConsagracao, "Y-m-d");
        }

        if ($this->request->getPost('dataOrdenacao') != "") {
            $dataOrdenacao = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataOrdenacao'));
            $data["dataOrdenacao"] = date_format($dataOrdenacao, "Y-m-d");
        }

        if ($this->request->getPost('dataEmissaoRg') != "") {
            $dataEmissaoRg = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataEmissaoRg'));
            $data["dataEmissaoRg"] = date_format($dataEmissaoRg, "Y-m-d");
        }


        if ($this->request->getPost('dataEmissaoCtps') != "") {
            $dataEmissaoCtps = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataEmissaoCtps'));
            $data["dataEmissaoCtps"] = date_format($dataEmissaoCtps, "Y-m-d");
        }
        
        if ($this->request->getPost('conjugeRgDataEmissao') != "") {
            $conjugeRgDataEmissao = DateTime::createFromFormat('d/m/Y', $this->request->getPost('conjugeRgDataEmissao'));
            $data["conjugeRgDataEmissao"] = date_format($conjugeRgDataEmissao, "Y-m-d");
        }
        
        if ($this->request->getPost('dataInativo') != "") {
            $dataInativo = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataInativo'));
            $data["dataInativo"] = date_format($dataInativo, "Y-m-d");
        }

        return $data;
    }
    
    public function create()
    {
        helper(['form', 'url']);
        
        $model = new ClerigoModel();
        $data = $this->getDados();

        //testa se já existe cadastro
        $jaExiste = $model->where("cpf", $data["cpf"])->first();
        if ($jaExiste != null)
            return redirect()->to( base_url($this->rota . '/?erro=Este CPF já esta cadastrado em nosso sistema!') );


        $save = $model->insert($data);	
        
        return redirect()->to( base_url($this->rota . '/?msg=Cadastro realizado com Sucesso!') );
        
    }

    public function edit($id = null)
    {
        helper(['form', 'url']);

        
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;
        
        $tipoClerigoModel = new TipoClerigoModel();
        $data["clerigo_tipo_clerigo"] = $tipoClerigoModel->findAll();

        $escolaridadeModel = new EscolaridadeModel();
        $data["escolaridade"] = $escolaridadeModel->findAll();

        $racaModel = new RacaModel();
        $data["raca"] = $racaModel->findAll();
        
        $dependenteModel = new ClerigoDependenteModel();
        $data["dependentes"] = $dependenteModel->where("clerigoId", $id)->findAll();

        $curriculoModel = new ClerigoCurriculoModel();
        $data["curriculo"] = $curriculoModel->findAll();

        $model = new ClerigoModel();
        $data['entidade'] = $model->where('id', $id)->first();

        

        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new ClerigoModel();
        $data = $this->getDados(); 
        $data["updated_by"] = $this->usuario["id"];       

        try {

            if ($model->update($id, $data)) {
                return redirect()->to(base_url($this->route . "?msg=Cadastro alterado com Sucesso!"));
            } else {
                return redirect()->to(base_url( $this->route . "?erro=Houve uma falha ao alterar."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url( $this->route . "?erro=" . $ex->getMessage()));
        }

        
    }


    public function delete($id = null)
    {
        $model = new ClerigoModel();        

        try {
            
            if ($model->delete($id)) {
                return redirect()->to(base_url($this->route . "?msg=Cadastro removido com Sucesso!"));
            } else {
                return redirect()->to(base_url( $this->route . "?erro=Houve uma falha ao remover."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url( $this->route . "?erro=" . $ex->getMessage()));
        }        
    }
    

    

}