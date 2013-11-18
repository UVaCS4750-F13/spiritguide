<?php
App::uses('AppController', 'Controller');
/**
 * Takes Controller
 *
 * @property Take $Take
 * @property PaginatorComponent $Paginator
 */
class TakesController extends AppController {

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
		$this->Take->recursive = 0;
		$this->set('takes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Take->exists($id)) {
			throw new NotFoundException(__('Invalid take'));
		}
		$options = array('conditions' => array('Take.' . $this->Take->primaryKey => $id));
		$this->set('take', $this->Take->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Take->create();
			if ($this->Take->save($this->request->data)) {
				$this->Session->setFlash(__('The take has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The take could not be saved. Please, try again.'));
			}
		}
		$cocktails = $this->Take->Cocktail->find('list');
		$ingredients = $this->Take->Ingredient->find('list');
		$this->set(compact('cocktails', 'ingredients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Take->exists($id)) {
			throw new NotFoundException(__('Invalid take'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Take->save($this->request->data)) {
				$this->Session->setFlash(__('The take has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The take could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Take.' . $this->Take->primaryKey => $id));
			$this->request->data = $this->Take->find('first', $options);
		}
		$cocktails = $this->Take->Cocktail->find('list');
		$ingredients = $this->Take->Ingredient->find('list');
		$this->set(compact('cocktails', 'ingredients'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Take->id = $id;
		if (!$this->Take->exists()) {
			throw new NotFoundException(__('Invalid take'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Take->delete()) {
			$this->Session->setFlash(__('The take has been deleted.'));
		} else {
			$this->Session->setFlash(__('The take could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
