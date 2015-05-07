<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('view');
		//debug($this->request->params);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->Paginator->paginate());
	}

	public function admin_index() {
		//$this->layout = 'admin';
		$this->paginate = array('order'=>array('lft'=>'asc'));
		$this->Category->recursive = -1;
		$this->set('categories', $this->Paginator->paginate());
		$this->set('title','Quản lí danh mục');
	}
	public function menu()
	{
		if($this->request->is('requested')){
			return $this->Category->find('all',array(
			'recursive'=>-1,
			'order'=>array('name'=>'asc')
			));
		}
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($slug = null) {
		$options = array(
			'conditions' => array('Category.slug'=>$slug),
			'recursive'=>-1
			);
		$category = $this->Category->find('first',$options);
		if (empty($category)) {
			throw new NotFoundException(__('Không tìm thấy'));
		}
		
		$this->set('category',$category);
		/*Phân trang dữ liệu books*/
		$this->paginate = array(
			'fields'=>array('id','title','image','sale_price','slug','created','price','amount_view'),
			'order'=>array('created'=>'desc'),
			'limit'=> 8,
			'conditions'=>array(
				'status'=>1,
				'Category.slug'=>$slug
				),
			'contain'=>array(
				'Writer'=>array('fields'=>array('name','slug')),
				'Category'=>array('slug')
				),
			'paramType'=>'querystring'
			);
		$books = $this->paginate('Book');
		$this->set('books',$books);
	}

	public function admin_view($slug=null) {
		$options = array(
			'conditions' => array('Category.slug'=>$slug),
			'recursive'=>-1
			);
		$category = $this->Category->find('first',$options);
		if (empty($category)) {
			throw new NotFoundException(__('Không tìm thấy'));
		}
		
		$this->set('category',$category);
		/*Phân trang dữ liệu books*/
		$this->paginate = array(
			'fields'=>array('id','title','image','sale_price','slug','created','price'),
			'order'=>array('created'=>'desc'),
			'limit'=> 5,
			'conditions'=>array(
				'status'=>1,
				'Category.slug'=>$slug
				),
			'contain'=>array(
				'Writer'=>array('fields'=>array('name','slug')),
				'Category'=>array('slug')
				),
			'paramType'=>'querystring'
			);
		$books = $this->paginate('Book');
		$this->set('books',$books);
	}
/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$data['Category']['slug']=$this->to_slug($this->request->data['Category']['name']);
			//debug($data);
			$info_check = $this->Category->find('all',array(
				'recursive'=>-1,
				'conditions'=>array('Category.slug'=>$data['Category']['slug'])
				));
			//debug($info_check);
			if(empty($info_check)){
				$folder = new Folder();
				if($folder->create(APP.'webroot/img/'.$data['Category']['slug'])){
					$this->Category->create();
					if ($this->Category->save($data)) {
						$this->Session->setFlash('Tạo mới danh mục thành công','default',array('class'=>'alert alert-info'));
						return $this->redirect(array('action' => 'admin_index'));
					} else {
						$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
					}
				}else{
					$this->Session->setFlash('Không tạo được thư mục, vui lòng tạo lại sau','default',array('class'=>'alert alert-warning'));		
				}
				
			}else{
				$this->Session->setFlash('Danh mục đã tồn tại','default',array('class'=>'alert alert-warning'));
			}			
		}
		$categories = $this->Category->generateTreeList();
		$this->set('categories',$categories);
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash('Sửa dổi thành công','default',array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
		$users = $this->Category->User->find('list');
		$title = 'Chỉnh sửa danh mục';
		$this->set(compact('users','title'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->allowMethod('post', 'delete');
		$category = $this->Category->findById($id);
		$folder = new Folder(APP.'webroot/img/'.$category['Category']['slug']);
		if($folder->delete()){
			if ($this->Category->removeFromTree($id,true)) {
			$this->Session->setFlash('Danh mục và các quyển sách thuộc sanh mục dã bị xóa','default',array('class'=>'alert alert-success'));
			} else {
				$this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
			}
			return $this->redirect(array('action' => 'index'));
		}else{
			$this->Session->setFlash('Không xóa được thư mục, vui lòng thử lại sau','default',array('class'=>'alert alert-warning'));
		}
		
	}
}
