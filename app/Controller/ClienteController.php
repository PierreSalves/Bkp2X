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
			pr($this->request->data);exit;
			$this->request->data['Cliente']['clnsituacao'] = 'A';
			$this->request->data['Cliente']['clndatasituacao'] = date('Y-m-d H:i:s');
			$this->request->data['Cliente']['clnusercodigo'] = 1;
			$this->request->data['Cliente']['clndatacriacao'] = date('Y-m-d H:i:s');

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
