<?php

class UsuarioController extends AppController
{

	var $uses = array('Auth', 'Usuario');

	public $components = array(
		'Session',
		'Paginator'
	);

	function login()
	{
		$this->layout = 'login';

		if ($this->request->is('post')) {

			$requestUser = $this->Usuario->find(
				'first',
				array(
					'conditions' => array(
						'userlogin' => $this->request->data['userlogin'],
						'userpassword' => $this->request->data['userpassword']
					)
				)
			);

			if (!empty($requestUser)) {

				$this->Auth->login($requestUser['Usuario']);
				return $this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Usuário ou Senha Incorretos', 'default', array('class' => 'alert alert-warning'));
			}
		}
	}

	public function logout()
	{
		$this->Session->destroy();

		return $this->redirect($this->Auth->logout());
	}


	function index()
	{
		if ($this->Session->read('Auth.User.useradm') != 'S') {
			$this->Session->setFlash('<h3><b>Você não tem permissão para realizar esta ação!</b></h3>', 'default', array('class' => 'alert alert-danger'));
			$this->redirect(array('controller' => 'Backups', 'action' => 'index'));
		};

		$this->layout = 'noMenu';

		$this->Paginator->settings = array(
			'limit' => 5,
			'conditions' => array(
				'usersituacao' => 'A'
			)
		);

		$this->set('listaUsuarios', $this->Paginator->paginate('Usuario'));
	}

	function add()
	{
		if ($this->Session->read('Auth.User.useradm') != 'S') {
			$this->Session->setFlash('<h3><b>Você não tem permissão para realizar esta ação!</b></h3>', 'default', array('class' => 'alert alert-danger'));
			$this->redirect(array('controller' => 'Backups', 'action' => 'index'));
		};

		$this->layout = 'ajax';

		if ($this->request->is('post')) {

			// $this->request->data['Usuario']['userpassword'] = Security::hash($this->request->data['Usuario']['userpassword'], 'blowfish');
			$this->request->data['Usuario']['usersituacao'] =  'A';
			$this->request->data['Usuario']['userdatasituacao'] = date('Y-m-d H:i:s');
			$this->request->data['Usuario']['userdatacriacao'] = date('Y-m-d H:i:s');

			if ($this->Usuario->save($this->request->data['Usuario'])) {
				$this->Session->setFlash('Usuário Salvo com Sucesso!', 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			};
		}
	}

	function edit($usercodigo)
	{
		if ($this->Session->read('Auth.User.useradm') != 'S') {
			$this->Session->setFlash('<h3><b>Você não tem permissão para realizar esta ação!</b></h3>', 'default', array('class' => 'alert alert-danger'));
			$this->redirect(array('controller' => 'Backups', 'action' => 'index'));
		};

		$this->layout = 'ajax';

		$this->set('usuario', $this->Usuario->find('first', array('conditions' => array('usercodigo' => $usercodigo))));

		if ($this->request->is('post')) {

			// $this->request->data['Usuario']['userpassword'] = Security::hash($this->request->data['Usuario']['userpassword'], 'blowfish');
			$this->request->data['Usuario']['userdatasituacao'] = date('Y-m-d H:i:s');
			$this->request->data['Usuario']['userdatacriacao'] = date('Y-m-d H:i:s');

			if ($this->Usuario->save($this->request->data['Usuario'])) {
				$this->Session->setFlash('Usuário Salvo com Sucesso!', 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			};
		}
	}

	function view($usercodigo)
	{
		if ($this->Session->read('Auth.User.useradm') != 'S') {
			$this->Session->setFlash('<h3><b>Você não tem permissão para realizar esta ação!</b></h3>', 'default', array('class' => 'alert alert-danger'));
			$this->redirect(array('controller' => 'Backups', 'action' => 'index'));
		};

		$this->layout = 'ajax';

		$this->set('usuario', $this->Usuario->find('first', array('conditions' => array('usercodigo' => $usercodigo))));
	}

	function delete($usercodigo)
	{
		if ($this->Session->read('Auth.User.useradm') != 'S') {
			$this->Session->setFlash('<h3><b>Você não tem permissão para realizar esta ação!</b></h3>', 'default', array('class' => 'alert alert-danger'));
			$this->redirect(array('controller' => 'Backups', 'action' => 'index'));
		};

		$this->layout = null;
		$this->autoRender = false;

		$inativarUsuario['usercodigo'] = $usercodigo;
		$inativarUsuario['usersituacao'] = 'I';
		$this->request->data['Usuario']['userdatasituacao'] = date('Y-m-d H:i:s');

		if ($this->Usuario->save($inativarUsuario)) {
			$this->Session->setFlash('Usuário Excluido com Sucesso!', 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		};
	}
}
