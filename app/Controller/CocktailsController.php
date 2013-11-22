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
			}
		}
		$this->redirect($url, null, true);}
	
	public function index() {

		$availability = null;
		if (isset($this->passedArgs['availability'])) {
            $this->request->data['Cocktail']['availability'] = QueryBot::tidy($this->passedArgs['availability']);
           	$availability = QueryBot::tidy($this->passedArgs['availability']);
		}

		$name = null;
		if (isset($this->passedArgs['cocktail_name'])) {
            $this->request->data['Cocktail']['cocktail_name'] = QueryBot::tidy($this->passedArgs['cocktail_name']);
            $name = QueryBot::tidy($this->passedArgs['cocktail_name']); } 

		$tag = null;
		if (isset($this->passedArgs['tag'])) {
            $this->request->data['Cocktail']['tag'] = QueryBot::tidy($this->passedArgs['tag']);
            $tag = QueryBot::tidy($this->passedArgs['tag']); }

		$results = QueryBot::index_cocktails($availability, $name, $tag);
		$this->set('cocktails', $results);
		$this->set('count', count($results));

		$all_tags = array();
		foreach (QueryBot::retrieve_tag_names_asc() as $tag) {
			$all_tags[$tag['tag']['tag_id']] = $tag['tag']['name'];
		} $this->set('all_tags', $all_tags); }

	public function add() {
		if ($this->request->is('post')) {
			$name = QueryBot::tidy($this->request->data['Cocktail']['name']);
			$recipe = QueryBot::tidy($this->request->data['Cocktail']['recipe']);
			QueryBot::create_cocktail($name, $recipe);
			
			$cocktail = QueryBot::retrieve_cocktail_by_name($name);
			$cocktail_id = $cocktail[0]['cocktail']['cocktail_id'];

			QueryBot::create_contains($cocktail_id, $this->request->data['Cocktail']['ingredient_1'], $this->request->data['Cocktail']['ingredient_1_volume']);
			QueryBot::create_contains($cocktail_id, $this->request->data['Cocktail']['ingredient_2'], $this->request->data['Cocktail']['ingredient_2_volume']);
			QueryBot::create_contains($cocktail_id, $this->request->data['Cocktail']['ingredient_3'], $this->request->data['Cocktail']['ingredient_3_volume']);

			return $this->redirect(array('controller' => 'cocktails', 'action' => 'view', $cocktail_id));	
		} else {
			$ingredients = array();
			foreach (QueryBot::retrieve_ingredient_brands_asc() as $ingredient) {
				$ingredients[$ingredient['ingredient']['ingredient_id']] = $ingredient['ingredient']['brand'];
			} $this->set('ingredients', $ingredients);
		}
	}

	public function view($id = null) {

		if (!$this->Cocktail->exists($id)) {
			throw new NotFoundException(__('Invalid cocktail'));
		}

		$all_ingredients = array();
		foreach (QueryBot::retrieve_ingredient_brands_asc() as $ingredient) {
			$all_ingredients[$ingredient['ingredient']['ingredient_id']] = $ingredient['ingredient']['brand'];
		} $this->set('all_ingredients', $all_ingredients);

		// get all ingredients in cocktail for use in view
		$this->set('cocktail_ingredients', QueryBot::retrieve_ingredients_by_cocktail($id));
	

		// get cocktail for which id matches
		$cocktail_array = QueryBot::retrieve_cocktail($id);
		$this->set('cocktail', $cocktail_array[0]);

	}


	public function edit($id = null) { throw new NotFoundException(__('Invalid Action')); }


	public function update_cocktail_name() {
		if ($this->request->is('post')) {
			$cocktail_id = QueryBot::tidy($this->request->data['Cocktail']['cocktail_id']);
			$name = QueryBot::tidy($this->request->data['Cocktail']['name']);
			QueryBot::update_cocktail_name($cocktail_id, $name);
			return $this->redirect(array('controller' => 'cocktails', 'action' => 'view', $cocktail_id));
		}
	}


	public function update_cocktail_recipe() {
		if ($this->request->is('post')) {
			$cocktail_id = QueryBot::tidy($this->request->data['Cocktail']['cocktail_id']);
			$recipe = QueryBot::tidy($this->request->data['Cocktail']['recipe']);
			QueryBot::update_cocktail_recipe($cocktail_id, $recipe);
			return $this->redirect(array('controller' => 'cocktails', 'action' => 'view', $cocktail_id));
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
			$rid = QueryBot::tidy($this->request->data['Cocktail']['cocktail_id']);
			if ($rid != '') { $cocktail_id = $rid; }

			$name = NULL;
			$rname = QueryBot::tidy($this->request->data['Cocktail']['recipe']);
			if ($rname != '') {
				$name = $rname;
			}

			if (QueryBot::update_cocktail_recipe($cocktail_id, $name)) {
				$this->redirect(array('action' => 'view', $cocktail_id));
			}
		}
	}

}