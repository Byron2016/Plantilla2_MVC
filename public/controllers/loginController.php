<?php
class loginController extends Controller
{
    private $_login; //ahora en login usuario se ocupa
    
    public function __construct(){
        parent::__construct();
        $this->_login = $this->loadModel('login');
        
    }
    public function index()
    {
        $this->_view->titulo = 'Iniciar Sesion';
        
        if($this->getInt('enviar') == 1){
            $this->_view->datos = $_POST; //para q se mantenga el nombre d usuario
            if(!$this->getAlphaNum('usuario')){
                $this->_view->_error = 'Debe introducir su nombre de usuario';
                $this->_view->renderizar('index','login');
                exit;
            }
            
            if(!$this->getSql('pass')){
                $this->_view->_error = 'Debe introducir su password';
                $this->_view->renderizar('index','login');
                exit;
            }
            
            $row = $this->_login->getUsuario(
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass')
                    );
            
            if(!$row){
                $this->_view->_error = 'Usuario y/o password incorrectos';
                $this->_view->renderizar('index','login');
                exit;
            }
            
            if($row['estado'] != 1){
                $this->_view->_error = 'Este usuario no esta habilitado';
                $this->_view->renderizar('index','login');
                exit;
            }
            
                        
            Session::set('autenticado', true);
            Session::set('level', $row['role']);
            Session::set('usuario', $row['usuario']);
            Session::set('id_usuario', $row['id']);
            Session::set('tiempo', time());

            //print_r($_SESSION);

            $this->redireccionar();
        }
        
        $this->_view->renderizar('index','login');
        
    }
    /*
    public function index()
    {
           
            Session::set('autenticado', true);
            Session::set('level', 'usuario');
            Session::set('tiempo', time());

            Session::set('var1', 'var1');
            Session::set('var2', 'var2');
            $this->redireccionar('login/mostrar');
            
    }
    
    
    public function mostrar()
    {
            echo 'level: ' . Session::get('level').'<br>';
            echo 'var1: ' . Session::get('var1').'<br>';
            echo 'var2: ' . Session::get('var2').'<br>'; 
    }
    */
    
    public function cerrar()
    {
        Session::destroy();
        //$this->redireccionar('login/mostrar');
        $this->redireccionar();
    }
}
?>