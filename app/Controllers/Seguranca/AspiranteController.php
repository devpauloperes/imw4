<?php

namespace App\Controllers\Seguranca;

use App\Controllers\BaseController;
use App\Models\Aspirante\AspiranteModel;
use App\Models\EscolaridadeModel;
use App\Models\InstituicaoModel;
use App\Models\UsuarioModel;
use DateTime;

class AspiranteController extends BaseController
{
    private $rota = 'aspirante';
    private $tituloPage = 'Cadastro de Aspirantes';
    private $templatePage = 'Seguranca';



    public function new()
    {
        $data['tituloPage'] = $this->tituloPage;
        $data['templatePage'] = $this->templatePage;

        $escolaridadeModel = new EscolaridadeModel();
        $data["escolaridade"] = $escolaridadeModel->findAll();

        $instituicaoModel = new InstituicaoModel();
        $data["Instituicao"] = $instituicaoModel->where(["tipoInstituicaoId"=> 1 ])->orWhere(["tipoInstituicaoId"=> 13 ])->findAll();


        return view($this->templatePage . '/Aspirante', $data);
    }

    private function getDados()
    {
        $data = [
            'usuarioId'     => $this->usuario['id'],
            'nome'          => $this->request->getPost('nome'),
            'cpf'          => preg_replace('/[^0-9]/', '', $this->request->getPost("cpf")),
            'nomePai'          => $this->request->getPost('nomePai'),
            'nomeMae'          => $this->request->getPost('nomeMae'),

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

        if ($this->request->getPost('dataNascimento') != "") {
            $dataNascimento = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataNascimento'));
            $data["dataNascimento"] = date_format($dataNascimento, "Y-m-d");
        }

        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $cpf = preg_replace('/[^0-9]/', '', $this->request->getPost("cpf"));
        $usuarioModel = new UsuarioModel();
        $model = new AspiranteModel();

        $existeUsuario = $usuarioModel->find(["cpf" => $cpf]);
        $existeAspirante = $model->find(["cpf" => $cpf]);

        if ($existeAspirante == null && $existeUsuario == null) {
            //
            //criar um usuário
            //
            $dataUsuario["perfilId"] = 5; //aspirante
            $dataUsuario["hash"] = sha1(preg_replace('/[^0-9]/', '', $this->request->getPost("cpf")));
            $dataUsuario["nome"] = $this->request->getPost("nome");
            $dataUsuario["cpf"] = preg_replace('/[^0-9]/', '', $this->request->getPost("cpf"));
            $dataUsuario["email"] = $this->request->getPost("email");
            $dataUsuario["celular"] = $this->request->getPost("celular");
            $dataUsuario["senha"] = sha1(substr($dataUsuario["cpf"], 0, 6));
            $dataUsuario["isAtivo"] = 1;
            $dataUsuario["isSuperUsuario"] = 0;

            // var_dump($dataUsuario);

            $idUsuario = $usuarioModel->insert($dataUsuario);

            $data = $this->getDados();
            $data["usuarioId"] = $idUsuario;
            $save = $model->insert($data);

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

            $email->setFrom(env("smtp.SMTPUser"), env('TituloSistema') . ' - Sistema');
            $email->setTo($data["email"]);

            $email->setSubject(env('TituloSistema') . ' - Recuperar Senha');

            $mensagem = "<h3> Cadastro de Aspirantes </h3>
			
				<p> Prezado (a), " . $data["nome"] . " </p>

				<p> Você se cadastrou com sucesso no sistema da imw4, segue abaixo sua senha de acesso:</p>

				<p> <b>" . substr($dataUsuario["cpf"], 0, 6) . " </b> </p>

                <p> Acesse o sistema pelo endereço: " . env("app.baseURL") . ". </p>
				
				<address>
					Equipe " . env('TituloSistema') . " <br />
					" .  env('app.baseURL')  . "

				</address>
			
			";

            $email->setMessage($mensagem);

            //$email->send();

            return redirect()->to(base_url('login/?msg=Você se cadastrou com sucesso, sua senha de acesso foi envada para o e-mail cadastrado. Verifique seu e-mail!'));
        } else {
            return redirect()->to(base_url('login/?erro=Aspirante ou usuário já cadastrado, favor entrar em contato com o suporte: devpauloperes@gmail.com'));
        }
    }
}
