<?php
App::uses('AppController', 'Controller');

/**
 * Ingredients Controller
 *
 * @property Ingredient $Ingredient
 * @property PaginatorComponent $Paginator
 */
class IngredientsController extends AppController {

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
		$data = $this->Paginator->paginate('Ingredient', array('limit' => 20));
		$this->set('ingredients', $data);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ingredient->exists($id)) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		$options = array('conditions' => array('Ingredient.' . $this->Ingredient->primaryKey => $id));
		$this->set('ingredient', $this->Ingredient->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ingredient->create();
			if ($this->Ingredient->save($this->request->data)) {
				$this->Session->setFlash(__('The ingredient has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingredient could not be saved. Please, try again.'));
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
		if (!$this->Ingredient->exists($id)) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ingredient->save($this->request->data)) {
				$this->Session->setFlash(__('The ingredient has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingredient could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ingredient.' . $this->Ingredient->primaryKey => $id));
			$this->request->data = $this->Ingredient->find('first', $options);
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
		$this->Ingredient->id = $id;
		if (!$this->Ingredient->exists()) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ingredient->delete()) {
			$this->Session->setFlash(__('The ingredient has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ingredient could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
