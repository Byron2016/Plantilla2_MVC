<?php

class holaController extends Controller
{
	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		//echo 'hola desde indexController';
		$this->_view->titulo = 'Hola';
		$this->_view->renderizar('index','hola');
	}
}
