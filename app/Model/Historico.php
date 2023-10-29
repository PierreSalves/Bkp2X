<?php
App::uses('AppModel', 'Model');

class Historico extends AppModel
{
	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	var $useTable = 'bkp004';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'hiscodigo';

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'usernome';

	public $belongsTo = array(
		'Backup' => array(
			'className' => 'Backups',
			'foreignKey' => 'hisbktcodigo'
		),
		'Situacao' => array(
			'className' => 'Situacao',
			'foreignKey' => 'hissitcodigo'
		)
	);

	public function resumoCliente($dataInicio, $dataFim, $cliente, $situacao, $ordem)
	{

		$formatedInicio = date('Y-m-d', $dataInicio);
		$formatedFim = date('Y-m-d', $dataFim);

		if ($cliente != 0) {
			$whereCliente = "AND cln.clncodigo = $cliente";
		} else {
			$whereCliente = '';
		}

		if ($situacao != 0) {
			$whereSituacao = "AND sit.sitcodigo = $situacao";
		} else {
			$whereSituacao = '';
		}

		if ($ordem == 1) {
			$orderBy = "cln.clndescricao ASC,";
		} else {
			$orderBy = "sit.sitreduzido ASC,";
		}

		return $this->query(
			"SELECT
				cln.clncodigo,
				cln.clndescricao,
				bkt.bktcodigo,
				bkt.bktnomearquivo,
				rec.reccodigo,
				rec.recnumero,
				sit.sitcodigo,
				sit.sitdescricao,
				sit.sitreduzido,
				COUNT(his.hiscodigo) AS count
			FROM bkp004 his
				INNER JOIN bkp005 rec ON rec.reccodigo = his.hisreccodigo AND rec.recsituacao = 'A'
				INNER JOIN bkp003 sit ON sit.sitcodigo = his.hissitcodigo
				INNER JOIN bkp000 bkt ON bkt.bktcodigo = his.hisbktcodigo AND bkt.bktsituacao = 'A'
				INNER JOIN bkp001 cln ON cln.clncodigo = bkt.bktclncodigo AND cln.clnsituacao = 'A'
			WHERE hisdata BETWEEN '$formatedInicio' AND '$formatedFim'
				$whereCliente
				$whereSituacao
			GROUP BY
				cln.clncodigo,
				cln.clndescricao,
				bkt.bktcodigo,
				bkt.bktnomearquivo,
				rec.reccodigo,
				rec.recnumero,
				sit.sitcodigo,
				sit.sitdescricao,
				sit.sitreduzido
			ORDER BY
				$orderBy
				bkt.bktnomearquivo ASC,
				rec.recnumero ASC;
		"
		);
	}
}
