<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AutenticacaoFilter implements FilterInterface {

    public function before(RequestInterface $request, $argumentos = null) {
       
        //var_dump($request);

        $auth = \Config\Services::authentif();   
        
        if ($auth->isLoggedIn() === false) {
            if ($request->uri->getPath() != "login"
               && $request->uri->getPath() != "registro"
               && $request->uri->getPath() != "selecionar-instituicao"
               && $request->uri->getPath() != "esqueci-minha-senha"
               && $request->uri->getPath() != "trocar-senha"
               && $request->uri->getPath() != "confirmar-cadastro"
                )
            {
                return redirect("login");
            }
            
        }
        
        /*
        $router = service('router'); 
        $controller  = $router->controllerName(); 
        $method = $router->methodName();
        echo $controller;
        echo "-" . $method;
       */

    }

    public function after(RequestInterface $request, ResponseInterface $response, $argumentos = null) {
    }
} 