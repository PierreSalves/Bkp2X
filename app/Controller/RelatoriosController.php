<?php

class RelatoriosController extends AppController
{

	var $uses = array(
		'Backups',
		'Situacao',
		'Historico',
		'Cliente',
		'Usuario',
		'RecorrenciaBackup'
	);

	public $components = array('Paginator');

	function index()
	{
		$this->layout = 'noMenu';
	}

	function resumoCliente()
	{
		$this->layout = 'noMenu';

		$optClientes = $this->Cliente->find(
			'list',
			[
				'conditions' => [
					'clnusercodigo' => $this->Session->read('Auth.User.usercodigo'),
					'clnsituacao' => 'A'
				]
			]
		);
		$test = [0 => 'Todos'];
		array_push($test, array_values($optClientes));
		pr($test);exit;
	}

	function histPeriodo()
	{
		$this->layout = 'noMenu';
	}
}
