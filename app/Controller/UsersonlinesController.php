<?php
App::uses('AppController', 'Controller');
/**
 * Usersonlines Controller
 *
 * @property Usersonline $Usersonline
 * @property PaginatorComponent $Paginator
 */
class UsersonlinesController extends AppController {

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
		$this->Usersonline->recursive = 0;
		$this->set('usersonlines', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Usersonline->exists($id)) {
			throw new NotFoundException(__('Invalid usersonline'));
		}
		$options = array('conditions' => array('Usersonline.' . $this->Usersonline->primaryKey => $id));
		$this->set('usersonline', $this->Usersonline->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Usersonline->create();
			if ($this->Usersonline->save($this->request->data)) {
				$this->Session->setFlash(__('The usersonline has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usersonline could not be saved. Please, try again.'));
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
		if (!$this->Usersonline->exists($id)) {
			throw new NotFoundException(__('Invalid usersonline'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Usersonline->save($this->request->data)) {
				$this->Session->setFlash(__('The usersonline has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usersonline could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Usersonline.' . $this->Usersonline->primaryKey => $id));
			$this->request->data = $this->Usersonline->find('first', $options);
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
		$this->Usersonline->id = $id;
		if (!$this->Usersonline->exists()) {
			throw new NotFoundException(__('Invalid usersonline'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Usersonline->delete()) {
			$this->Session->setFlash(__('The usersonline has been deleted.'));
		} else {
			$this->Session->setFlash(__('The usersonline could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
