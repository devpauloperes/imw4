<?php namespace App\Controllers\Seguranca;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class EsqueciMinhaSenhaController extends BaseController
{

    public function index()
	{
		return view("Seguranca/Esqueci_Minha_Senha");
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
		//$hash = $this->request->getGet("usuario");

		$cpf = $this->request->getPost("cpf");
		$usuario = $model->buscarPorCPF($cpf);

		if ($usuario != null)
		{ 
			//
			// enviar e-mail com código de ativacao
			//
			$config = array();
			$config['mailType'] = env("smtp.mailType");
			$config['protocol'] = env("smtp.protocol");
			$config['SMTPHost'] = env("smtp.SMTPHost");
			$config['SMTPUser']  = env("smtp.SMTPUser");
			$config['SMTPPass']  = env("smtp.SMTPPass");
			$config['SMTPPort']  = env("smtp.SMTPPort");
			$config['SMTPCrypto']  = env("smtp.SMTPCrypto");

			$email = \Config\Services::email();
			$email->initialize($config);

			$email->setFrom( env("smtp.SMTPUser") , env('TituloSistema') . ' - Sistema');
			$email->setTo($usuario["email"]);

			$email->setSubject(env('TituloSistema') . ' - Recuperar Senha');

			$mensagem = "<h3> Recuperar Senha </h3>
			
				<p> Prezado (a), ". $usuario["nome"] . " </p>

				<p> Altere sua senha clicando no link abaixo:</p>

				<p> <b> ". env("app.baseURL") ."/trocar-senha/?usuario=". $usuario["hash"] ." </b> </p>
				
				<address>
					Equipe ". env('TituloSistema') ." <br />
					".  env('app.baseURL')  ."

				</address>
			
			";

			$email->setMessage($mensagem);

			$email->send();
			
			return redirect()->to( base_url("login?msg=Verifique seu e-mail ". $usuario["email"].", siga as instrucões para redefir sua senha.") );

		} else 
		{
			return redirect()->to( base_url("login?erro=Usuário não encontrado!") );
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
