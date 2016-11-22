<?php
/**
 * @package SGB
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'SecureExample.LoginForm'),
	'POST:login' => array('route' => 'SecureExample.Login'),
	'GET:secureuser' => array('route' => 'SecureExample.UserPage'),
	'GET:secureadmin' => array('route' => 'SecureExample.AdminPage'),
	'GET:logout' => array('route' => 'SecureExample.Logout'),
		
	// Bloqueio
	'GET:bloqueios' => array('route' => 'Bloqueio.ListView'),
	'GET:bloqueio/(:num)' => array('route' => 'Bloqueio.SingleView', 'params' => array('idbloqueio' => 1)),
	'GET:api/bloqueios' => array('route' => 'Bloqueio.Query'),
	'POST:api/bloqueio' => array('route' => 'Bloqueio.Create'),
	'GET:api/bloqueio/(:num)' => array('route' => 'Bloqueio.Read', 'params' => array('idbloqueio' => 2)),
	'PUT:api/bloqueio/(:num)' => array('route' => 'Bloqueio.Update', 'params' => array('idbloqueio' => 2)),
	'DELETE:api/bloqueio/(:num)' => array('route' => 'Bloqueio.Delete', 'params' => array('idbloqueio' => 2)),
		
	// CategoriaLivro
	'GET:categorialivros' => array('route' => 'CategoriaLivro.ListView'),
	'GET:categorialivro/(:any)' => array('route' => 'CategoriaLivro.SingleView', 'params' => array('idisbn' => 1)),
	'GET:api/categorialivros' => array('route' => 'CategoriaLivro.Query'),
	'POST:api/categorialivro' => array('route' => 'CategoriaLivro.Create'),
	'GET:api/categorialivro/(:any)' => array('route' => 'CategoriaLivro.Read', 'params' => array('idisbn' => 2)),
	'PUT:api/categorialivro/(:any)' => array('route' => 'CategoriaLivro.Update', 'params' => array('idisbn' => 2)),
	'DELETE:api/categorialivro/(:any)' => array('route' => 'CategoriaLivro.Delete', 'params' => array('idisbn' => 2)),
		
	// Livro
	'GET:livros' => array('route' => 'Livro.ListView'),
	'GET:livro/(:num)' => array('route' => 'Livro.SingleView', 'params' => array('idlivro' => 1)),
	'GET:api/livros' => array('route' => 'Livro.Query'),
	'POST:api/livro' => array('route' => 'Livro.Create'),
	'GET:api/livro/(:num)' => array('route' => 'Livro.Read', 'params' => array('idlivro' => 2)),
	'PUT:api/livro/(:num)' => array('route' => 'Livro.Update', 'params' => array('idlivro' => 2)),
	'DELETE:api/livro/(:num)' => array('route' => 'Livro.Delete', 'params' => array('idlivro' => 2)),
		
	// Localizacao
	'GET:localizacoes' => array('route' => 'Localizacao.ListView'),
	'GET:localizacao/(:num)' => array('route' => 'Localizacao.SingleView', 'params' => array('idlocalizacao' => 1)),
	'GET:api/localizacoes' => array('route' => 'Localizacao.Query'),
	'POST:api/localizacao' => array('route' => 'Localizacao.Create'),
	'GET:api/localizacao/(:num)' => array('route' => 'Localizacao.Read', 'params' => array('idlocalizacao' => 2)),
	'PUT:api/localizacao/(:num)' => array('route' => 'Localizacao.Update', 'params' => array('idlocalizacao' => 2)),
	'DELETE:api/localizacao/(:num)' => array('route' => 'Localizacao.Delete', 'params' => array('idlocalizacao' => 2)),
		
	// Movimentacao
	'GET:movimentacoes' => array('route' => 'Movimentacao.ListView'),
	'GET:movimentacao/(:num)' => array('route' => 'Movimentacao.SingleView', 'params' => array('idmovimentacao' => 1)),
	'GET:api/movimentacoes' => array('route' => 'Movimentacao.Query'),
	'POST:api/movimentacao' => array('route' => 'Movimentacao.Create'),
	'GET:api/movimentacao/(:num)' => array('route' => 'Movimentacao.Read', 'params' => array('idmovimentacao' => 2)),
	'PUT:api/movimentacao/(:num)' => array('route' => 'Movimentacao.Update', 'params' => array('idmovimentacao' => 2)),
	'DELETE:api/movimentacao/(:num)' => array('route' => 'Movimentacao.Delete', 'params' => array('idmovimentacao' => 2)),
		
	// Reserva
	'GET:reservas' => array('route' => 'Reserva.ListView'),
	'GET:reserva/(:num)' => array('route' => 'Reserva.SingleView', 'params' => array('dreserva' => 1)),
	'GET:api/reservas' => array('route' => 'Reserva.Query'),
	'POST:api/reserva' => array('route' => 'Reserva.Create'),
	'GET:api/reserva/(:num)' => array('route' => 'Reserva.Read', 'params' => array('dreserva' => 2)),
	'PUT:api/reserva/(:num)' => array('route' => 'Reserva.Update', 'params' => array('dreserva' => 2)),
	'DELETE:api/reserva/(:num)' => array('route' => 'Reserva.Delete', 'params' => array('dreserva' => 2)),
		
	// Usuario
	'GET:usuarios' => array('route' => 'Usuario.ListView'),
	'GET:usuario/(:any)' => array('route' => 'Usuario.SingleView', 'params' => array('idcpf' => 1)),
	'GET:api/usuarios' => array('route' => 'Usuario.Query'),
	'POST:api/usuario' => array('route' => 'Usuario.Create'),
	'GET:api/usuario/(:any)' => array('route' => 'Usuario.Read', 'params' => array('idcpf' => 2)),
	'PUT:api/usuario/(:any)' => array('route' => 'Usuario.Update', 'params' => array('idcpf' => 2)),
	'DELETE:api/usuario/(:any)' => array('route' => 'Usuario.Delete', 'params' => array('idcpf' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Bloqueio","fkBloqueioLivro",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Bloqueio","fkBloqueioMovimentacao",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Livro","fkLivroCategoria",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Livro","fkLivroLocalizacao",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Movimentacao","fkDevolucaoLivro",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Movimentacao","fkDevolucaoUsuario",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Reserva","fkReservaLivro",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Reserva","fkReservaUsuario",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
?>