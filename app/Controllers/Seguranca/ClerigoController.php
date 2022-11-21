<?php namespace App\Controllers\Seguranca;

use App\Controllers\BaseController;
use App\Models\Clerigo\ClerigoModel;
use App\Models\Clerigo\TipoClerigoModel;
use App\Models\EscolaridadeModel;
use App\Models\RacaModel;

class ClerigoController extends BaseController
{
    private $rota = 'clerigo';
    private $tituloPage = 'clerigo-clerigo';
    private $templatePage = 'Seguranca';
    
    public function index()
    {
       
    }
    
    public function new()
    {
        $data['tituloPage'] = $this->tituloPage;
        $data['templatePage'] = $this->templatePage;

        $tipoClerigoModel = new TipoClerigoModel();
        $data["clerigo_tipo_clerigo"] = $tipoClerigoModel->findAll();

        $escolaridadeModel = new EscolaridadeModel();
        $data["escolaridade"] = $escolaridadeModel->findAll();

        $racaModel = new RacaModel();
        $data["raca"] = $racaModel->findAll();

        return view( $this->templatePage . '/Clerigo',$data);
    }
    
    private function getDados(){
        $data = [
            'usuarioId'     => $this->usuario['id'],
            'tipoClerigoId'          => $this->request->getPost('tipoClerigoId'),
            'dataConsagracao'          => $this->request->getPost('dataConsagracao'),
            'dataOrdenacao'          => $this->request->getPost('dataOrdenacao'),
            'nome'          => $this->request->getPost('nome'),
            'dataNascimento'          => $this->request->getPost('dataNascimento'),
            'email'          => $this->request->getPost('email'),
            'nacionalidade'          => $this->request->getPost('nacionalidade'),
            'escolaridadeId'          => $this->request->getPost('escolaridadeId'),
            'sexo'          => $this->request->getPost('sexo'),
            'foto'          => $this->request->getPost('foto'),
            'racaId'          => $this->request->getPost('racaId'),
            'isPne'          => $this->request->getPost('isPne'),
            'estadoCivil'          => $this->request->getPost('estadoCivil'),
            'nomeConjuge'          => $this->request->getPost('nomeConjuge'),
            'conjugeCPF'          => $this->request->getPost('conjugeCPF'),
            'conjugeRg'          => $this->request->getPost('conjugeRg'),
            'conjugeRgDataEmissao'          => $this->request->getPost('conjugeRgDataEmissao'),
            'conjugeRegimeBens'          => $this->request->getPost('conjugeRegimeBens'),
            'nomePai'          => $this->request->getPost('nomePai'),
            'nomeMae'          => $this->request->getPost('nomeMae'),
            'cpf'          => $this->request->getPost('cpf'),
            'rg'          => $this->request->getPost('rg'),
            'dataEmissaoRg'          => $this->request->getPost('dataEmissaoRg'),
            'ctps'          => $this->request->getPost('ctps'),
            'dataEmissaoCtps'          => $this->request->getPost('dataEmissaoCtps'),
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
            'dataInativo'          => $this->request->getPost('dataInativo'),
            'arquivoCtps'          => $this->request->getPost('arquivoCtps'),
            'arquivoPis'          => $this->request->getPost('arquivoPis'),
            'arquivoRg'          => $this->request->getPost('arquivoRg'),
            'arquivoCpf'          => $this->request->getPost('arquivoCpf'),
            'arquivoTituloEleitor'          => $this->request->getPost('arquivoTituloEleitor'),
            'arquivoCertidaoNascimentoCasamento'          => $this->request->getPost('arquivoCertidaoNascimentoCasamento'),
            'arquivoComprovanteResidencia'          => $this->request->getPost('arquivoComprovanteResidencia'),
            'arquivoExtratoPrevidenciario'          => $this->request->getPost('arquivoExtratoPrevidenciario'),
            'criadoPor'     => $this->usuario['id'],
            'alteradoPor'   => $this->usuario['id'],
        ];
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