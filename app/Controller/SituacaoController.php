<?php

class SituacaoController extends AppController
{

	var $uses = array(
		'Backups',
		'Situacao',
		'Historico',
		'Usuario',
	);

	public $components = array('Paginator');

	function index()
	{
		$this->layout = 'noMenu';

		$this->Paginator->settings = array(
			'limit' => 5,
			'conditions' => array(
				'sitsituacao' => 'A'
			)
		);

		$this->set('listaClientes', $this->Paginator->paginate('Situacao'));
	}

	function add()
	{
		$this->layout = 'noMenu';

		if ($this->request->is('post')) {

			$novaSituacao = $this->request->data['Situacao'];
			$novaSituacao['sitsituacao'] = 'A';
			$novaSituacao['sitdatasituacao'] = date('Y-m-d H:i:s');
			$novaSituacao['situsercodigo'] = 1;
			$novaSituacao['sitdatacriacao'] = date('Y-m-d H:i:s');

			if ($this->Situacao->save($novaSituacao)) {

				$this->Session->setFlash('Situação Salva com Sucesso!', 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Houve um Erro ao tentar Salvar a Situação!', 'default', array('class' => 'alert alert-danger'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	function view($sitcodigo)
	{
		$this->layout = 'noMenu';
	}

	function edit($sitcodigo)
	{
		$this->layout = 'noMenu';
	}

	function delete($sitcodigo)
	{
		$this->layout = 'noMenu';
	}
}
