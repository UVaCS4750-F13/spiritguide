<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'QueryBot');

class ContainsController extends AppController {
    public $components = array();


	public function index() {
		throw new NotFoundException(__('Invalid Action'));
	}


	public function add() {
		if($this->request->is('post')) {
          	$index = 'Contain';
            $cocktail_id = $this->request->data[$index]['cocktail_id'];
            $ingredient_id = $this->request->data[$index]['ingredient_id'];
            $volume = $this->request->data[$index]['volume'];
            QueryBot::create_contains($cocktail_id, $ingredient_id, $volume);
            $this->redirect(array('controller' => 'cocktails', 'action' => 'view', $cocktail_id));
        }
    }
	

    public function view() {
        throw new NotFoundException(__('Invalid Action'));
    }


	public function update_contains() {
        if ($this->request->is('post')) {
            $cocktail_id = QueryBot::tidy($this->request->data['Contains']['cocktail_id']);
            $ingredient_id = QueryBot::tidy($this->request->data['Contains']['ingredient_id']);
            $volume = QueryBot::tidy($this->request->data['Contains']['volume']);
            QueryBot::update_contains($cocktail_id, $ingredient_id, $volume);
            return $this->redirect(array('controller' => 'cocktails', 'action' => 'view', $cocktail_id));
        }
    }


	public function delete() {
        throw new NotFoundException(__('Invalid Action'));
    }
}