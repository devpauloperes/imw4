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
$routes->get('mudar-senha/new',                    'Seguranca\MudarSenhaController::new');
$routes->post('mudar-senha',                       'Seguranca\MudarSenhaController::create');
$routes->get('mudar-senha',                        'Seguranca\MudarSenhaController::index');
$routes->get('mudar-senha/(:segment)',              'Seguranca\MudarSenhaController::edit/$1');
$routes->post('mudar-senha/update/(:segment)',     'Seguranca\MudarSenhaController::update/$1');
$routes->get('mudar-senha/delete/(:segment)',     'Seguranca\MudarSenhaController::delete/$1');

//aspirante
$routes->get('aspirante/new',                    'Seguranca\AspiranteController::new');
$routes->post('aspirante',                       'Seguranca\AspiranteController::create');

//Clerigo
$routes->get('clerigo/new',                    'Seguranca\ClerigoController::new');
$routes->post('clerigo',                       'Seguranca\ClerigoController::create');



//Selecionar instituicao
$routes->get('selecionar-instituicao/new',                    'Seguranca\SelecionarInstituicaoController::new');
$routes->post('selecionar-instituicao',                       'Seguranca\SelecionarInstituicaoController::create');
$routes->get('selecionar-instituicao',                        'Seguranca\SelecionarInstituicaoController::index');
$routes->get('selecionar-instituicao/(:segment)',              'Seguranca\SelecionarInstituicaoController::edit/$1');
$routes->post('selecionar-instituicao/update/(:segment)',     'Seguranca\SelecionarInstituicaoController::update/$1');
$routes->get('selecionar-instituicao/delete/(:segment)',     'Seguranca\SelecionarInstituicaoController::delete/$1');


//tipo-instituicao
$routes->get('tipo-instituicao/new',                    'TipoInstituicaoController::new');
$routes->post('tipo-instituicao',                       'TipoInstituicaoController::create');
$routes->get('tipo-instituicao',                        'TipoInstituicaoController::index');
$routes->get('tipo-instituicao/(:segment)',              'TipoInstituicaoController::edit/$1');
$routes->post('tipo-instituicao/update/(:segment)',     'TipoInstituicaoController::update/$1');
$routes->get('tipo-instituicao/delete/(:segment)',     'TipoInstituicaoController::delete/$1');


//Instituição
$routes->get('instituicao/new',                    'InstituicaoController::new');
$routes->post('instituicao',                       'InstituicaoController::create');
$routes->get('instituicao',                        'InstituicaoController::index');
$routes->get('instituicao/(:segment)',              'InstituicaoController::edit/$1');
$routes->post('instituicao/update/(:segment)',     'InstituicaoController::update/$1');
$routes->get('instituicao/delete/(:segment)',     'InstituicaoController::delete/$1');


//Usuarios
$routes->get('usuarios/new',                    'UsuarioController::new');
$routes->post('usuarios',                       'UsuarioController::create');
$routes->get('usuarios',                        'UsuarioController::index');
$routes->get('usuarios/(:segment)',              'UsuarioController::edit/$1');
$routes->post('usuarios/update/(:segment)',     'UsuarioController::update/$1');
$routes->get('usuarios/delete/(:segment)',     'UsuarioController::delete/$1');

//Funcao Eclesiastica
$routes->get('funcao-eclesiastica/new',                    'FuncaoEclesiasticaController::new');
$routes->post('funcao-eclesiastica',                       'FuncaoEclesiasticaController::create');
$routes->get('funcao-eclesiastica',                        'FuncaoEclesiasticaController::index');
$routes->get('funcao-eclesiastica/(:segment)',              'FuncaoEclesiasticaController::edit/$1');
$routes->post('funcao-eclesiastica/update/(:segment)',     'FuncaoEclesiasticaController::update/$1');
$routes->get('funcao-eclesiastica/delete/(:segment)',     'FuncaoEclesiasticaController::delete/$1');

//Usuarios Instituicao
$routes->get('usuario-instituicao/new',                    'UsuarioInstituicaoController::new');
$routes->post('usuario-instituicao',                       'UsuarioInstituicaoController::create');
$routes->get('usuario-instituicao',                        'UsuarioInstituicaoController::index');
$routes->get('usuario-instituicao/(:segment)',              'UsuarioInstituicaoController::edit/$1');
$routes->post('usuario-instituicao/update/(:segment)',     'UsuarioInstituicaoController::update/$1');
$routes->get('usuario-instituicao/delete/(:segment)',     'UsuarioInstituicaoController::delete/$1');

