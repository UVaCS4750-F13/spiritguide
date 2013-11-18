<?php
App::uses('AppController', 'Controller');
/**
 * UserRatings Controller
 *
 * @property UserRating $UserRating
 * @property PaginatorComponent $Paginator
 */
class UserRatingsController extends AppController {

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
		$this->UserRating->recursive = 0;
		$this->set('userRatings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserRating->exists($id)) {
			throw new NotFoundException(__('Invalid user rating'));
		}
		$options = array('conditions' => array('UserRating.' . $this->UserRating->primaryKey => $id));
		$this->set('userRating', $this->UserRating->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserRating->create();
			if ($this->UserRating->save($this->request->data)) {
				$this->Session->setFlash(__('The user rating has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user rating could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserRating->User->find('list');
		$cocktails = $this->UserRating->Cocktail->find('list');
		$this->set(compact('users', 'cocktails'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserRating->exists($id)) {
			throw new NotFoundException(__('Invalid user rating'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserRating->save($this->request->data)) {
				$this->Session->setFlash(__('The user rating has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user rating could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserRating.' . $this->UserRating->primaryKey => $id));
			$this->request->data = $this->UserRating->find('first', $options);
		}
		$users = $this->UserRating->User->find('list');
		$cocktails = $this->UserRating->Cocktail->find('list');
		$this->set(compact('users', 'cocktails'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserRating->id = $id;
		if (!$this->UserRating->exists()) {
			throw new NotFoundException(__('Invalid user rating'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserRating->delete()) {
			$this->Session->setFlash(__('The user rating has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user rating could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
