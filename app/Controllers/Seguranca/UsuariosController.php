<?php namespace App\Controllers\Seguranca;

use App\Controllers\BaseController;
use App\Models\Seguranca\UsuariosModel;

class UsuariosController extends BaseController
{
    private $rota = 'usuarios';
    private $tituloPage = 'Usuários do Sistema';
    private $templatePage = 'Usuarios';
    
    public function index()
    {
        $model = new UsuariosModel();

        $filtrosLike = [];
        if ($this->request->getGet("nome") != ""){
            $filtrosLike["nome"] =  $this->request->getGet("nome") ;
                
        }
        
        $filtros = [];
        if ($this->request->getGet("perfilId") != ""){
            $filtros["perfilId"] = $this->request->getGet("perfilId");
        }
       

        $data['registros'] = $model->where($filtros)
                                ->like($filtrosLike)
                                ->orderBy('nome')
                                ->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;
        $data['rota'] = $this->rota;
        $data['tituloPage'] = $this->tituloPage;
        $data['templatePage'] = $this->templatePage;
        
        return view('Usuarios/list', $data);
    }
    
    public function new()
    {
        $data['rota'] = $this->rota;
        $data['tituloPage'] = $this->tituloPage;
        $data['templatePage'] = $this->templatePage;
        return view('Usuarios/new', $data);
    }
    
    private function getDados(){
        $data = [
            'usuarioId'     => $this->usuario['id'],
            'hash'          => $this->request->getPost('hash'),
            'perfilId'          => $this->request->getPost('perfilId'),
            'nome'          => $this->request->getPost('nome'),
            'cpf'          => $this->request->getPost('cpf'),
            'profissao'          => $this->request->getPost('profissao'),
            'email'          => $this->request->getPost('email'),
            'senha'          => $this->request->getPost('senha'),
            'endereco'          => $this->request->getPost('endereco'),
            'numero'          => $this->request->getPost('numero'),
            'complemento'          => $this->request->getPost('complemento'),
            'bairro'          => $this->request->getPost('bairro'),
            'cidade'          => $this->request->getPost('cidade'),
            'cep'          => $this->request->getPost('cep'),
            'estado'          => $this->request->getPost('estado'),
            'celular'          => $this->request->getPost('celular'),
            'telefone1'          => $this->request->getPost('telefone1'),
            'telefone2'          => $this->request->getPost('telefone2'),
            'contratoPestacaoServico'          => $this->request->getPost('contratoPestacaoServico'),
            'carteiraVacina'          => $this->request->getPost('carteiraVacina'),
            'registroConselho'          => $this->request->getPost('registroConselho'),
            'nadaConsta'          => $this->request->getPost('nadaConsta'),
            'comprovanteEndereco'          => $this->request->getPost('comprovanteEndereco'),
            'observacao'          => $this->request->getPost('observacao'),
            'isAtivo'          => ($this->request->getPost('isAtivo') != null) ? $this->request->getPost('isAtivo') : 0,
            'criadoPor'     => $this->usuario['id'],
            'alteradoPor'   => $this->usuario['id'],
        ];

        $img = $this->request->getFile('contratoPestacaoServico');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/contratoPestacaoServico/', $newName);
            $data["contratoPestacaoServico"] = $newName;
        }

        $img = $this->request->getFile('carteiraVacina');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/carteiraVacina/', $newName);
            $data["carteiraVacina"] = $newName;
        }

        $img = $this->request->getFile('registroConselho');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/registroConselho/', $newName);
            $data["registroConselho"] = $newName;
        }

        $img = $this->request->getFile('nadaConsta');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/nadaConsta/', $newName);
            $data["nadaConsta"] = $newName;
        }

        $img = $this->request->getFile('comprovanteEndereco');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/comprovanteEndereco/', $newName);
            $data["comprovanteEndereco"] = $newName;
        }

        
        return $data;
    }
    
    public function create()
    {
        helper(['form', 'url']);
        
        $model = new UsuariosModel();
        $data = $this->getDados();
        $data["senha"] = sha1("123456");
        $save = $model->insert($data);	

        
        return redirect()->to( base_url($this->rota . '/?msg=Cadastro realizado com Sucesso!&perfilId=0') );

        
    }
    

    public function edit($id = null)
    {
        $model = new UsuariosModel();
        $data['entidade'] = $model->where('id', $id)->first();
        $data['rota'] = $this->rota;
        $data['tituloPage'] = $this->tituloPage;
        $data['templatePage'] = $this->templatePage;
 
        return view('Usuarios/edit', $data);
    }
    
    public function update($id = null)
    {
        helper(['form', 'url']);

        $model = new UsuariosModel();
        $data = $this->getDados();
        $save = $model->update($id, $data);
            
        return redirect()->to( base_url($this->rota . '/?msg=Cadastro alterado com Sucesso!&perfilId=0') );
    }
    

    public function delete($id = null)
    {
        $model = new UsuariosModel();
        $model->delete($id); 

        return redirect()->to( base_url($this->rota . '/?msg=Cadastro removido com Sucesso!&perfilId=0') );
    }

}