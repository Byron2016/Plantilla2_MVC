<?php 

/*
echo "prueba hola mundo";
echo '<br>';
echo $_GET['url']; //Probar que traiga contr/modl/arg
*/
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'application' . DS);
//echo ROOT; //verificar root

require_once APP_PATH . 'Config.php';
require_once APP_PATH . 'Request.php';
require_once APP_PATH . 'Bootstrap.php';
require_once APP_PATH . 'Controller.php';
require_once APP_PATH . 'Model.php';
require_once APP_PATH . 'View.php';
require_once APP_PATH . 'Register.php';

//echo '<pre>'; print_r(get_required_files()); //verificar correccto importacion de archivos.


Prueba Request
$r = new Request();

echo $r->getControlador() . '<br>';
echo $r->getMetodo() . '<br>';
print_r($r->getArgs());


