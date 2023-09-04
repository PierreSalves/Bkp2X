<?php
App::uses('AppModel', 'Model');

class Usuario extends AppModel
{
	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	var $useTable = 'bkp002';

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'usercodigo';

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
