<?php

class BackupsController extends AppController
{

	var $uses = array('Backups','Cliente','Situacao');

	public $components = array('Paginator');


	function index(){

		$this->set('bkp000',$this->Backups->find('all'));
	}

	function add()
	{
		$this->layout = 'noMenu';

		if ($this->request->is('post')) {

			$this->request->data['Usuario']['userdatasituacao'] = date('Y-m-d H:i:s');
			$this->request->data['Usuario']['userdatacriacao'] = date('Y-m-d H:i:s');

			if ($this->Usuario->save($this->request->data['Usuario'])) {
				$this->Session->setFlash('Usuário Salvo com Sucesso!', 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			};
		}
	}

	function edit($usercodigo){

	}

	function view($usercodigo){

	}
}
