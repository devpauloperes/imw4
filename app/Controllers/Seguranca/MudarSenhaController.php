<?php namespace App\Controllers\Seguranca;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class MudarSenhaController extends BaseController
{
    
    public function index()
    {
        $model = new UsuarioModel();
        $data['entidade'] = $model->where('id', $this->usuario["id"])->first();
 
        return view('Usuario/MudarSenha/edit', $data);
    }
    
    public function new()
    {
       
    }
    
    private function getDados(){
        $data = [
            'senha' => sha1($this->request->getPost('senha-nova')),
            
        ];
        return $data;
    }
    
    public function create()
    {
       
        
    }
    

    public function edit($id = null)
    {
        
    }
    
    public function update($id = null)
    {
        helper(['form', 'url']);
        $senhaAtual = sha1($this->request->getPost("senha-atual"));

        if ($this->request->getPost("senha-nova") == $this->request->getPost("senha-confirmacao"))
        {
            if ( $senhaAtual == $this->usuario["senha"])
            {
                $model = new UsuarioModel();
                $data = $this->getDados();
                $save = $model->update($id, $data);        
                return redirect()->to( base_url( '/?msg=Senha Alterada com Sucesso!') );
            } else 
            {
                return redirect()->to( base_url('/?erro=A senha não foi alterada, a senha atual não confere!') );
            }
        }
        else 
        {
            return redirect()->to( base_url('/?msg=A senha não foi alterada, a senha nova e confirmacão não são igurais!') );
        }

    }
    

    public function delete($id = null)
    {
        
    }

}