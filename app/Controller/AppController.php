<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

	var $components = array(
		'DebugKit.Toolbar',
		'Cookie',
		'Auth',
		'Session',
	);


	public function beforeFilter()
	{
		parent::beforeFilter();


		// $this->Auth->loginAction = array('controller' => 'Professor', 'action' => 'login' ); //o usuário é redirecionado para esta ação caso não esteja autenticado
		// $this->Auth->logoutRedirect = array('controller' => 'Professor', 'action' => 'login'); //redireciona após o logout
		// $this->Auth->loginRedirect = array('controller' => 'Professor', 'action' => 'index'); //redireciona após login

		// $this->Auth->loginError = __('Usuário e/ou senha inválido(s).', true);

		$this->Auth->loginAction = array('controller' => 'Usuario', 'action' => 'login');
		$this->Auth->loginRedirect = array('controller' => 'Backups', 'action' => 'index');
		$this->Auth->logoutRedirect = array('controller' => 'Usuario', 'action' => 'login');
		$this->Auth->authenticate = array(
			'Form' => array(
				'userModel' => 'Usuario',
				'fields' => array(
					'username' => 'userlogin',
					'password' => 'userpassword'
				)
			)
		);


		$this->Auth->authError = __('Você precisa fazer login para acessar esta página.', true);

		date_default_timezone_set('America/Sao_Paulo');
	}
}
