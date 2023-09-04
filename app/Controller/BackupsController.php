<?php

class BackupsController extends AppController
{

	var $uses = array('Backups', 'Cliente', 'Situacao');

	public $components = array(
		'Session',
		'Paginator'
	);

	function index()
	{
		$this->Paginator->settings = array(
			'conditions' => array(
				'clnusercodigo' => $this->Session->read('Auth.User.usercodigo'),
				'clnsituacao' => 'A'
			),
			'order' => array(

			)
		);

		$this->set('bkp001', $this->Paginator->paginate('Cliente'));
	}

	function add($i)
	{
		$this->layout = null;

		$this->set('i', $i);
	}
}
