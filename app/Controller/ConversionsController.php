<?php
App::uses('AppController', 'Controller');
/**
 * Conversions Controller
 *
 * @property Conversion $Conversion
 * @property PaginatorComponent $Paginator
 */
class ConversionsController extends AppController {

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
		$this->Conversion->recursive = 0;
		$this->set('conversions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Conversion->exists($id)) {
			throw new NotFoundException(__('Invalid conversion'));
		}
		$options = array('conditions' => array('Conversion.' . $this->Conversion->primaryKey => $id));
		$this->set('conversion', $this->Conversion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Conversion->create();
			if ($this->Conversion->save($this->request->data)) {
				$this->Session->setFlash(__('The conversion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conversion could not be saved. Please, try again.'));
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
		if (!$this->Conversion->exists($id)) {
			throw new NotFoundException(__('Invalid conversion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Conversion->save($this->request->data)) {
				$this->Session->setFlash(__('The conversion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conversion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Conversion.' . $this->Conversion->primaryKey => $id));
			$this->request->data = $this->Conversion->find('first', $options);
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
		$this->Conversion->id = $id;
		if (!$this->Conversion->exists()) {
			throw new NotFoundException(__('Invalid conversion'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Conversion->delete()) {
			$this->Session->setFlash(__('The conversion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The conversion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
