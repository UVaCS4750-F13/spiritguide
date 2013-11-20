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
            $cocktail_id = QueryBot::request($index, 'cocktail_id');
            $ingredient_id = QueryBot::request($index, 'ingredient_id');
            $volume_id = QueryBot::request($index, 'volume');
            if (QueryBot::create_contains($cocktail_id, $ingredient_id, $volume)) {
                $this->redirect(array('controller' => 'cocktails', 
                                        'action' => 'view', $cocktail_id));
            }
        }
    }
	

    public function view() {
        throw new NotFoundException(__('Invalid Action'));
    }


	public function edit() {
		throw new NotFoundException(__('Invalid Action'));
	}


	public function delete() {
        if($this->request->is('post')) {
            $index = 'Contain';
            $cocktail_id = QueryBot::request($index, 'cocktail_id');
            $ingredient_id = QueryBot::request($index, 'ingredient_id');
            if (QueryBot::delete_contains($cocktail_id, $ingredient_id)) {
                $this->redirect(array('controller' => 'cocktails', 
                                        'action' => 'view', $cocktail_id));
            }
        }
    }
}