<?php

class BackupsController extends AppController
{

	var $uses = array(
		'Backups',
		'Cliente',
		'Situacao'
	);

	public $components = array(
		'Session',
		'Paginator'
	);

	function index()
	{
		$this->Paginator->settings = array(
			'limit' => 8,
			'conditions' => array(
				'clnusercodigo' => $this->Session->read('Auth.User.usercodigo'),
				'clnsituacao' => 'A'
			),
			'order' => array(
				'clndescricaoreduzido' => 'ASC'
			)
		);

		$this->set('bkp001', $this->Paginator->paginate('Cliente'));

		$arrSituacoes = $this->Situacao->find(
			'all',
			array(
				'conditions' => array(
					'situsercodigo' => $this->Session->read('Auth.User.usercodigo'),
					'sitsituacao' => 'A'
				)
			)
		);
		foreach ($arrSituacoes as $key => $situacao) {
			$sitBackup[$situacao['Situacao']['sitcodigo']] = $situacao;
		}
		$this->set('sitBackup', $sitBackup);
	}

	function add($i)
	{
		$this->layout = null;

		$this->set('i', $i);
	}
}
