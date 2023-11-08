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

		$sitBackup[0] = '';
		if (!empty($arrSituacoes)) {

			foreach ($arrSituacoes as $key => $situacao) {
				$sitBackup[$situacao['Situacao']['sitcodigo']] = $situacao;
			}
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
					'sitsituacao' => 'A',
					'situsercodigo' => $this->Session->read('Auth.User.usercodigo'),
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
					'sitsituacao' => 'A',
					'situsercodigo' => $this->Session->read('Auth.User.usercodigo'),
				),
				'order' => array(
					'sitordem' => 'DESC'
				),
			)
		);

		$clientes = $this->Cliente->find(
			'all',
			array(
				'conditions' => array(
					'clnusercodigo' => $this->Session->read('Auth.User.usercodigo'),
					'clnsituacao' => 'A'
				)
			)
		);

		if (!empty($clientes)) {

			foreach ($clientes as $key => $cliente) {
				$findHistExistente = '';

				$dir = new Folder($cliente['Cliente']['clnbkpcaminho']);

				foreach ($cliente['Backups'] as $key2 => $backup) {

					foreach ($backup['Recorrencia'] as $key3 => $recorrencia) {

						if ($key3 < 1) {

							$findHistExistente = $recorrencia['reccodigo'];
						} else {

							$findHistExistente .= ',' . $recorrencia['reccodigo'];
						}
					}

					$arrHistExistente = $this->Historico->find(
						'all',
						array(
							'fields' => array(
								'Historico.*'
							),
							'conditions' => array(
								'hisdata' => date('Y-m-d'),
								'hisreccodigo IN (' . $findHistExistente . ')'
							)
						)
					);

					if (!empty($arrHistExistente)) {
						foreach ($arrHistExistente as $keyHist => $historico) {

							$numeroRecorrencia = $this->getRecorrencia($historico['Historico']['hisnomecompleto']);
							$arrHistBackups[$numeroRecorrencia]['hiscodigo'] = $historico['Historico']['hiscodigo'];
						}
					}

					foreach ($backup['Recorrencia'] as $key4 => $recFalha) {

						$attSituacaoBackup[$recFalha['recnumero']]['reccodigo'] = $recFalha['reccodigo'];
						$attSituacaoBackup[$recFalha['recnumero']]['recsitcodigo'] = $situacaoFalha['Situacao']['sitcodigo'];

						if (empty($arrHistBackups[$recFalha['recnumero']])) {

							$arrHistBackups[$recFalha['recnumero']]['hisdata'] = date('Y-m-d');
							$arrHistBackups[$recFalha['recnumero']]['hisdatacriacao'] = date('Y-m-d H:i:s');
							$arrHistBackups[$recFalha['recnumero']]['hisnomecompleto'] = $backup['bktnomearquivo'] . '_' . date('Ymd') . '_' . $recFalha['recnumero'];
							$arrHistBackups[$recFalha['recnumero']]['hissitcodigo'] = $situacaoFalha['Situacao']['sitcodigo'];
							$arrHistBackups[$recFalha['recnumero']]['hisreccodigo'] = $recFalha['reccodigo'];
							$arrHistBackups[$recFalha['recnumero']]['hisbktcodigo'] = $backup['bktcodigo'];
						} else {

							$arrHistBackups[$recFalha['recnumero']]['hissitcodigo'] = $situacaoFalha['Situacao']['sitcodigo'];
						}
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

						foreach ($arquivos as $key5 => $bkp) {

							$numeroRecorrencia = $this->getRecorrencia($bkp);

							$arrHistBackups[$numeroRecorrencia]['hisnomecompleto'] = $bkp;
							$arrHistBackups[$numeroRecorrencia]['hissitcodigo'] = $situacaoSucesso['Situacao']['sitcodigo'];

							foreach ($backup['Recorrencia'] as $key6 => $rec) {
								if ($numeroRecorrencia == $rec['recnumero']) {

									$attSituacaoBackup[$numeroRecorrencia]['reccodigo'] = $rec['reccodigo'];
									$attSituacaoBackup[$numeroRecorrencia]['recsitcodigo'] = $situacaoSucesso['Situacao']['sitcodigo'];
								}
							}
						}
					}

					// $this->Historico->saveAll($arrHistBackups);
					// $this->RecorrenciaBackup->saveAll($attSituacaoBackup);
					unset($attSituacaoBackup);
					unset($arrHistBackups);
				}
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
