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

		$arrClientes = $this->Cliente->find(
			'list',
			[
				'conditions' => [
					'clnusercodigo' => $this->Session->read('Auth.User.usercodigo'),
					'clnsituacao' => 'A'
				]
			]
		);

		$optClientes = [0 => 'Todos'];
		foreach ($arrClientes as $clncodigo => $clndescricao) {
			$optClientes[$clncodigo] = $clndescricao;
		}

		$this->set('optClientes', $optClientes);

		$arrSituacao = $this->Situacao->find(
			'list',
			[
				'conditions' => [
					'situsercodigo' => $this->Session->read('Auth.User.usercodigo'),
					'sitsituacao' => 'A'
				]
			]
		);

		$optSituacao = [0 => 'Todas'];
		foreach ($arrSituacao as $sitcodigo => $sitreduzido) {
			$optSituacao[$sitcodigo] = $sitreduzido;
		}

		$this->set('optSituacao', $optSituacao);
	}

	function resumoClienteImpressao()
	{
		$this->layout = 'impressao';

		$dataInicio = DateTimeImmutable::createFromFormat('d/m/Y', $this->request->data['Filtros']['dataInicio']);
		$dataFim = DateTimeImmutable::createFromFormat('d/m/Y', $this->request->data['Filtros']['dataFim']);
		$cliente = $this->request->data['Filtros']['cliente'];
		$situacao = $this->request->data['Filtros']['situacao'];
		$ordem = $this->request->data['Filtros']['ordem'];

		$layout = $this->request->data['Filtros']['layout'] == 1 ? 'page-portrait' : 'page-landscape';

		$formatedDataInicio = strtotime($dataInicio->format('Y-m-d'));
		$formatedDataFim = strtotime($dataFim->format('Y-m-d'));

		if ($formatedDataFim < $formatedDataInicio) {

			$this->Session->setFlash('Atenção, a data término não pode ser menor que a data de início', 'default', array('class' => 'alert alert-warning'));
			$this->redirect(array('action' => 'resumoCliente'));
		}

		$dadosRelatorio = $this->Historico->resumoCliente($formatedDataInicio, $formatedDataFim, $cliente,$situacao,$ordem);

		$periodo['inicio'] =  $this->request->data['Filtros']['dataInicio'];
		$periodo['termino'] =  $this->request->data['Filtros']['dataFim'];

		$usuario['usercodigo'] = $this->Session->read('Auth.User.usercodigo');
		$usuario['usernome'] = $this->Session->read('Auth.User.usernome');

		$this->set('usuario', $usuario);
		$this->set('periodo', $periodo);
		$this->set('classLayout', $layout);
		$this->set('dadosRelatorio', $dadosRelatorio);
	}

	function histPeriodo()
	{
		$this->layout = 'noMenu';
	}
}
