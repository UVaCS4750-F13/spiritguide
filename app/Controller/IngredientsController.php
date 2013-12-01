<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'QueryBot');

class IngredientsController extends AppController {
	public $components = array('Auth');

	function filter() {
		$url['action'] = 'index';
		foreach ($this->data as $k=>$v){ 
			foreach ($v as $kk=>$vv){
				if($vv != "") {
					$url[$kk]=$vv;
				}
			} 
		}
		$this->redirect($url, null, true);
	}

	public function index() {
		$results = QueryBot::index_ingredients();
		$this->set('ingredients', $results);
		$this->set('ingredient_count', count($results));}

	public function index_alcohols() {
		$results = QueryBot::index_alcohols();
		$this->set('ingredients', $results);
		$this->set('ingredient_count', count($results));}

	public function index_mixers() {
		$results = QueryBot::index_mixers();
		$this->set('ingredients', $results);
		$this->set('ingredient_count', count($results));}

	public function add() {
		if ($this->request->is('post')) {
			$description = QueryBot::tidy($this->request->data['Ingredient']['description']);
			$brand = QueryBot::tidy($this->request->data['Ingredient']['brand']);
			QueryBot::create_ingredient($description, $brand);	
			$ingredient = QueryBot::retrieve_ingredient_id($description, $brand);
			$ingredient_id = $ingredient[0]['ingredient']['ingredient_id'];
			return $this->redirect(array('controller' => 'ingredients', 'action' => 'view', $ingredient_id));	
		} 
	}

	public function view($id = null) {
		if (!$this->Ingredient->exists($id)) { throw new NotFoundException(__('Invalid Ingredient')); }
		$ingredient = QueryBot::retrieve_ingredient($id);    
        $this->set('ingredient', $ingredient[0]['ingredient']);
        $this->set('prices', QueryBot::retrieve_prices($id));
        $this->set('proof', QueryBot::retrieve_proof($id));
        $this->set('owns', QueryBot::retrieve_owns($this->Auth->user('user_id'), $id)); }

}
