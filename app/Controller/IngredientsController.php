<?php
App::uses('AppController', 'Controller');

App::import('Vendor', 'QueryBot');

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

	public $components = array('Auth');

	function filter() {
		// the page we will redirect to
		$url['action'] = 'index';
		
		// build a URL will all the search elements in it
		foreach ($this->data as $k=>$v){ 
			foreach ($v as $kk=>$vv){
				if($vv != "") {
					$url[$kk]=$vv;
			}
		} 
	}

		// redirect the user to the url
		$this->redirect($url, null, true);
	}

	public function index() {

		$description = null;
		if (isset($this->passedArgs['descr'])) {
            $this->request->data['Ingredient']['descr'] = trim($this->passedArgs['descr']);
           $description = trim($this->passedArgs['descr']);
		}

		$brand = null;
		if (isset($this->passedArgs['brand'])) {
            $this->request->data['Ingredient']['brand'] = trim($this->passedArgs['brand']);
            $brand = trim($this->passedArgs['brand']);
		} 

		$type = null;
		if (isset($this->passedArgs['type'])) {
            $this->request->data['Ingredient']['type'] = trim($this->passedArgs['type']);
            $type = trim($this->passedArgs['type']);
		}

		$results = QueryBot::ingredient_query($description, $brand, $type);
		$this->set('ingredients', $results);
		$this->set('count', count($results));
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

		$owns = QueryBot::get_user_ingredient($this->Auth->user('user_id'), $id);
		$this->set('owns', $owns[0]);
		$this->set('owns_at_all', count($owns));
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
