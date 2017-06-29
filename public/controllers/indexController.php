<?php

class indexController extends Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		echo "Hola desde index Controler";
		$this->_view->renderizar('index');

	}

}