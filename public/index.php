<?php 
ini_set('display_errors',1);
/*
echo "prueba hola mundo";
echo '<br>';
echo $_GET['url']; //Probar que traiga contr/modl/arg
*/
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'application' . DS);
//echo ROOT; //verificar root

//echo md5('1234'); exit;
//81dc9bdb52d04dc20036dbd8313ed055
//echo uniqid();exit; //5806aed8e2552

//cracqueo md5
/*
generar md5 en pagina: http://md5.gromweb.com/
se ingresa el md5 a reverar: 81dc9bdb52d04dc20036dbd8313ed055
devuelve 1234
*/



try {

	require_once APP_PATH . 'Config.php';
	require_once APP_PATH . 'Request.php';
	require_once APP_PATH . 'Bootstrap.php';
	require_once APP_PATH . 'Controller.php';
	require_once APP_PATH . 'Model.php';
	require_once APP_PATH . 'View.php';
	require_once APP_PATH . 'Register.php';
	require_once APP_PATH . 'DataBase.php';
	require_once APP_PATH . 'Session.php';
	require_once APP_PATH . 'Hash.php';
/*
	echo Hash::getHash('md5','1234',HASH_KEY); exit; //d27fae2fb0995a49b66be9e97667c8a3
	echo Hash::getHash('sha1','1234',HASH_KEY); exit;
*/
	//echo '<pre>'; print_r(get_required_files()); //verificar correccto importacion de archivos.

	/*
	//Prueba Request
	$r = new Request();

	echo $r->getControlador() . '<br>';
	echo $r->getMetodo() . '<br>';
	print_r($r->getArgs());
	*/

	Session::init();


	//prueba bootstrap
	Bootstrap::run(new Request);

} catch(Exception $e) {
	echo $e->getMessage();
}

