<?php
App::uses('AppController', 'Controller');
/**
 * Votes Controller
 *
 * @property Vote $Vote
 * @property PaginatorComponent $Paginator
 */
class VotesController extends AppController {
	public function beforeFilter(){
	parent::beforeFilter();
		//debug($this->request->params);
	}

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
		$this->Vote->recursive = 0;
		$this->set('votes', $this->Paginator->paginate());
	}
	/*Đánh giá sách*/
	public function vote() {
		if($this->request->is('post')){
			$data = $this->request->data;
			if(!empty($data)){
				if($data['Vote']['type'] ==1){
					//$this->Vote->book_id = $data['Vote']['id'];
					$vote = $this->Vote->findByBook_id($data['Vote']['id']);
					$votes = $vote['Vote']['vote_good'] + 1;
					$this->Vote->id = $vote['Vote']['id'];
					$this->Vote->saveField('Vote.vote_good',$votes);
					$this->Vote->updateAll(array('Vote.vote_good'=>$votes),
						array('Vote.id'=>$vote['Vote']['id']));
					//debug($votes );exit();
				}else{
					$vote = $this->Vote->findByBook_id($data['Vote']['id']);
					$votes = $vote['Vote']['vote_bad'] + 1;
					$this->Vote->id = $vote['Vote']['id'];
					$this->Vote->saveField('Vote.vote_bad',$votes);
					$this->Vote->updateAll(array('Vote.vote_bad'=>$votes),
						array('Vote.id'=>$vote['Vote']['id']));
				}
				$this->Session->setFlash('Đánh giá của bạn đã được gửi','default',array('class'=>'alert alert-info'),'vote');
				$this->redirect($this->referer());
			}else{
				$this->redirect($this->referer());
			}
		}
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Vote->exists($id)) {
			throw new NotFoundException(__('Invalid vote'));
		}
		$options = array('conditions' => array('Vote.' . $this->Vote->primaryKey => $id));
		$this->set('vote', $this->Vote->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Vote->create();
			if ($this->Vote->save($this->request->data)) {
				$this->Session->setFlash(__('The vote has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vote could not be saved. Please, try again.'));
			}
		}
		$books = $this->Vote->Book->find('list');
		$this->set(compact('books'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Vote->exists($id)) {
			throw new NotFoundException(__('Invalid vote'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Vote->save($this->request->data)) {
				$this->Session->setFlash(__('The vote has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vote could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Vote.' . $this->Vote->primaryKey => $id));
			$this->request->data = $this->Vote->find('first', $options);
		}
		$books = $this->Vote->Book->find('list');
		$this->set(compact('books'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Vote->id = $id;
		if (!$this->Vote->exists()) {
			throw new NotFoundException(__('Invalid vote'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Vote->delete()) {
			$this->Session->setFlash(__('The vote has been deleted.'));
		} else {
			$this->Session->setFlash(__('The vote could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
