<?php 

class Bootstrap
{
	public static function run(Request $peticion)
	{

		$controller = $peticion->getControlador() . 'Controller';
		$rutaControlador = ROOT . 'controllers' . DS . $controller  . '.php';

		echo $rutaControlador; exit;

		$metodo =  $peticion->getMetodo();
		$args = $peticion->getArgs();

		//echo $controller.'/'.$metodo;
		//echo " la rutacontrolador es: ". $rutaControlador . "<br>";
		//echo " la modulo es: ". $modulo . "<br>";
		//echo " la controller es: ". $controller . "<br>";
		//echo " la metodo es: ". $metodo . "<br>";

		if($modulo){
			//revisamos si trabajamos en base a modulo o controlador
			$rutaModulo = ROOT . 'controllers' . DS . $modulo . 'Controller.php';
			//$rutaModulo = ROOT . 'modules' . DS . $modulo . DS . 'controllers' . DS . $controller . '.php'; //revisa si hay controlador base para el modulo. El proposito de este es q proporcione código para el módulo completo.
			//echo $rutaModulo . '<br>'; exit;
			if(is_readable($rutaModulo)){
				require_once $rutaModulo;
				$rutaControlador = ROOT . 'modules' . DS . $modulo . DS .  'controllers' . DS . $controller . '.php';
			}
			else {
				throw new Exception('Error en Bootstrap: No encontrado modulo solicitado: ' );
			}
		}
		else {
			$rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';
			//echo $rutaControlador;
		}

		//echo $rutaControlador . '<br>'; exit;

		if(is_readable($rutaControlador)){
			//vverificar si archivo existe y es legible

			require_once $rutaControlador;

			$controller = new $controller;

			if(is_callable(array($controller, $metodo))){
				$metodo = $peticion->getMetodo();
			} else {
				$metodo = DEFAULT_METODO;
			}

			if(isset($args)){
				call_user_func_array(array($controller, $metodo), $args);
			} else {
				call_user_func(array($controller, $metodo));
			}
		} else {
			throw new Exception('Error en Bootstrap1: No encontrado: ' . $rutaControlador);
		}

	}
}
