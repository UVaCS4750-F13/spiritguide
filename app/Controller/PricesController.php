<?php
App::uses('AppController', 'Controller');
/**
 * Prices Controller
 *
 * @property Price $Price
 * @property PaginatorComponent $Paginator
 */
class PricesController extends AppController {

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
		$this->Price->recursive = 0;
		$this->set('prices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Price->exists($id)) {
			throw new NotFoundException(__('Invalid price'));
		}
		$options = array('conditions' => array('Price.' . $this->Price->primaryKey => $id));
		$this->set('price', $this->Price->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Price->create();
			if ($this->Price->save($this->request->data)) {
				$this->Session->setFlash(__('The price has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The price could not be saved. Please, try again.'));
			}
		}
		$ingredients = $this->Price->Ingredient->find('list');
		$this->set(compact('ingredients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Price->exists($id)) {
			throw new NotFoundException(__('Invalid price'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Price->save($this->request->data)) {
				$this->Session->setFlash(__('The price has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The price could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Price.' . $this->Price->primaryKey => $id));
			$this->request->data = $this->Price->find('first', $options);
		}
		$ingredients = $this->Price->Ingredient->find('list');
		$this->set(compact('ingredients'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Price->id = $id;
		if (!$this->Price->exists()) {
			throw new NotFoundException(__('Invalid price'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Price->delete()) {
			$this->Session->setFlash(__('The price has been deleted.'));
		} else {
			$this->Session->setFlash(__('The price could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