//Comissões
$routes->get('comissao/new',                    'ComissaoController::new');
$routes->post('comissao',                       'ComissaoController::create');
$routes->get('comissao',                        'ComissaoController::index');
$routes->get('comissao/(:segment)',              'ComissaoController::edit/$1');
$routes->post('comissao/update/(:segment)',     'ComissaoController::update/$1');
$routes->get('comissao/delete/(:segment)',     'ComissaoController::delete/$1');

//logar como
$routes->get('troca-usuario/new',                    'Seguranca\LogarComoController::new');
$routes->post('troca-usuario',                       'Seguranca\LogarComoController::create');
$routes->get('troca-usuario',                        'Seguranca\LogarComoController::index');
$routes->get('troca-usuario/(:segment)',              'Seguranca\LogarComoController::edit/$1');
$routes->post('troca-usuario/update/(:segment)',     'Seguranca\LogarComoController::update/$1');
$routes->get('troca-usuario/delete/(:segment)',     'Seguranca\LogarComoController::delete/$1');

//Instituição
$routes->get('aspirante-documentos/new',                    'Aspirantes\AspiranteDocumentoController::new');
$routes->post('aspirante-documentos',                       'Aspirantes\AspiranteDocumentoController::create');
$routes->get('aspirante-documentos',                        'Aspirantes\AspiranteDocumentoController::index');
$routes->get('aspirante-documentos/(:segment)',             'Aspirantes\AspiranteDocumentoController::edit/$1');
$routes->post('aspirante-documentos/update/(:segment)',     'Aspirantes\AspiranteDocumentoController::update/$1');
$routes->get('aspirante-documentos/delete/(:segment)',      'Aspirantes\AspiranteDocumentoController::delete/$1');

//clerigos - area privada
$routes->get('clerigos/new',                     'Clerigo\ClerigoController::new');
$routes->post('clerigos',                        'Clerigo\ClerigoController::create');
$routes->get('clerigos',                         'Clerigo\ClerigoController::index');
$routes->get('clerigos/(:segment)',              'Clerigo\ClerigoController::edit/$1');
$routes->post('clerigos/update/(:segment)',      'Clerigo\ClerigoController::update/$1');
$routes->get('clerigos/delete/(:segment)',       'Clerigo\ClerigoController::delete/$1');

//dependentes
$routes->get('clerigo-dependente/new',                     'Clerigo\ClerigoDependenteController::new');
$routes->post('clerigo-dependente',                        'Clerigo\ClerigoDependenteController::create');
$routes->get('clerigo-dependente',                         'Clerigo\ClerigoDependenteController::index');
$routes->get('clerigo-dependente/(:segment)',              'Clerigo\ClerigoDependenteController::edit/$1');
$routes->post('clerigo-dependente/update/(:segment)',      'Clerigo\ClerigoDependenteController::update/$1');
$routes->get('clerigo-dependente/delete/(:segment)',       'Clerigo\ClerigoDependenteController::delete/$1');

//curriculo
$routes->get('clerigo-curriculo/new',                     'Clerigo\ClerigoCurriculoController::new');
$routes->post('clerigo-curriculo',                        'Clerigo\ClerigoCurriculoController::create');
$routes->get('clerigo-curriculo',                         'Clerigo\ClerigoCurriculoController::index');
$routes->get('clerigo-curriculo/(:segment)',              'Clerigo\ClerigoCurriculoController::edit/$1');
$routes->post('clerigo-curriculo/update/(:segment)',      'Clerigo\ClerigoCurriculoController::update/$1');
$routes->get('clerigo-curriculo/delete/(:segment)',       'Clerigo\ClerigoCurriculoController::delete/$1');


//carteira
$routes->get('clerigo-carteira-ministerial/(:segment)',                         'Clerigo\ClerigoCarteiraMinisterialController::index/$1');

