<?php

class BackupsController extends AppController
{

	var $uses = array('Backups','Cliente','Situacao');

	public $components = array('Paginator');


	function index(){

		$this->set('bkp000',$this->Backups->find('all'));
		pr($this->Cliente->find('all'));exit;
	}
}
