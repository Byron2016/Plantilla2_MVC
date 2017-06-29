<?php 
  
class View
{
	private $controlador;

	public function __construct(Request $peticion)
	{
		$this->_controlador = $peticion->getControlador();
	}

    public function renderizar($vista, $item = false)
    {
        $rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';
        //echo $rutaView;
        if(is_readable($rutaView)){
            include_once $rutaView;
        } else {
            throw new Exception ('Error application View: Error de vista');
        }
    }
}