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

			foreach ($cliente['Backups'] as $key2 => $backup) {

				foreach ($backup['Recorrencia'] as $key5 => $rec) {

					$attSituacaoBackup[$rec['recnumero']]['reccodigo'] = $rec['reccodigo'];
					$attSituacaoBackup[$rec['recnumero']]['recsitcodigo'] = $situacaoFalha['Situacao']['sitcodigo'];

					$arrHistBackups[$rec['recnumero']]['hisdata'] = date('Y-m-d');
					$arrHistBackups[$rec['recnumero']]['hisdatacriacao'] = date('Y-m-d H:i:s');
					$arrHistBackups[$rec['recnumero']]['hisnomecompleto'] = $backup['bktnomearquivo'] . '_' . date('Ymd') . '_' . $rec['recnumero'];
					$arrHistBackups[$rec['recnumero']]['hissitcodigo'] = $situacaoFalha['Situacao']['sitcodigo'];
					$arrHistBackups[$rec['recnumero']]['hisbktcodigo'] = $backup['bktcodigo'];
				}

				if (empty($cliente['Cliente']['clnchavelogin'])) {

					$arquivos = $dir->find($backup['bktnomearquivo'] . '_' . date('Ymd') . '.*_\d');
				} else {

					$diretorio = $dir->read(
						$cliente['Cliente']['clnbkpcaminho'],
						[
							'username' => $cliente['Cliente']['clnchavelogin'],
							'password' => $cliente['Cliente']['clnchavepwd']
						]
					);
					$arquivos = $diretorio[1];
				}

				if (!empty($arquivos)) {

					foreach ($arquivos as $key3 => $bkp) {

						$numeroRecorrencia = $this->getRecorrencia($bkp);

						$arrHistBackups[$numeroRecorrencia]['hisdata'] = date('Y-m-d');
						$arrHistBackups[$numeroRecorrencia]['hisdatacriacao'] = date('Y-m-d H:i:s');
						$arrHistBackups[$numeroRecorrencia]['hisnomecompleto'] = $bkp;
						$arrHistBackups[$numeroRecorrencia]['hissitcodigo'] = $situacaoSucesso['Situacao']['sitcodigo'];
						$arrHistBackups[$numeroRecorrencia]['hisbktcodigo'] = $backup['bktcodigo'];

						foreach ($backup['Recorrencia'] as $key4 => $rec) {
							if ($numeroRecorrencia == $rec['recnumero']) {
								$attSituacaoBackup[$numeroRecorrencia]['reccodigo'] = $rec['reccodigo'];
								$attSituacaoBackup[$numeroRecorrencia]['recsitcodigo'] = $situacaoSucesso['Situacao']['sitcodigo'];
							}
						}
					}
				}

				$this->Historico->saveAll($arrHistBackups);
				$this->RecorrenciaBackup->saveAll($attSituacaoBackup);
				unset($attSituacaoBackup);
				unset($arrHistBackups);
			}
		}

		$this->redirect(array('action' => 'index'));
	}

	private function getRecorrencia($string)
	{
		$dot_position = strpos($string, ".");
		return substr($string, $dot_position - 1, 1);
	}
}
