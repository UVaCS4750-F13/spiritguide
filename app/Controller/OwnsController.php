<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'QueryBot');

/**
 * Owns Controller
 *
 * @property Own $Own
 * @property PaginatorComponent $Paginator
 */
class OwnsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator',);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Own->recursive = 0;
		$this->set('owns', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Own->exists($id)) {
			throw new NotFoundException(__('Invalid own'));
		}
		$options = array('conditions' => array('Own.' . $this->Own->primaryKey => $id));
		$this->set('own', $this->Own->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Own->create();
			if ($this->Own->save($this->request->data)) {
				$this->Session->setFlash(__('The own has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The own could not be saved. Please, try again.'));
			}
		}
		$users = $this->Own->User->find('list');
		$ingredients = $this->Own->Ingredient->find('list');
		$this->set(compact('users', 'ingredients'));
	}


	public function edit($id = null) { throw new NotFoundException(__('Invalid Action')); }


	public function update_owns() {
		if ($this->request->is('post')) {
			$user_id = $this->Auth->user('user_id');
			$ingredient_id = QueryBot::tidy($this->request->data['Owns']['ingredient_id']);
			$volume = QueryBot::tidy($this->request->data['Owns']['volume']);
			QueryBot::update_owns($user_id, $ingredient_id, $volume);
			return $this->redirect(array('controller' => 'ingredients', 'action' => 'view', $ingredient_id));
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
		$this->Own->id = $id;
		if (!$this->Own->exists()) {
			throw new NotFoundException(__('Invalid own'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Own->delete()) {
			$this->Session->setFlash(__('The own has been deleted.'));
		} else {
			$this->Session->setFlash(__('The own could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
