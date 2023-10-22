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

	function histPeriodo()
	{
		$this->layout = 'noMenu';
	}
}
