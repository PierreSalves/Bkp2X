<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class BackupsController extends AppController
{

	var $uses = array(
		'Backups',
		'Cliente',
		'Situacao',
		'Historico',
		'RecorrenciaBackup'
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
		$situacaoSucesso = $this->Situacao->find(
			'first',
			array(
				'conditions' => array(
					'sitsituacao' => 'A'
				),
				'order' => array(
					'sitordem' => 'ASC'
				),
			)
		);
		$situacaoFalha = $this->Situacao->find(
			'first',
			array(
				'conditions' => array(
					'sitsituacao' => 'A'
				),
				'order' => array(
					'sitordem' => 'DESC'
				),
			)
		);

		$clientes = $this->Cliente->find(
			'all',
			array(
				'clnusercodigo' => $this->Session->read('Auth.User.usercodigo'),
				'clnsituacao' => 'A'
			)
		);

		foreach ($clientes as $key => $cliente) {

			$dir = new Folder($cliente['Cliente']['clnbkpcaminho']);

			// $arquivo = $dir->read(
			// 	// $cliente['Cliente']['clnbkpcaminho'] . $backup['bktnomearquivo'] . '.*\.zip',
			// 	$cliente['Cliente']['clnbkpcaminho'],
			// 	[
			// 		'username' => $cliente['Cliente']['clnchavelogin'],
			// 		'password' => $cliente['Cliente']['clnchavepwd']
			// 	]
			// );

			foreach ($cliente['Backups'] as $key2 => $backup) {

				$arquivos = $dir->find($backup['bktnomearquivo'] . '_' . date('Ymd') . '.*_\d');

				if (!empty($arquivos)) {

					foreach ($arquivos as $key3 => $bkp) {

						$arrHistBackups['hisdata'] = date('Y-m-d H:i:s');
						$arrHistBackups['hisnomecompleto'] = $bkp;
						$arrHistBackups['hissitcodigo'] = $situacaoSucesso['Situacao']['sitcodigo'];
						$arrHistBackups['hisbktcodigo'] = $backup['bktcodigo'];

						$this->Historico->save($arrHistBackups);

						$numeroRecorrencia = $this->getRecorrencia($bkp);
						foreach ($backup['Recorrencia'] as $key4 => $rec) {
							if ($numeroRecorrencia == $rec['recnumero']) {
								$attSituacaoBackup['reccodigo'] = $rec['reccodigo'];
								$attSituacaoBackup['recsitcodigo'] = $situacaoSucesso['Situacao']['sitcodigo'];

								$this->RecorrenciaBackup->save($attSituacaoBackup);
							}
						}
						pr($arrHistBackups);
					}
				}
			}
		}
		exit;
	}

	private function getRecorrencia($string)
	{
		$dot_position = strpos($string, ".");
		return substr($string, $dot_position - 1, 1);
	}
}
