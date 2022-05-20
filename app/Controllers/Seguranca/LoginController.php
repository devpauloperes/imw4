<?php namespace App\Controllers\Seguranca;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class LoginController extends BaseController
{

    public function index()
	{	

		return view("Seguranca/Login");
    }
    
    public function new()
	{

		return view('welcome_message');
    }
    
    public function create()
	{
		helper(['form', 'url']);
		$model = new UsuarioModel();
		
		$usuarioLogado = $model->login($this->request->getPost("cpf"), $this->request->getPost("senha"));
		$session =  \Config\Services::session(); 
		if ($usuarioLogado != null)
		{	
			if ($usuarioLogado["isAtivo"] == 1)
			{
				$session->set("UsuarioLogado", $usuarioLogado);

				//consulta se existe instituicao vinculada

				//se existir apenas 1 instituicao, redireciona diretamente para a instituicao

				//se existir mais de 1 instituicao, redireciona para a seleção de instituições
			
				return redirect()->to(base_url());
				
			}
			else{
				return redirect()->to(base_url("login?erro=Usuário desativado."));
			}
		}
		else
		{
			return redirect()->to(base_url("login?erro=Usuário ou senha Inválido."));
			
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
