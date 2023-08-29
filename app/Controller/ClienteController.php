<?php

class ClienteController extends AppController
{

	var $uses = array(
		'Backups',
		'Situacao',
		'Historico',
		'Cliente'
	);

	public $components = array('Paginator');

	function index()
	{

		$this->layout = 'noMenu';

		$this->Paginator->settings = array(
			'limit' => 5,
			'conditions' => array(
				'clnsituacao' => 'A'
			)
		);

		$this->set('listaClientes', $this->Paginator->paginate('Cliente'));
	}
	function add()
	{
		$this->layout = 'noMenu';

		if ($this->request->is('post')) {

			$novoCliente = $this->request->data['Cliente'];
			$novoCliente['clnsituacao'] = 'A';
			$novoCliente['clndatasituacao'] = date('Y-m-d H:i:s');
			$novoCliente['clnusercodigo'] = 1;
			$novoCliente['clndatacriacao'] = date('Y-m-d H:i:s');

			if ($this->Cliente->save($novoCliente)) {

				foreach ($this->request->data['Cliente']['Backups'] as $key => $backup) {

					$novoBackup[$key] = $backup;
					$novoBackup[$key]['bktclncodigo'] = $this->Cliente->id;
					$novoBackup[$key]['bktsituacao'] = 'A';
					$novoBackup[$key]['bktdatasituacao'] = date('Y-m-d H:i:s');
					$novoBackup[$key]['bktusercodigo'] = 1;
					$novoBackup[$key]['bktdatacriacao'] = date('Y-m-d H:i:s');
				}

				if ($this->Backups->saveAll($novoBackup)) {

					$this->Session->setFlash('Cliente Salvo com Sucesso!', 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Houve um Erro ao tentar Salvar o Cliente!', 'default', array('class' => 'alert alert-danger'));
					$this->redirect(array('action' => 'index'));
				}
			}
		}
	}

	function edit($clncodigo)
	{
		$this->layout = 'noMenu';

		$cliente = $this->Cliente->find(
			'first',
			array(
				'conditions' => array(
					'clncodigo' => $clncodigo
				)
			)
		);

		$this->set('cliente', $cliente);

		if ($this->request->is('post')) {

			$editCliente = $this->request->data['Cliente'];
			$editCliente['clncodigo'] = $clncodigo;
			$editCliente['clnsituacao'] = 'A';
			$editCliente['clndatasituacao'] = date('Y-m-d H:i:s');
			$editCliente['clnusercodigo'] = 1;
			$editCliente['clndatacriacao'] = date('Y-m-d H:i:s');

			if ($this->Cliente->save($editCliente)) {

				foreach ($this->request->data['Cliente']['Backups'] as $key => $backup) {

					$novoBackup[$key] = $backup;
					$novoBackup[$key]['bktclncodigo'] = $this->Cliente->id;
					$novoBackup[$key]['bktsituacao'] = 'A';
					$novoBackup[$key]['bktdatasituacao'] = date('Y-m-d H:i:s');
					$novoBackup[$key]['bktusercodigo'] = 1;
					$novoBackup[$key]['bktdatacriacao'] = date('Y-m-d H:i:s');
				}

				if ($this->Backups->saveAll($novoBackup)) {

					$this->Session->setFlash('Cliente Salvo com Sucesso!', 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Houve um Erro ao tentar Salvar o Cliente!', 'default', array('class' => 'alert alert-danger'));
					$this->redirect(array('action' => 'index'));
				}
			}
		}
	}

	function view($clncodigo)
	{
		$this->layout = 'noMenu';

		$cliente = $this->Cliente->find(
			'first',
			array(
				'conditions' => array(
					'clncodigo' => $clncodigo
				)
			)
		);

		$this->set('cliente', $cliente);
	}

	function delete($clncodigo)
	{
		$this->layout = null;
		$this->autoRender = false;

		$inativarCliente['clncodigo'] = $clncodigo;
		$inativarCliente['clnsituacao'] = 'I';
		$inativarCliente['clndatasituacao'] = date('Y-m-d H:i:s');

		$cliente = $this->Cliente->find(
			'first',
			array(
				'conditions' => array(
					'clncodigo' => $clncodigo
				)
			)
		);

		if ($this->Cliente->save($inativarCliente)) {

			foreach ($cliente['Backups'] as $key => $backup) {

				$inativarBackup[$key]['bktcodigo'] = $backup['bktcodigo'];
				$inativarBackup[$key]['bktsituacao'] = 'I';
				$inativarBackup[$key]['bktdatasituacao'] = date('Y-m-d H:i:s');
			}

			if ($this->Backups->saveAll($inativarBackup)) {

				$this->Session->setFlash('Cliente Excluido com Sucesso!', 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}
}
