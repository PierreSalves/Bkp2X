<?php

class ClienteController extends AppController
{

	// var $uses = array();

	public $components = array('Paginator');

	function index(){

		$this->layout = 'noMenu';
		$this->set('listaClientes', $this->Paginator->paginate('Cliente'));
	}
	function add()
	{
		$this->layout = 'noMenu';

		if ($this->request->is('post')) {

			$this->request->data['Cliente']['userdatasituacao'] = date('Y-m-d H:i:s');
			$this->request->data['Cliente']['userdatacriacao'] = date('Y-m-d H:i:s');

			if ($this->Cliente->save($this->request->data['Cliente'])) {
				$this->Session->setFlash('Cliente Salvo com Sucesso!', 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			};
		}
	}

	function edit($usercodigo){

	}

	function view($usercodigo){

	}
}
