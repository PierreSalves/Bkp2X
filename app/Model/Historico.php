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
}
