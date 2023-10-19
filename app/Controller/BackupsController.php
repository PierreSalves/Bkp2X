<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class BackupsController extends AppController
{

	var $uses = array(
		'Backups',
		'Cliente',
		'Situacao',
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

	function addElement($i)
	{
		$this->layout = null;

		$this->set('i', $i);
	}

	function attBackups()
	{

		$clientes = $this->Cliente->find(
			'all',
			array(
				'clnusercodigo' => $this->Session->read('Auth.User.usercodigo'),
				'clnsituacao' => 'A'
			)
		);

		foreach ($clientes as $key => $cliente) {

			$dir = new Folder($cliente['Cliente']['clnbkpcaminho']);

			$arquivo = $dir->read(
				// $cliente['Cliente']['clnbkpcaminho'] . $backup['bktnomearquivo'] . '.*\.zip',
				$cliente['Cliente']['clnbkpcaminho'],
				[
					'username' => $cliente['Cliente']['clnchavelogin'],
					'password' => $cliente['Cliente']['clnchavepwd']
				]
			);

			pr('FOLDER()------------------------------------------------------------' . $cliente['Cliente']['clndescricao'] . '--------------------------------------------------------');
			pr($arquivo[1]);

			// $arquivos = $cliente['Backups'];
			// foreach ($arquivos as $key => $backup) {

			// pr('FILE()--------------------------------------------------------------------------------------------------------------------');
			// $file = new File($cliente['Cliente']['clnbkpcaminho'] . $backup['bktnomearquivo']);
			// pr($file->info());

			// if (condition) {
			// 	# code...
			// }
			// }
		}
		exit;
	}
}
