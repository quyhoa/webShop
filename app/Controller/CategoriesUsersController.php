<?php
App::uses('AppController', 'Controller');
/**
 * CategoriesUsers Controller
 *
 * @property CategoriesUser $CategoriesUser
 * @property PaginatorComponent $Paginator
 */
class CategoriesUsersController extends AppController {

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
		$this->CategoriesUser->recursive = 0;
		$this->set('categoriesUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CategoriesUser->exists($id)) {
			throw new NotFoundException(__('Invalid categories user'));
		}
		$options = array('conditions' => array('CategoriesUser.' . $this->CategoriesUser->primaryKey => $id));
		$this->set('categoriesUser', $this->CategoriesUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CategoriesUser->create();
			if ($this->CategoriesUser->save($this->request->data)) {
				$this->Session->setFlash(__('The categories user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories user could not be saved. Please, try again.'));
			}
		}
		$categories = $this->CategoriesUser->Category->find('list');
		$users = $this->CategoriesUser->User->find('list');
		$this->set(compact('categories', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CategoriesUser->exists($id)) {
			throw new NotFoundException(__('Invalid categories user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CategoriesUser->save($this->request->data)) {
				$this->Session->setFlash(__('The categories user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CategoriesUser.' . $this->CategoriesUser->primaryKey => $id));
			$this->request->data = $this->CategoriesUser->find('first', $options);
		}
		$categories = $this->CategoriesUser->Category->find('list');
		$users = $this->CategoriesUser->User->find('list');
		$this->set(compact('categories', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CategoriesUser->id = $id;
		if (!$this->CategoriesUser->exists()) {
			throw new NotFoundException(__('Invalid categories user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CategoriesUser->delete()) {
			$this->Session->setFlash(__('The categories user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The categories user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
