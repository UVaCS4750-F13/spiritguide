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
		}$this->redirect($url, null, true);}

	public function index() {
		$description = null;
		if (isset($this->passedArgs['description'])) {
            $this->request->data['Ingredient']['description'] = trim($this->passedArgs['description']);
           $description = trim($this->passedArgs['description']);
		}

		$brand = null;
		if (isset($this->passedArgs['brand'])) {
            $this->request->data['Ingredient']['brand'] = trim($this->passedArgs['brand']);
            $brand = trim($this->passedArgs['brand']);
		} 

		$classification = null;
		if (isset($this->passedArgs['classification'])) {
            $this->request->data['Ingredient']['classification'] = trim($this->passedArgs['classification']);
            $classification = trim($this->passedArgs['classification']);
		}

		$results = QueryBot::index_ingredients($description, $brand, $classification);
		$this->set('ingredients', $results);
		$this->set('ingredient_count', count($results));}

	public function add() { throw new NotFoundException(_('Invalid Action')); }

	public function view($id = null) {

		if (!$this->Ingredient->exists($id)) {
			throw new NotFoundException(__('Invalid Ingredient'));
		}

		$ingredient = QueryBot::retrieve_ingredient($id);    
        $this->set('ingredient', $ingredient[0]['ingredient']);
        
        $this->set('prices', QueryBot::retrieve_prices($id));
        
        $this->set('proof', QueryBot::retrieve_proof($id));

        $owns = QueryBot::retrieve_owns($this->Auth->user('user_id'), $id);
        $this->set('owns_at_all', count($owns));
        if(count($owns) == 1) {
        	$this->set('current_inventory', $owns[0]['owns']);}
		}
	public function edit($id = null) { throw new NotFoundException(_('Invalid Action')); }

	public function delete($id = null) { throw new NotFoundException(_('Invalid Action')); }
}
