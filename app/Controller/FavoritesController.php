<?php
App::uses('AppController', 'Controller');
/**
 * Favorites Controller
 *
 * @property Favorite $Favorite
 * @property PaginatorComponent $Paginator
 */
class FavoritesController extends AppController {

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
		$this->Favorite->recursive = 0;
		$this->set('favorites', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Favorite->exists($id)) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		$options = array('conditions' => array('Favorite.' . $this->Favorite->primaryKey => $id));
		$this->set('favorite', $this->Favorite->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Favorite->create();
			if ($this->Favorite->save($this->request->data)) {
				$this->Session->setFlash(__('The favorite has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favorite could not be saved. Please, try again.'));
			}
		}
		$users = $this->Favorite->User->find('list');
		$cocktails = $this->Favorite->Cocktail->find('list');
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
		if (!$this->Favorite->exists($id)) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Favorite->save($this->request->data)) {
				$this->Session->setFlash(__('The favorite has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favorite could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Favorite.' . $this->Favorite->primaryKey => $id));
			$this->request->data = $this->Favorite->find('first', $options);
		}
		$users = $this->Favorite->User->find('list');
		$cocktails = $this->Favorite->Cocktail->find('list');
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
		$this->Favorite->id = $id;
		if (!$this->Favorite->exists()) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Favorite->delete()) {
			$this->Session->setFlash(__('The favorite has been deleted.'));
		} else {
			$this->Session->setFlash(__('The favorite could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
