<?php namespace App\Controllers\Aspirantes;

use App\Controllers\BaseController;
use App\Models\Aspirante\AspiranteModel;
use App\Models\EscolaridadeModel;
use App\Models\InstituicaoModel;

class AspiranteGerencialController extends BaseController
{
    private $rota = 'aspirante';
    private $tituloPage = 'Cadastro de Aspirantes';
    private $templatePage = 'Seguranca';
    
    public function index()
    {
        $model = new AspiranteModel();
        $data['registros'] = $model->where('usuarioId', $this->usuario['id'])
                               ->orderBy('nome')
                               ->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;
        $data['rota'] = $this->rota;
        $data['tituloPage'] = $this->tituloPage;
        $data['templatePage'] = $this->templatePage;

        return view( $this->templatePage . '/list', $data);
    }
    
    public function new()
    {
        $data['tituloPage'] = $this->tituloPage;
        $data['templatePage'] = $this->templatePage;

        $escolaridadeModel = new EscolaridadeModel();
        $data["escolaridade"] = $escolaridadeModel->findAll();

        $instituicaoModel = new InstituicaoModel();
        $data["Instituicao"] = $instituicaoModel->findAll();


        return view($this->templatePage . '/Aspirante',$data);
    }
    
    private function getDados(){
        $data = [
            'usuarioId'     => $this->usuario['id'],
            'nome'          => $this->request->getPost('nome'),
            'nomePai'          => $this->request->getPost('nomePai'),
            'nomeMae'          => $this->request->getPost('nomeMae'),
            'dataNascimento'          => $this->request->getPost('dataNascimento'),
            'email'          => $this->request->getPost('email'),
            'nacionalidade'          => $this->request->getPost('nacionalidade'),
            'escolaridadeId'          => $this->request->getPost('escolaridadeId'),
            'sexo'          => $this->request->getPost('sexo'),
            'estadoCivil'          => $this->request->getPost('estadoCivil'),
            'nomeConjuge'          => $this->request->getPost('nomeConjuge'),
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
            'igrejaId'          => $this->request->getPost('igrejaId'),
            'criadoPor'     => $this->usuario['id'],
            'alteradoPor'   => $this->usuario['id'],
        ];
        return $data;
    }
    
    public function create()
    {
        helper(['form', 'url']);
        
        $model = new AspiranteModel();
        $data = $this->getDados();
        $save = $model->insert($data);	
        
        return redirect()->to( base_url($this->rota . '/?msg=Cadastro realizado com Sucesso!') );

        
    }
    

    public function edit($id = null)
    {
        $model = new AspiranteModel();
        $data['entidade'] = $model->where('id', $id)->first();
        $data['rota'] = $this->rota;
        $data['tituloPage'] = $this->tituloPage;
        $data['templatePage'] = $this->templatePage;
 
        return view($this->templatePage . '/edit', $data);
    }
    
    public function update($id = null)
    {
        helper(['form', 'url']);

        $model = new AspiranteModel();
        $data = $this->getDados();
        $save = $model->update($id, $data);
            
        return redirect()->to( base_url($this->rota . '/?msg=Cadastro alterado com Sucesso!') );
    }
    

    public function delete($id = null)
    {
        $model = new AspiranteModel();
        $model->delete($id); 

        return redirect()->to( base_url($this->rota . '/?msg=Cadastro removido com Sucesso!') );
    }

}