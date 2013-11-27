<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'QueryBot');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('add'); // Letting users register themselves
}

public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
        	$this->User->useDbConfig = 'unrestricted';
            return $this->redirect(array('controller' => 'users', 'action' => 'index'));
        } $this->Session->setFlash(__('Invalid username or password, try again'));
    }
}

public function logout() {
    return $this->redirect($this->Auth->logout());
}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}


	public function inventory($id = null) {
		$inventory = QueryBot::retrieve_inventory($id);
		$this->set('inventory', $inventory);
		$this->set('inventory_count', count($inventory));
	}

	public function favorites($id = null) {
		$this->set('favorites', QueryBot::retrieve_user_favorites($id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('controller' => 'users', 'action' => 'login'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function export() {
		$filename = "spiritguide.csv";
		$db_dump = QueryBot::export();
		header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-disposition: attachment; filename="'.$filename.'"');
        header('Content-Length: '.strlen($db_dump));
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        header('Pragma: public');
        echo $db_dump;
    }
}
