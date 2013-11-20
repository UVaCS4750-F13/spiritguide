<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'QueryBot');

class CocktailsController extends AppController {
	public $components = array('Session');

	function filter() {
		$url['action'] = 'index';
		foreach ($this->data as $k=>$v){ 
			foreach ($v as $kk=>$vv){
				if($vv != "") {
					$url[$kk]=$vv;
				}
			}}$this->redirect($url, null, true);}
	
	public function index() {


		$availability = null;
		if (isset($this->passedArgs['availability'])) {
            $this->request->data['Cocktail']['availability'] = trim($this->passedArgs['availability']);
           $description = trim($this->passedArgs['descr']);
		}

		$name = null;
		if (isset($this->passedArgs['name'])) {
            $this->request->data['Cocktail']['name'] = trim($this->passedArgs['name']);
            $name = trim($this->passedArgs['name']);
		} 

		$tag = null;
		if (isset($this->passedArgs['tag'])) {
            $this->request->data['Cocktail']['tag'] = trim($this->passedArgs['tag']);
            $tag = trim($this->passedArgs['tag']);
		}

		$results = QueryBot::cocktail_query($availability, $name, $tag);
		$this->set('cocktails', $results);
		$this->set('count', count($results));

	}


	public function view($id = null) {

		// check if valid cocktail
		if (!$this->Cocktail->exists($id)) {
			throw new NotFoundException(__('Invalid cocktail'));
		}

		$all_ingredients = array();
		foreach (QueryBot::get_ingredient_brands_asc() as $ingredient) {
			$all_ingredients[$ingredient['ingredient']['ingredient_id']] = $ingredient['ingredient']['brand'];
		} $this->set('all_ingredients', $all_ingredients);

		// get all ingredients in cocktail for use in view
		$this->set('cocktail_ingredients', QueryBot::get_cocktail_ingredients($id));
		

		// get cocktail for which id matches
		$cocktail_array = QueryBot::get_cocktail_by_id($id);
		$this->set('cocktail', $cocktail_array[0]);

	}

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
				$cocktails = QueryBot::get_cocktail_by_name($this->request->data['Cocktail']['name']);
				$cocktail_id = $cocktails[0]['cocktail']['cocktail_id'];

				$i1 = $this->request->data['Cocktail']['ingredient_1'];
				$v1 = $this->request->data['Cocktail']['ingredient_1_volume'];
	
				// insert first contains relation
				if ($i1 != '') {
					QueryBot::insert_contains($cocktail_id, $i1, $v1);
				}

				$i2 = $this->request->data['Cocktail']['ingredient_2'];
				$v2 = $this->request->data['Cocktail']['ingredient_2_volume'];
	
				// insert first contains relation
				if ($i2 != '') {
					QueryBot::insert_contains($cocktail_id, $i2, $v2);
				}

				$i3 = $this->request->data['Cocktail']['ingredient_3'];
				$v3 = $this->request->data['Cocktail']['ingredient_3_volume'];
	
				// insert first contains relation
				if ($i3 != '') {
					QueryBot::insert_contains($cocktail_id, $i3, $v3);
				}

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


	/************ DELETE ACTION ************/


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
	}


	/************ UPDATE ACTIONS ************/


	public function update_recipe() {
		if ($this->request->is('post')) {
			
			$cocktail_id = NULL;
			$rid = trim($this->request->data['Cocktail']['cocktail_id']);
			if ($rid != '') { $cocktail_id = $rid; }

			$name = NULL;
			$rname = trim($this->request->data['Cocktail']['recipe']);
			if ($rname != '') {
				$name = $rname;
			}

			if (QueryBot::update_cocktail_recipe($cocktail_id, $name)) {
				$this->redirect(array('action' => 'view', $cocktail_id));
			}
		}
	}

}