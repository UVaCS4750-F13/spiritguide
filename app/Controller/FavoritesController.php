<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'QueryBot');

/**
 * Favorites Controller
 *
 * @property Favorite $Favorite
 * @property PaginatorComponent $Paginator
 */
class FavoritesController extends AppController {

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
		$this->Favorite->recursive = 0;
		$this->set('favorites', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Favorite->exists($id)) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		$options = array('conditions' => array('Favorite.' . $this->Favorite->primaryKey => $id));
		$this->set('favorite', $this->Favorite->find('first', $options));
	}

	public function add() {
		if($this->request->is('post')) {
          	$index = 'Favorites';
            $cocktail_id = $this->request->data[$index]['cocktail_id'];
            $user_id = $this->Auth->user('user_id');
            QueryBot::create_favorites($user_id, $cocktail_id);
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
		if (!$this->Favorite->exists($id)) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Favorite->save($this->request->data)) {
				$this->Session->setFlash(__('The favorite has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favorite could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Favorite.' . $this->Favorite->primaryKey => $id));
			$this->request->data = $this->Favorite->find('first', $options);
		}
		$users = $this->Favorite->User->find('list');
		$cocktails = $this->Favorite->Cocktail->find('list');
		$this->set(compact('users', 'cocktails'));
	}

	public function delete() {
        if ($this->request->is('post')) {
        	$index = 'Favorites';
            $user_id = $this->Auth->user('user_id');
            $cocktail_id = QueryBot::tidy($this->request->data[$index]['cocktail_id']);
            QueryBot::delete_favorite($user_id, $cocktail_id);
            return $this->redirect(array('controller' => 'cocktails', 'action' => 'view', $cocktail_id));
        }
    }
}