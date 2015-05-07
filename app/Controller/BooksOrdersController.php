<?php
App::uses('AppController', 'Controller');
/**
 * BooksOrders Controller
 *
 * @property BooksOrder $BooksOrder
 * @property PaginatorComponent $Paginator
 */
class BooksOrdersController extends AppController {

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
		$this->BooksOrder->recursive = 0;
		$this->set('booksOrders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BooksOrder->exists($id)) {
			throw new NotFoundException(__('Invalid books order'));
		}
		$options = array('conditions' => array('BooksOrder.' . $this->BooksOrder->primaryKey => $id));
		$this->set('booksOrder', $this->BooksOrder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BooksOrder->create();
			if ($this->BooksOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The books order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The books order could not be saved. Please, try again.'));
			}
		}
		$books = $this->BooksOrder->Book->find('list');
		$orders = $this->BooksOrder->Order->find('list');
		$this->set(compact('books', 'orders'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BooksOrder->exists($id)) {
			throw new NotFoundException(__('Invalid books order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BooksOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The books order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The books order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BooksOrder.' . $this->BooksOrder->primaryKey => $id));
			$this->request->data = $this->BooksOrder->find('first', $options);
		}
		$books = $this->BooksOrder->Book->find('list');
		$orders = $this->BooksOrder->Order->find('list');
		$this->set(compact('books', 'orders'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BooksOrder->id = $id;
		if (!$this->BooksOrder->exists()) {
			throw new NotFoundException(__('Invalid books order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BooksOrder->delete()) {
			$this->Session->setFlash(__('The books order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The books order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