//concilios
$routes->get('concilios/new',                     'Concilio\ConcilioController::new');
$routes->post('concilios',                        'Concilio\ConcilioController::create');
$routes->get('concilios',                         'Concilio\ConcilioController::index');
$routes->get('concilios/(:segment)',              'Concilio\ConcilioController::edit/$1');
$routes->post('concilios/update/(:segment)',      'Concilio\ConcilioController::update/$1');
$routes->get('concilios/delete/(:segment)',       'Concilio\ConcilioController::delete/$1');

//curriculo
$routes->get('concilio-votacao/new',                     'Concilio\VotacaoController::new');
$routes->post('concilio-votacao',                        'Concilio\VotacaoController::create');
$routes->get('concilio-votacao',                         'Concilio\VotacaoController::index');
$routes->get('concilio-votacao/(:segment)',              'Concilio\VotacaoController::edit/$1');
$routes->post('concilio-votacao/update/(:segment)',      'Concilio\VotacaoController::update/$1');
$routes->get('concilio-votacao/delete/(:segment)',       'Concilio\VotacaoController::delete/$1');

//curriculo
$routes->get('concilio-votacao-opcao/new',                     'Concilio\VotacaoOpcaoController::new');
$routes->post('concilio-votacao-opcao',                        'Concilio\VotacaoOpcaoController::create');
$routes->get('concilio-votacao-opcao',                         'Concilio\VotacaoOpcaoController::index');
$routes->get('concilio-votacao-opcao/(:segment)',              'Concilio\VotacaoOpcaoController::edit/$1');
$routes->post('concilio-votacao-opcao/update/(:segment)',      'Concilio\VotacaoOpcaoController::update/$1');
$routes->get('concilio-votacao-opcao/delete/(:segment)',       'Concilio\VotacaoOpcaoController::delete/$1');


//curriculo
$routes->get('concilio-informativos/new',                     'Concilio\ConcilioInformativoController::new');
$routes->post('concilio-informativos',                        'Concilio\ConcilioInformativoController::create');
$routes->get('concilio-informativos',                         'Concilio\ConcilioInformativoController::index');
$routes->get('concilio-informativos/(:segment)',              'Concilio\ConcilioInformativoController::edit/$1');
$routes->post('concilio-informativos/update/(:segment)',      'Concilio\ConcilioInformativoController::update/$1');
$routes->get('concilio-informativos/delete/(:segment)',       'Concilio\ConcilioInformativoController::delete/$1');

//curriculo
$routes->get('concilio-pasta-relatorio/new',                     'Concilio\PastaRelatorioController::new');
$routes->post('concilio-pasta-relatorio',                        'Concilio\PastaRelatorioController::create');
$routes->get('concilio-pasta-relatorio',                         'Concilio\PastaRelatorioController::index');
$routes->get('concilio-pasta-relatorio/(:segment)',              'Concilio\PastaRelatorioController::edit/$1');
$routes->post('concilio-pasta-relatorio/update/(:segment)',      'Concilio\PastaRelatorioController::update/$1');
$routes->get('concilio-pasta-relatorio/delete/(:segment)',       'Concilio\PastaRelatorioController::delete/$1');

//curriculo
$routes->get('concilio-relatorio/new',                     'Concilio\RelatorioController::new');
$routes->post('concilio-relatorio',                        'Concilio\RelatorioController::create');
$routes->get('concilio-relatorio',                         'Concilio\RelatorioController::index');
$routes->get('concilio-relatorio/(:segment)',              'Concilio\RelatorioController::edit/$1');
$routes->post('concilio-relatorio/update/(:segment)',      'Concilio\RelatorioController::update/$1');
$routes->get('concilio-relatorio/delete/(:segment)',       'Concilio\RelatorioController::delete/$1');

//curriculo
$routes->get('concilio-conciliares/new',                     'Concilio\ConciliaresController::new');
$routes->post('concilio-conciliares',                        'Concilio\ConciliaresController::create');
$routes->get('concilio-conciliares',                         'Concilio\ConciliaresController::index');
$routes->get('concilio-conciliares/(:segment)',              'Concilio\ConciliaresController::edit/$1');
$routes->post('concilio-conciliares/update/(:segment)',      'Concilio\ConciliaresController::update/$1');
$routes->get('concilio-conciliares/delete/(:segment)',       'Concilio\ConciliaresController::delete/$1');

//atualizar lista de presentes
$routes->get('concilio-lista-presentes',                         'Concilio\AtualizarPresentesController::index');


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
