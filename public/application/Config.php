<?php 
   
define('DEFAULT_CONTROLLER', 'index'); //controlador por defecto de la aplicación en caso de no enviarse en aplicación.
define('DEFAULT_METODO', 'index');

define('BASE_URL', 'http://nuevaplantilla_mvc.net/');
//CONSTANTE PARA INCLUIR ARCHIVOS DEL LADO DEL USUARIO, DEL LADO DE LAS VISTAS


//define('DEFAULT_LAYOUT', 'default');
define('DEFAULT_LAYOUT', 'layout1');
define('APP_NAME', 'mi framework');
define('APP_SLOGAN', 'FRAMEWORK php mvc');
define('APP_COMPANY', 'plantilla_mvc.net');

//parametros para base de datos:
    define('DB_HOST', 'localhost');
    define('DB_USER', 'homestead');
    define('DB_PASS', 'secret');
    define('DB_NAME', 'mvc1');
    define('DB_CHAR', 'utf8');
    define('DB_PORT', '33060');

//sesiones
define('SESSION_TIME', 10);

//hash key
define('HASH_KEY', '5806aed8e2552'); //echo uniqid();exit; //5806aed8e2552
