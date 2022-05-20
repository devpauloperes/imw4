<?php namespace App\Controllers\Seguranca;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class TrocarSenhaController extends BaseController
{

    public function index()
	{
        return view('Seguranca/Trocar_Senha');
    }
    
    public function new()
	{
		return view('welcome_message');
    }
    
    public function create()
	{
		helper(['form', 'url']);
		
		$erros = array();
        $model = new UsuarioModel();
		$hash = $this->request->getPost("hash");
        
        $usuario = $model->buscarPorHash($hash);

		if ($usuario != null)
		{  
            $usuario["senha"] = sha1($this->request->getPost("senha"));
            $dt = new \DateTime("NOW");
            $usuario["observacao"] .= ", Reset de senha em ". $dt->format("d/m/Y h:m:s"); 
            $model->update($usuario["id"], $usuario);
			return redirect()->to( base_url("login?msg=Sua senha foi alterada com sucesso. Entre com seu E-mail e a nova senha cadastrada.") );
		} else 
		{
			return redirect()->to( base_url("login?erro=Usuário não encontrado.") );
		}
    }
    
    public function show()
	{
		return view('welcome_message');
    }
    

    public function edit()
	{
		return view('welcome_message');
    }
    
    public function update()
	{
		return view('welcome_message');
    }
    

    public function delete()
	{
		return view('welcome_message');
	}

}
