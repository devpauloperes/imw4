<?php
namespace App\Libraries;
class AuthLibrary
{
    private $session;
    public function __construct(){
       $this->session = \Config\Services::session(); 
    }

    public function isLoggedIn(){
        return ($this->session->get('UsuarioLogado')!== null)?TRUE:FALSE;
    }

    public function isSelectEmpresaIn(){
        return ($this->session->get('UsuarioEmpresaId')!== null)?TRUE:FALSE;
    }
} 