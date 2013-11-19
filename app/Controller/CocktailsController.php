<?php
App::uses('AppController', 'Controller');

// good ole' QueryBot
App::import('Vendor', 'QueryBot');

// model imports
App::import('Model','Ingredient'); 
App::import('Model','Contain');



/**
 * Cocktails Controller
 *
 * @property Cocktail $Cocktail
 * @property PaginatorComponent $Paginator
 */
class CocktailsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cocktail->recursive = 0;
		$this->set('cocktails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {

		// check if valid cocktail
		if (!$this->Cocktail->exists($id)) {
			throw new NotFoundException(__('Invalid cocktail'));
		}

		// get all ingredients in cocktail for use in view
		$this->set('ingredients', QueryBot::get_cocktail_ingredients($id));

		// get cocktail for which id matches
		$cocktail_array = QueryBot::get_cocktail_by_id($id);
		$this->set('cocktail', $cocktail_array[0]);

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		// attempting to create cocktail
		if ($this->request->is('post')) {

			
			$name = null; // check if name is null
			if (trim($this->request->data['Cocktail']['name']) != '') {
				$name = $this->request->data['Cocktail']['name'];
			}

			$recipe = null; // check if recipe is null
			if (trim($this->request->data['Cocktail']['recipe']) != '') {
				$recipe = $this->request->data['Cocktail']['recipe'];
			}

			// insert cocktail
			if (QueryBot::insert_cocktail($name, $recipe)) {

				// find id of new cocktail
				$cocktails = $this->Cocktail->query(QueryBot::get_cocktail_by_name($this->request->data['Cocktail']['name']));
				$cocktail_id = $cocktails[0]['cocktail']['cocktail_id'];

				// load contains relation model
				$this->loadModel('Contain');

				// insert first contains relation
				QueryBot::insert_contains(
					$cocktail_id,
					$this->request->data['Cocktail']['ingredient_1'], 
					$this->request->data['Cocktail']['ingredient_1_volume']);

				// insert second contains relation
				QueryBot::insert_contains(
					$cocktail_id,
					$this->request->data['Cocktail']['ingredient_2'], 
					$this->request->data['Cocktail']['ingredient_2_volume']);

				// redirect
				$this->redirect(array('action' => 'view', $cocktail_id));

			}

		} 


		else {

			// create array
			$ingredients = array();

			// get names
			foreach (QueryBot::get_ingredient_brands_asc() as $ingredient) {
				$ingredients[$ingredient['ingredient']['ingredient_id']] = $ingredient['ingredient']['brand'];
			}

			// set names
			$this->set('ingredients', $ingredients);

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

		// check if valid cocktail
		if (!$this->Cocktail->exists($id)) {
			throw new NotFoundException(__('Invalid cocktail'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cocktail->save($this->request->data)) {
				$this->Session->setFlash(__('The cocktail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cocktail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cocktail.' . $this->Cocktail->primaryKey => $id));
			$this->request->data = $this->Cocktail->find('first', $options);
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
		$this->Cocktail->id = $id;
		if (!$this->Cocktail->exists()) {
			throw new NotFoundException(__('Invalid cocktail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cocktail->delete()) {
			$this->Session->setFlash(__('The cocktail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cocktail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
