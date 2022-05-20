<?php namespace App\Controllers\Seguranca;

use App\Controllers\BaseController;
use App\Models\UsuarioInstituicaoModel;
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

				$usuarioInstituicaoModel = new UsuarioInstituicaoModel();
				$usuarioInstituicoes = $usuarioInstituicaoModel->where("usuarioId", $usuarioLogado["id"])->findAll();

				//consulta se existe instituicao vinculada
				if ($usuarioInstituicoes == null){
					return redirect()->to(base_url());
				}
				//se existir apenas 1 instituicao, redireciona diretamente para a instituicao
				else if (count($usuarioInstituicoes) == 1){
					$instituicao = $usuarioInstituicoes[0];
					return redirect()->to(base_url("selecionar-instituicao/" . $instituicao["instituicaoId"] ));
				}
				//se existir mais de 1 instituicao, redireciona para a seleção de instituições
				else if (count($usuarioInstituicoes) > 1){ 
					return redirect()->to(base_url("selecionar-instituicao"));
				}
			
				
				
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
