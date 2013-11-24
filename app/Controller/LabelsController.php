<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'QueryBot');

/**
 * Labels Controller
 *
 * @property Label $Label
 * @property PaginatorComponent $Paginator
 */
class LabelsController extends AppController {

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
		$this->Label->recursive = 0;
		$this->set('labels', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Label->exists($id)) {
			throw new NotFoundException(__('Invalid label'));
		}
		$options = array('conditions' => array('Label.' . $this->Label->primaryKey => $id));
		$this->set('label', $this->Label->find('first', $options));
	}

	public function add() {
		if($this->request->is('post')) {
          	$index = 'Labels';
            $cocktail_id = $this->request->data[$index]['cocktail_id'];
            $tag_id = $this->request->data[$index]['tag_id'];
            QueryBot::create_labels($tag_id, $cocktail_id);
            $this->redirect(array('controller' => 'cocktails', 'action' => 'edit', $cocktail_id));
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
		if (!$this->Label->exists($id)) {
			throw new NotFoundException(__('Invalid label'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Label->save($this->request->data)) {
				$this->Session->setFlash(__('The label has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The label could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Label.' . $this->Label->primaryKey => $id));
			$this->request->data = $this->Label->find('first', $options);
		}
		$cocktails = $this->Label->Cocktail->find('list');
		$tags = $this->Label->Tag->find('list');
		$this->set(compact('cocktails', 'tags'));
	}

	public function delete() {
        if ($this->request->is('post')) {
            $tag_id = QueryBot::tidy($this->request->data['Labels']['tag_id']);
            $cocktail_id = QueryBot::tidy($this->request->data['Labels']['cocktail_id']);
            QueryBot::delete_labels($tag_id, $cocktail_id);
            return $this->redirect(array('controller' => 'cocktails', 'action' => 'view', $cocktail_id));
        }
    }
}
