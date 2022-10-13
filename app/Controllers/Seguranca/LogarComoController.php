<?php namespace App\Controllers\Seguranca;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class LogarComoController extends BaseController
{
    private $rota = 'relacao-usuarios';
    private $tituloPage = 'Usuários do Sistema';
    private $templatePage = 'Usuarios';
    
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $data["Usuarios"] = $usuarioModel->orderBy("nome")->findAll();

        $data['rota'] = $this->rota;
        $data['tituloPage'] = $this->tituloPage;
        $data['templatePage'] = $this->templatePage;
        
        return view('Usuario/logarComo', $data);
    }
    
    public function new()
    {
        
        return "Opção desativada";
    }
    
    
    
    public function create()
    {
        
        $usuario = $this->request->getPost("usuarioId");
        $usuarioModel = new UsuarioModel();
        $usuarioLogado = $usuarioModel->where('id', $usuario)->first();
        
        $session =  \Config\Services::session(); 
        //$session->destroy();
        
        $session->set("UsuarioLogado", $usuarioLogado);

        $session->set("UsuarioEmpresaNome", null );
        $session->set("UsuarioEmpresaAmbienteId", null);
        $session->set("UsuarioIsLtcat", null);
        $session->set("UsuarioIsLip", null);


        return redirect()->to(base_url('seleciona-empresa'));

        
    }
    

    public function edit($id = null)
    {
 
        return "";
    }
    
    public function update($id = null)
    {
        return "";
    }
    

    public function delete($id = null)
    {
        return "Opção desativada.";
    }

}