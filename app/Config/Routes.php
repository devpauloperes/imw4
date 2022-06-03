<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//rotas do login
$routes->get('/login', 'Seguranca\LoginController::index');
$routes->post('/login', 'Seguranca\LoginController::create');
$routes->get('/logoff', 'Seguranca\LogoffController::index');

//rotas do EsqueciMinhaSenha
$routes->get('/esqueci-minha-senha', 'Seguranca\EsqueciMinhaSenhaController::index');
$routes->post('/esqueci-minha-senha', 'Seguranca\EsqueciMinhaSenhaController::create');

//trocar senha
$routes->get('/trocar-senha', 'Seguranca\TrocarSenhaController::index');
$routes->post('/trocar-senha', 'Seguranca\TrocarSenhaController::create');

//Mudar Senha
$routes->get('mudar-senha/new',                	'Seguranca\MudarSenhaController::new');
$routes->post('mudar-senha',                   	'Seguranca\MudarSenhaController::create');
$routes->get('mudar-senha',                    	'Seguranca\MudarSenhaController::index');
$routes->get('mudar-senha/(:segment)',    	  	'Seguranca\MudarSenhaController::edit/$1');
$routes->post('mudar-senha/update/(:segment)', 	'Seguranca\MudarSenhaController::update/$1');
$routes->get('mudar-senha/delete/(:segment)', 	'Seguranca\MudarSenhaController::delete/$1');

//Selecionar instituicao
$routes->get('selecionar-instituicao/new',                	'Seguranca\SelecionarInstituicaoController::new');
$routes->post('selecionar-instituicao',                   	'Seguranca\SelecionarInstituicaoController::create');
$routes->get('selecionar-instituicao',                    	'Seguranca\SelecionarInstituicaoController::index');
$routes->get('selecionar-instituicao/(:segment)',    	  	'Seguranca\SelecionarInstituicaoController::edit/$1');
$routes->post('selecionar-instituicao/update/(:segment)', 	'Seguranca\SelecionarInstituicaoController::update/$1');
$routes->get('selecionar-instituicao/delete/(:segment)', 	'Seguranca\SelecionarInstituicaoController::delete/$1');

//Usuarios
$routes->get('usuarios/new',                	'UsuarioController::new');
$routes->post('usuarios',                   	'UsuarioController::create');
$routes->get('usuarios',                    	'UsuarioController::index');
$routes->get('usuarios/(:segment)',    	  	'UsuarioController::edit/$1');
$routes->post('usuarios/update/(:segment)', 	'UsuarioController::update/$1');
$routes->get('usuarios/delete/(:segment)', 	'UsuarioController::delete/$1');

//Empresas
$routes->get('empresas/new',                	'EmpresaController::new');
$routes->post('empresas',                   	'EmpresaController::create');
$routes->get('empresas',                    	'EmpresaController::index');
$routes->get('empresas/(:segment)',    	  	'EmpresaController::edit/$1');
$routes->post('empresas/update/(:segment)', 	'EmpresaController::update/$1');
$routes->get('empresas/delete/(:segment)', 	'EmpresaController::delete/$1');

//Industria
$routes->get('tipo-instituicao/new',                	'TipoInstituicaoController::new');
$routes->post('tipo-instituicao',                   	'TipoInstituicaoController::create');
$routes->get('tipo-instituicao',                    	'TipoInstituicaoController::index');
$routes->get('tipo-instituicao/(:segment)',    	  	'TipoInstituicaoController::edit/$1');
$routes->post('tipo-instituicao/update/(:segment)', 	'TipoInstituicaoController::update/$1');
$routes->get('tipo-instituicao/delete/(:segment)', 	'TipoInstituicaoController::delete/$1');

//Representante
$routes->get('instituicao/new',                	'InstituicaoController::new');
$routes->post('instituicao',                   	'InstituicaoController::create');
$routes->get('instituicao',                    	'InstituicaoController::index');
$routes->get('instituicao/(:segment)',    	  	'InstituicaoController::edit/$1');
$routes->post('instituicao/update/(:segment)', 	'InstituicaoController::update/$1');
$routes->get('instituicao/delete/(:segment)', 	'InstituicaoController::delete/$1');

//Promotor
$routes->get('usuario-instituicao/new',                	'UsuarioInstituicaoController::new');
$routes->post('usuario-instituicao',                   	'UsuarioInstituicaoController::create');
$routes->get('usuario-instituicao',                    	'UsuarioInstituicaoController::index');
$routes->get('usuario-instituicao/(:segment)',    	  	'UsuarioInstituicaoController::edit/$1');
$routes->post('usuario-instituicao/update/(:segment)', 	'UsuarioInstituicaoController::update/$1');
$routes->get('usuario-instituicao/delete/(:segment)', 	'UsuarioInstituicaoController::delete/$1');

//Mebresia
$routes->get('membro/new',                	'MembroController::new');
$routes->post('membro',                   	'MembroController::create');
$routes->get('membro',                    	'MembroController::index');
$routes->get('membro/(:segment)',    	  	'MembroController::edit/$1');
$routes->post('membro/update/(:segment)', 	'MembroController::update/$1');
$routes->get('membro/delete/(:segment)', 	'MembroController::delete/$1');

//Historico Membro
$routes->get('membro-historico/new',                	'MembroHistoricoController::new');
$routes->post('membro-historico',                   	'MembroHistoricoController::create');
$routes->get('membro-historico',                    	'MembroHistoricoController::index');
$routes->get('membro-historico/(:segment)',    	  	'MembroHistoricoController::edit/$1');
$routes->post('membro-historico/update/(:segment)', 	'MembroHistoricoController::update/$1');
$routes->get('membro-historico/delete/(:segment)', 	'MembroHistoricoController::delete/$1');

//Capacitacao do Membro
$routes->get('membro-capacitacao/new',                	'MembroCapacitacaoController::new');
$routes->post('membro-capacitacao',                   	'MembroCapacitacaoController::create');
$routes->get('membro-capacitacao',                    	'MembroCapacitacaoController::index');
$routes->get('membro-capacitacao/(:segment)',    	  	'MembroCapacitacaoController::edit/$1');
$routes->post('membro-capacitacao/update/(:segment)', 	'MembroCapacitacaoController::update/$1');
$routes->get('membro-capacitacao/delete/(:segment)', 	'MembroCapacitacaoController::delete/$1');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
