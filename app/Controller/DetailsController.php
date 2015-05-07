<?php
App::uses('AppController', 'Controller');
App::uses('File','Utility');
/**
 * Details Controller
 *
 * @property Detail $Detail
 * @property PaginatorComponent $Paginator
 */
class DetailsController extends AppController {
	public function beforeFilter(){
	parent::beforeFilter();
		$this->Auth->allow('view');
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
		$this->paginate = array(
			'order'=>array('created'=>'desc'),
			'limit'=>10,
			'contain'=>array('User')
		);
		$this->set('details', $this->Paginator->paginate());
	}

	/*----------------------sach trao doi---------------------------*/
	public function book_change(){
		if($this->request->is('requested')){
			return $this->Detail->find('all',array(
				'order'=>array('Detail.created'=>'desc'),
				'limit'=>12,
			'contain'=>array('User')));
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
		if (!$this->Detail->exists($id)) {
			throw new NotFoundException(__('Invalid detail'));
		}
		$options = array('conditions' => array('Detail.' . $this->Detail->primaryKey => $id));
		$this->set('detail', $this->Detail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			//debug($this->request->data);
			if($this->Session->check('info_user')){
				$user = $this->Session->read('info_user');
				$data = $this->request->data;
				if(!empty($data['Detail']['image']['name'])){
					$this->request->data['Detail']['user_id'] = $user[0]['User']['id'];
					//debug($this->uploadFile());exit();
					if($this->uploadFile()){
						$local = 'guest/'.$this->request->data['Detail']['image']['name'];
						$this->request->data['Detail']['image'] = $local;
						$this->Detail->create();
						if($this->Detail->save($this->request->data)){
							$this->Session->setFlash('Thêm mới sách trao đổi thành công','default',array('class'=>'alert alert-info'));			
						}else{
							$this->Session->setFlash('Thêm mới sách trao đổi không thành công','default',array('class'=>'alert alert-warning'));			
						}
					}else{
						$this->Session->setFlash('UpLoad ảnh không thành công vui lòng thử lại','default',array('class'=>'alert alert-warning'));		
					}
				}else{
					$this->Session->setFlash('Bạn chưa chọn hình ảnh, vui lòng chọn hình ảnh','default',array('class'=>'alert alert-warning'));	
				}
			}else{
				$this->Session->setFlash('Bạn phải đăng nhập để thực hiên tác vụ này','default',array('class'=>'alert alert-danger'));
				$this->redirect('/login');
			}
		}
	}

	private function uploadFile() {
		$file = new File($this->request->data['Detail']['image']['tmp_name']);
		$file_name = $this->request->data['Detail']['image']['name'];
		if($file->copy(APP.'webroot/img/guest/'.$file_name)){
			return true;
		}else{
			return false;
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
		if (!$this->Detail->exists($id)) {
			throw new NotFoundException(__('Invalid detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Detail->save($this->request->data)) {
				$this->Session->setFlash(__('The detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Detail.' . $this->Detail->primaryKey => $id));
			$this->request->data = $this->Detail->find('first', $options);
		}
		$users = $this->Detail->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Detail->id = $id;
		if (!$this->Detail->exists()) {
			throw new NotFoundException(__('Invalid detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Detail->delete()) {
			$this->Session->setFlash(__('The detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
