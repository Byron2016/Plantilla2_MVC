<?php
class Session 
{
    public static function init()
    {
        session_start();
    }
    
    public static function destroy($clave = FALSE)
    {
        if ($clave) 
        {
            if (is_array($clave)) {
                for ($i=0; $i < count($clave); $i++) { 
                    if (isset($_SESSION[$clave[$i]])) {
                        unset($_SESSION[$clave[$i]]);
                    }
                }
            }
            else
            {
                if (isset($_SESSION[$clave])) {
                    unset($_SESSION[$clave]);
                }
            }
        }else{
            session_destroy();
        }
    }
    public static function set($clave, $valor)
    {
        if (!empty($clave)) {
            $_SESSION[$clave] = $valor;
        }
        
    }
    public static function get($clave)
    {
        if (isset($_SESSION[$clave])) {
            return $_SESSION[$clave];
        }
    }
    public static function acceso($level)
    {
        if(!Session::get('autenticado')){
            header('location:' . BASE_URL . 'error/access/5050');
            exit;
        }
        
        //Session::tiempo();
        if(Session::getLevel($level) > Session::getLevel(Session::get('level'))){
            header('location:' . BASE_URL . 'error/access/5050');
            exit;
        }
    }
    public static function accesoView($level){
        
        if(!Session::get('autenticado')){
            return FALSE;
        }
        Session::tiempo();
        if(Session::getLevel($level) > Session::getLevel(Session::get('level'))){
            return FALSE;
        }
        
        return true;
    }
    public static function getLevel($level)
    {
        //diferentes niveles de acceso en aplicación
        $rol['admin'] = 3;
        $rol['especial'] = 2;
        $rol['usuario'] = 1;
        
        if(!array_key_exists($level, $rol)){
            throw new Exception('Error de acceso en session.php funcion getLevel');
        }  else {
            return $rol[$level];
        }
    }
    
}
?>