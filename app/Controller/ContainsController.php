<?php
App::uses('AppController', 'Controller');

App::import('Vendor', 'QueryBot');
/**
 * Contains Controller
 *
 * @property Contain $Contain
 * @property PaginatorComponent $Paginator
 */
class ContainsController extends AppController {

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
		$this->Contain->recursive = 0;
		$this->set('contains', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Contain->exists($id)) {
			throw new NotFoundException(__('Invalid contain'));
		}
		$options = array('conditions' => array('Contain.' . $this->Contain->primaryKey => $id));
		$this->set('contain', $this->Contain->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
				$cocktail_id = $this->request->data['Contain']['cocktail_id'];
				$ingredient = $this->request->data['Contain']['ingredient'];
				$volume = $this->request->data['Contain']['ingredient_volume'];
				if ($ingredient != '') { QueryBot::insert_contains($cocktail_id, $ingredient, $volume); }
				$this->redirect(array('controller' => 'cocktails', 'action' => 'view', $cocktail_id));
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
		if (!$this->Contain->exists($id)) {
			throw new NotFoundException(__('Invalid contain'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contain->save($this->request->data)) {
				$this->Session->setFlash(__('The contain has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contain could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Contain.' . $this->Contain->primaryKey => $id));
			$this->request->data = $this->Contain->find('first', $options);
		}
		$cocktails = $this->Contain->Cocktail->find('list');
		$ingredients = $this->Contain->Ingredient->find('list');
		$this->set(compact('cocktails', 'ingredients'));
	}


	public function delete($id = null) {
		$this->Contain->id = $id;
		if (!$this->Contain->exists()) {
			throw new NotFoundException(__('Invalid contain'));
		}
		$this->request->onlyAllow('post', 'delete');
		return $this->redirect(array('action' => 'index'));
	}


	public function remove($cocktail_id, $ingredient_id) {
		$c = $this->request->data['contain']['cocktail_id'];
		$i = $this->request->data['contain']['ingredient_id'];
		QueryBot::delete_contains($c, $i);
	}

}
