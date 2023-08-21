<?php

class UsuarioController extends AppController
{

	// var $uses = array();

	public $components = array('Paginator');

	function login(){
		$this->layout = 'login';
	}

	function index(){

	}
}
