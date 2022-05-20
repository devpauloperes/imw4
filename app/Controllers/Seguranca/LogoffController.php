<?php namespace App\Controllers\Seguranca;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class LogoffController extends BaseController
{

    public function index()
	{
        $session =  \Config\Services::session();
        $session->destroy();

        return redirect()->to(base_url("login?msg=Você fez logoff no sistema."));
    }
    
    public function new()
	{
		return view('welcome_message');
    }
    
    public function create()
	{
		return "";
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
