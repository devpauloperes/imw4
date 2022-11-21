<?php namespace App\Controllers\Clerigo;

use App\Controllers\BaseController;
use App\Models\Clerigo\ClerigoModel;
use App\Models\Clerigo\TipoClerigoModel;
use App\Models\EscolaridadeModel;
use App\Models\RacaModel;
use DateTime;

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
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["foto"] = $newName;
        }

        $arquivoCtpsFile = $this->request->getFile('arquivoCtps');
        if ($arquivoCtpsFile->isValid() && !$arquivoCtpsFile->hasMoved()) {
            $newName = $data["cpf"] . $arquivoCtpsFile->getRandomName();
            $arquivoCtpsFile->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoCtps"] = $newName;
        }

        $arquivoPisFile = $this->request->getFile('arquivoPis');
        if ($arquivoPisFile->isValid() && !$arquivoPisFile->hasMoved()) {
            $newName = $data["cpf"] . $arquivoPisFile->getRandomName();
            $arquivoPisFile->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoPis"] = $newName;
        }
        
        $arquivoRgFile = $this->request->getFile('arquivoRg');
        if ($arquivoRgFile->isValid() && !$arquivoRgFile->hasMoved()) {
            $newName = $data["cpf"] . $arquivoRgFile->getRandomName();
            $arquivoRgFile->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoRg"] = $newName;
        }

        $arquivoCpfFile = $this->request->getFile('arquivoCpf');
        if ($arquivoCpfFile->isValid() && !$arquivoCpfFile->hasMoved()) {
            $newName = $data["cpf"] . $arquivoCpfFile->getRandomName();
            $arquivoCpfFile->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoCpf"] = $newName;
        }
        
        $arquivoTituloEleitorFile = $this->request->getFile('arquivoTituloEleitor');
        if ($arquivoTituloEleitorFile->isValid() && !$arquivoTituloEleitorFile->hasMoved()) {
            $newName = $data["cpf"] . $arquivoTituloEleitorFile->getRandomName();
            $arquivoTituloEleitorFile->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoTituloEleitor"] = $newName;
        }
        
        $arquivo = $this->request->getFile('arquivoCertidaoNascimentoCasamento');
        if ($arquivo->isValid() && !$arquivo->hasMoved()) {
            $newName = $data["cpf"] . $arquivo->getRandomName();
            $arquivo->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoCertidaoNascimentoCasamento"] = $newName;
        }
        
        $arquivo = $this->request->getFile('arquivoComprovanteResidencia');
        if ($arquivo->isValid() && !$arquivo->hasMoved()) {
            $newName = $data["cpf"] . $arquivo->getRandomName();
            $arquivo->move(FCPATH . 'public/uploads/Clerigo/', $newName);
            $data["arquivoComprovanteResidencia"] = $newName;
        }
        
        $arquivo = $this->request->getFile('arquivoExtratoPrevidenciario');
        if ($arquivo->isValid() && !$arquivo->hasMoved()) {
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
        $save = $model->insert($data);	
        
        return redirect()->to( base_url($this->rota . '/?msg=Cadastro realizado com Sucesso!') );
        
    }
    

    

}