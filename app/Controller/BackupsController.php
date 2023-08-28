<?php

class BackupsController extends AppController
{

	var $uses = array('Backups','Cliente','Situacao');

	public $components = array('Paginator');


	function index(){

		$this->set('bkp001',$this->Cliente->find('all'));
		// pr($this->Cliente->find('all'));exit;
	}

	function add($i)
	{
		$this->layout = null;

		$this->set('i',$i);
	}

	function edit($bktcodigo){

	}
}
