<?php
App::uses('AppController', 'Controller');
App::uses('File','Utility');
App::uses('CakeEmail', 'Network/Email');
/**
 * Books Controller
 *
 * @property Book $Book
 * @property PaginatorComponent $Paginator
 */
class BooksController extends AppController {
	public $paginate = array(
		'order'=>array('created'=>'desc'),
		'limit'=>5
		);
	public function beforeFilter(){
		parent::beforeFilter();
		//debug($this->request->params);
		$this->Auth->allow('countOnline','book_sale','vote','view','index','add_to_cart','seach','get_keyword','view_cart','home','update_cart','remove','empty_cart');
		//debug($this->request->params);
		$action = $this->request->params['action'];
		if($action != 'view'){
			
			//debug($_SERVER['HTTP_REFERER']);
			if($this->Session->check('param')){
				$param = $this->Session->read('param');
				$param['new']=$_SERVER['REQUEST_TIME'];
				$view = $param['view'];
				if(($param['new'] - $param['old']) > 15){
					$this->Book->updateAll(array('Book.amount_view'=>$view + 1),array('Book.id'=>$param['book.id']));
					$this->Session->delete('param');
				}		
			}			
			$this->Session->delete('view');
			$path = APP.'webroot/files/count.txt';
			if(file_exists($path)){
				if ($this->Session->check('visits')==false) {
					$dem = 0;
					$this->Session->write('visits');
						$f = fopen($path,'r');
						(int)$ct = fgets($f);	
						$dem = $ct + 1;
						$f2 = fopen($path,'w');
						fwrite($f2, $dem);
				}
			}else{
				$this->Session->setFlash('File không tồn tại','default',array('class'=>'alert alert-danger'));
			}
		}
	}
	//public $components = array('Cookie');

	public function book_sale(){
		$sales = $this->Book->find('all',array(
			
			'contain'=>array('Order')
		));
		debug($sales[0]['Order'][0]['BooksOrder']);
		debug($sales);exit();
	}
/**
 * Components
 *
 * @var array
 */
	//public $components = array('Paginator');
	public function home(){
		$this->loadModel('Category');
		$cate = $this->Category->find('all',array(
			'contain'=>array(
				'Book'=>array(
					'fields'=>array('id','title','image','sale_price','slug','created','price','amount_view'),
					'limit'=>4,
					'order'=>array('created'=>'desc')
				)
			)
		));
		$books = $this->Book->find('all',array(
			'fields'=>array('id','title','image','sale_price','slug','created','price','amount_view'),
			'order'=>array('created'=>'desc'),
			'recursive'=>-1,
			'conditions'=>array('status'=>1)
			));
		$d = count($books);
		$lm = floor($d/4) * 4;
		$t = 3;
			foreach ($books as $i => $book) {
				if($i <=3){
					$act[] = $book;
				}else{
					if($t <= $lm){
						if($i <= $t){
							$l_book[$t][] = $book;
						}else{
							$t += 5;
						}
					}else{
						$t = $lm;
					}
				}
			}
		$this->set(compact('act','l_book','cate'));
		// $this->set('cate',$cate);
		//debug($cate);
	}
	public function test(){
		$books = $this->Book->find('all',array(
			'fields'=>array('id','title','image','sale_price','slug','created','price','amount_view'),
			'order'=>array('created'=>'desc'),
			'recursive'=>-1,
			'conditions'=>array('status'=>1)
			));
		$d = count($books);
		$lm = floor($d/4) * 4;
		$t = 3;
			foreach ($books as $i => $book) {
				if($i <=3){
					$act[] = $book;
				}else{
					if($t <= $lm){
						if($i <= $t){
							$l_book[$t][] = $book;
						}else{
							$t += 5;
						}
					}else{
						$t = $lm;
					}
				}
			}
		$this->set(compact('act','l_book'));
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->Book->recursive = 0;
		//$this->set('books', $this->Paginator->paginate());
		$books = $this->Book->latest();

		//debug($books);
		$this->set('books',$books);
		//debug($books);
		//$this->Session->write('name','ok');
	}
	
	/**
	 * Tìm kiếm sách
	*/
	public function get_keyword()
	{
		if($this->request->is('post')){
			$this->Book->set($this->request->data);
			//debug($this->request->data);exit();
			if($this->Book->validates()){
				$keyword = $this->request->data['Book']['keyword'];
			}else{
				$errors = $this->Book->validationErrors;
				$this->Session->write('seach_validation',$errors);
			}

				$this->redirect(array('action'=>'seach','keyword'=>$keyword));
				$this->Session->delete('seach_validation');
		}
	}
	public function seach()
	{
		$notfound = true;
		//pr($this->requset->params['named']['keyword']);
		//pr($this->passedArgs);
		if(!empty($this->request->params['named']['keyword'])){
			$keyword = $this->request->params['named']['keyword'];
				$this->paginate = array(
					'fields'=>array('id','title','slug','image','sale_price','price'),
					'order'=>array('id'=>'desc'),
					'contain'=>array('Writer.name','Writer.slug'),
					'conditions'=>array(
						'status'=>1,
						'or'=>array(
							'title like'=>'%'.$keyword.'%',
							'Writer.name'=>'%'.$keyword.'%')
						),
					'joins'=>array(
						array(
							'table'=>'books_writers',
							'alias'=>'BooksWriter',
							'conditions'=>array('BooksWriter.book_id = Book.id')
							),
						array(
							'table'=>'writers',
							'alias'=>'Writer',
							'conditions'=>array('BooksWriter.writer_id = Writer.id')
							)
						)
					);
				$books = $this->paginate('Book');
				if(!empty($books)){
					$this->set('result',$books);
				}else{
					$notfound = false;
				}
				$this->set('keyword',$keyword);
			}				
			if($this->Session->check('seach_validation')){
				$this->set('errors',$this->Session->read('seach_validation'));
				//$this->Session->delete('seach_validation');
			}
			
			$this->set('notfound',$notfound);

	}

	/*----------------sach xem nhieu-------------------------*/
	public function admin_view_more() {
		$this->paginate = array(
			'limit'=>8,
			'order'=>array('Book.amount_view'=>'desc'),
			'recursive'=>-1
		);
		$books = $this->paginate();
		$title = 'Sách xem nhiều';
		$this->set(compact('books','title'));
		//debug($books);exit();
	}

	
	/*add gio hàng*/
	public function add_to_cart($id = null)
	{
		if($this->request->is('post'))
		{
			//tim thong tin san pham
			$books = $this->Book->find('first',array(
				'conditions'=>array(
					'Book.id'=>$id,
					)
				));
			//debug($books);exit();
			//Kiem tra su ton tai cua san pham trong gio hang
			if($this->Session->check('cart.'.$id)){
				$item = $this->Session->read('cart.'.$id);
				$item['quantity'] += 1;
			}else{
				$item = array(
				'id'=>$books['Book']['id'],
				'title'=>$books['Book']['title'],
				'slug'=>$books['Book']['slug'],
				'saleprice'=>$books['Book']['sale_price'],
				'price'=>$books['Book']['price'],
				'quantity'=>1
				);
			}
			
			//tao gio hang va them san pham vao gia hang
			$this->Session->write('cart.'.$id,$item);
			//tinh tong tien dang co trong gio hang
			$carts = $this->Session->read('cart');
			//debug($carts);exit();
			//$total = $this->sum($carts);
			$total = $this->Tool->sum($carts);//được tao trong Components
			$this->Session->write('total',$total);
			$this->Session->setFlash('Thêm thành công!',
				'default',array('class'=>'alert alert-info'),'cart');//car: ten key của flash
			$this->redirect($this->referer());		
		}
	}
	/* xem cchi tiet gio hang*/
	public function view_cart(){
		$this->layout = 'cart';
		$carts = $this->Session->read('cart');
		$total = $this->Session->read('total');
		$this->set(compact('carts','total'));
		//debug($this->Session->check('user_info'));
		if($this->Session->check('user_info')){
			$user_info = $this->Session->read('info_user');
		}else{
			$user_info = null;
		}
		$book_hot = $this->Book->find('all',array(
			'recursive'=>-1,
			'fields'=>array('id','title','slug','image','sale_price','price','vote_good','amount_view'),
			'conditions'=>array('Book.status'=>1),
			'limit'=>4,
			'order'=>array('vote_good'=>'desc')
		));
		//debug($book_hot);
		$this->set(compact('cart','user_info','book_hot'));
	}
	/*updata gio hang*/
	public function update_cart() {
		if($this->request->is('post')){
			//pr($this->request->data);
			$cart = $this->request->data;
			$tmp = $this->Session->read('cart');
			$this->Session->delete('cart');
			$this->Session->delete('total');
			//pr($tmp);
			$quantity = 1;
			$id = $cart['Book']['id'];
			if($cart['Book']['quantity'] > 1)
			{
				$quantity = $cart['Book']['quantity'];
			}
			//pr($tmp);
			foreach($tmp as $tp){
				if($tp['id'] == $id){
					$tp['quntity']=$quantity;
				}
			}
			$tmp[$id]['quantity'] = $quantity;
			//pr($tmp);
			//pr($tmp['id']);
			$this->Session->write('cart',$tmp);
			$total = $this->Tool->sum($tmp);
			$this->Session->write('total',$total);
			$this->redirect($this->referer());
		}
	}
	/*Xoa gioa hang*/
	public function empty_cart()
	{
		if($this->request->is('post')){
			$this->Session->delete('cart');
			$this->Session->delete('total');
			$this->redirect($this->referer());
		}
	}
	/*xoa tung mat hang trong gio hang*/
	public function remove($id = null)
	{
		if($this->request->is('post'))
		{
			$this->Session->Delete('cart.'.$id);
			$cart = $this->Session->read('cart');
			if(empty($cart)){
				$this->empty_cart();
			}else{
				$total = $this->Tool->sum($cart);
				$this->Session->write('total',$total);
			}
			$this->redirect($this->referer());
		}

	}

/**
 * latest_books
*/
	public function latest_books()
	{
		$this->paginate = array(
			'fields'=>array('id','title','image','sale_price','slug','created','price','amount_view'),
			'order'=>array('created'=>'desc'),
			'limit'=> 8,
			'conditions'=>array('status'=>1),
			'contain'=>array(
				'Writer'=>array('fields'=>array('name','slug'))
				),
			'paramType'=>'querystring'
			);
		$books = $this->paginate();
		//debug($books);
		$this->set('books',$books);
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 * 
 */
	public function view($slug = null) {


		$options = array(
			'conditions' => array('Book.slug'=>$slug),
			'contain'=>array(
				'Writer'=>array('name','slug')
				)
			);
		$option_vote = array('1'=>1,'2'=>2);
		$books = $this->Book->find('first',$options);
		
		//debug($books);
		if (empty($books)) {
			throw new NotFoundException(__('Không tìm thấy quyển sách này'));
		}
		$this->set(compact('books','option_vote'));
		/*Hien thi comment*/
		/*$this->loadModel('Comment');
		$comments = $this->Comment->find('all',array(
			'conditions'=>array(
				'book_id'=>$books['Book']['id']
				),
			'contain'=>array(
				'User'=>array('username')
				),
			'order'=>array('created'=>'desc')
			));
		$this->set('comments',$comments);*/
		/*Hien thi sach lien quan*/
		$related_books = $this->Book->find('all',array(
			'conditions'=>array(
				'category_id'=>$books['Book']['category_id'],
				'status'=>1,
				'Book.id <>'=>$books['Book']['id']
				),
			'limit'=>8,
			'order'=>'rand()',
			'contain'=>array('Writer'=>array('name','slug'))
			));
		$this->set('related_books',$related_books);
		//Báo lỗi xác thực dữ liệu khi gởi comment
		if($this->Session->check('comment_error')){
			$errors = $this->Session->read('comment_error');
			$this->set('errors',$errors);
			$this->Session->delete('comment_error');
		}

		/*-------------đếm lượt view--------------*/
    	if(!$this->Session->check('view')){

    		// $old = $this->Session->read('view');
    		// $new =  $_SERVER['REQUEST_TIME'];
    		// $timeOut = $new - $old;
    		// if($timeOut > 15){
    		// 	/*---tang lwuot view len mot---*/
    		// 	$id = $books['Book']['id'];
    		// 	$view = $books['Book']['amount_view'] + 1;
    		// 	$this->Book->updateAll(array('Book.amount_view'=>$view),array('Book.id'=>$id));
    		// 	$this->Session->write('view',$new);
    		$this->Session->write('view', $_SERVER['REQUEST_TIME']);
    		$param['controller']=$this->request->params['controller'];
    		$param['action']=$this->request->params['action'];
    		$param['old'] = $_SERVER['REQUEST_TIME'];
    		$param['new']=null;
    		$param['book.id']=$books['Book']['id'];
    		$param['view']=$books['Book']['amount_view'];
    		$this->Session->write('param',$param);

    		}
    	// }else{
    	// 	$this->Session->write('view', $_SERVER['REQUEST_TIME']);
    	// 	$param['controller']=$this->request->params['controller'];
    	// 	$param['action']=$this->request->params['action'];
    	// 	$param['old'] = $_SERVER['REQUEST_TIME'];
    	// 	$param['new']=null;
    	// 	$param['book.id']=$books['Book']['id'];
    	// 	$param['view']=$books['Book']['amount_view'];
    	// 	$this->Session->write('param',$param);
    	// }

		/*-------------end------------------------*/

	}
	/*------------------methos view book chang----------------------------*/
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		if (!$this->Book->exists($id)) {
			throw new NotFoundException(__('Invalid book'));
		}
		$options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
		$this->set('book', $this->Book->find('first', $options));
	}*/


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Book->exists($id)) {
			throw new NotFoundException(__('Invalid book'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
			$this->request->data = $this->Book->find('first', $options);
		}
		$categories = $this->Book->Category->find('list');
		$orders = $this->Book->Order->find('list');
		$writers = $this->Book->Writer->find('list');
		$this->set(compact('categories', 'orders', 'writers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		//debug($this->request->data);exit();
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		//$this->request->allowMethod('post', 'delete');
		$book = $this->Book->findById($id);
		//debug($book);exit();
		$file = new File(APP.'webroot/img/'.$book['Book']['image']);
		//$file = new File();
		//debug($book['Book']['image']);exit();
		//debug($file);exit();
		//$link = APP.'webroot/'.$book['Book']['image'];
		//debug(unlink($link));exit();
		if($file->delete()){
			if ($this->Book->delete()) {
				$this->Session->setFlash('Sách đã bị xóa','default',array('class'=>'alert alert-success'));
			} else {
				$this->Session->setFlash('Xóa sách không thành công','default',array('class'=>'alert alert-success'));
			}
		}else{
			$this->Session->setFlash('Không xóa được hình ảnh vui lòng thử lại sau','default',array('class'=>'alert alert-success'));
		}
		
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_process_book() {
		//debug($this->request->data);exit();
		//
		$this->layout = 'admin';
		foreach($this->request->data['Book']['id'] as $id =>$value){
			if($value == 1){
				$ids[] = $id;
			}			
		}
		//debug($ids);exit();
			//debug($this->request->data['Order']['id']);exit();
			if(!empty($ids)){
				switch ($this->request->data['Book']['action']) {
				case 1:
					if($this->Book->updateAll(array('Book.status'=>1),array('Book.id'=>$ids))){
						$this->Session->setFlash('Đã xử lí sách thành công','default',array('class'=>'alert alert-success'));
					}else{
						$this->Session->setFlash('Có lỗi xảy ra vui lòng thử lại','default',array('class'=>'alert alert-warning'));
					}
					break;
				case 2:
					if($this->Book->updateAll(array('Book.status'=>0),array('Book.id'=>$ids))){
						$this->Session->setFlash('Đã xử lí sách thành công','default',array('class'=>'alert alert-success'));
					}else{
						$this->Session->setFlash('Có lỗi xảy ra vui lòng thử lại','default',array('class'=>'alert alert-warning'));
					}
					break;	
				default:
					$this->Session->setFlash('Không có xử lí này vui lòng chọn xử lí khác','default',array('class'=>'alert alert-warning'));
					break;
			}
			}else{
				$this->Session->setFlash('Bạn chưa chọn sách để xử lí','default',array('class'=>'alert alert-warning'));
			}
		
		$this->redirect(array('action'=>'index'));
	}
	/*-------------------------admin-------------------------*/

/**
*admin index method
*/

	public function admin_index() {
		$this->layout = 'admin';
		/*$infoBooks = $this->Book->find('all',array(*/
			$this->paginate = array(
			'limit'=>5,
			'order'=>array('created'=>'desc'),
			'join'=>array(
				array(
					'table'=>'books_orders',
					'alias'=>'BookOrder',
					'conditions'=>array('BookOrder.book_id = Book.id','BookOrder.sales'=>'desc')
				),
				array(
					'table'=>'orders',
					'alias'=>'Order',
					'conditions'=>'BookOrder.order_id = Order.id'
				)
			),
			'contain'=>array(
				'Category'=>array('name'),
				'Order'
				),
			);
		$infoBooks = $this->paginate();
		$title = 'Quản lí sách';
		$this->set(compact('cate','infoBooks','title'));
	}
/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'admin';
		$this->loadModel('Category');
		//
		if ($this->request->is('post')) {	
			//debug($this->request->data);exit();
			$save = true;
			$category = $this->Category->findById($this->request->data['Book']['category_id']);
			$this->request->data['Book']['slug'] = $this->to_slug($this->request->data['Book']['title']);
			//debug($this->request->data);exit();
			//debug($this->request->data);exit();
			if(!empty($this->request->data['Book']['image']['name'])){
				if($this->uploadFile($category['Category']['slug'])){
					$location = $category['Category']['slug'].'/'.$this->request->data['Book']['image']['name'];
					$this->request->data['Book']['image'] = $location;
				}else{
					$save = false;
					$this->Session->setFlash('Lưu ảnh không thành công');
				}
			}else{
				$this->Session->setFlash('Ban chưa chọn file anh','default',array('class'=>'alert alert-success'),'flash_book');
				$save = false;
			}
			if($save){
				if($this->check_name_book($this->request->data['Book']['slug'])){
					$this->check_writer($this->request->data['Writer']['Writer']);
					$this->Book->create();
					if ($this->Book->save($this->request->data)) {
							$this->Session->setFlash('Thêm mới sách thành công','default',array('class'=>'alert alert-success'),'flash_book');
						}else{
							$this->Session->setFlash('Thêm mới sách không thành công, vui lòng kiểm tra lại thông tin','default',array('class'=>'alert alert-success'),'flash_book');
						}
				}else{
					$this->Session->setFlash('Sách đã tồn tại','default',array('class'=>'alert alert-warning'),'flash_book');
				}
			}else{
				$this->Session->setFlash('o thanh cong');
			}
		}
		$title = 'Thêm mới sách';
		$categories = $this->Category->find('list');
		$this->set(compact('categories', 'orders', 'writers','title'));
	}
	private function uploadFile($folder=null) {
		$file = new File($this->request->data['Book']['image']['tmp_name']);
		$file_name = $this->request->data['Book']['image']['name'];
		if($file->copy(APP.'webroot/img/'.$folder.'/'.$file_name)){
			return true;
		}else{
			return false;
		}
    }
    private function check_name_book($name){
    	$kt = $this->Book->find('all',array(
    		'recursive'=>-1,
    		'conditions'=>array('Book.slug'=>$name)
    		));
    	if(empty($kt)){
    		return true;
    	}else{
    		return false;
    	}
    }
    private function save_write(){
    	$this->loadModel('Writer');
    	$info_writer = $this->toslug($this->request->data['Writer']['name']);
    	$info = $this->Writer->find('all',array(
    		'recursive'=>-1,
    		'conditions'=>array('Writer.slug'=>$info_writer)
    	));
    	if(empty($info)){
    		$detail_writer['Writer']['name'] = $this->request->data['Writer']['Writer'];
    		$detail_writer['Writer']['slug'] = $info_writer;
    		$this->Writer->create();
    		$this->Writer->save($detail_writer);
    	}
    }
    /*function uploadFile($folder=null) {
		$file = new File($this->request->data['Book']['image']['tmp_name']);
		$ext = end(explode('.', $this->request->data['Book']['image']['name']));
		$file_name = $this->request->data['Book']['slug'];
		if($file->copy(APP.'webroot/files/'.$folder.'/'.$file_name)){
			$resutl = array(
				'status'=>true,
				'file_name'=>$file_name
				);
		}else{
			$resutl = array(
				'status'=>false,
				'file_name'=>$file_name
				);
		}
		return resutl;
    }*/
    private function check_writer($wr_list=null){
    	$writers = explode(',', $wr_list);
    	$this->loadModel('Writer');
    	foreach ($writers as $writer) {
    		$slug = $this->to_slug($writer);
    		$writer_info = $this->Writer->findBySlug($slug);
    		//debug($writer_info);
    		if(empty($writer_info)){
    			$data = array(
    				'name'=>ucwords(trim($writer)),
    				'biography'=>'Đang cập nhật',
    				'slug'=>$slug
    			);
    			$this->Writer->create();
    			$this->Writer->save($data);
    			$save_info[] = $this->Writer->id;
    		}else{
    			$save_info[] = $writer_info['Writer']['id'];
    		}
    	}
    	$this->request->data['Writer']['Writer'] = $save_info;
    }
/*--------------method admin_edit-----------------*/
	public function admin_edit($id=null){
		$this->layout = 'admin';
		$this->loadModel('Category');
		if (!$this->Book->exists($id)) {
			throw new NotFoundException(__('Invalid book'));
		}
		if ($this->request->is(array('post', 'put'))) {

			//debug($this->request->data);exit();
			$save = true;
			$category = $this->Category->findById($this->request->data['Book']['category_id']);
			$this->request->data['Book']['slug'] = $this->to_slug($this->request->data['Book']['title']);
			//debug($this->request->data);exit();
			if(!empty($this->request->data['Book']['image']['name'])){
				if($this->uploadFile($category['Category']['slug'])){
					$location = 'img/'.$category['Category']['slug'].'/'.$this->request->data['Book']['image']['name'];
					$this->request->data['Book']['image'] = $location;
				}else{
					$save = false;
					$this->Session->setFlash('Lư ảnh không thành công','default',array('class'=>'alert alert-success'),'flash_book');
				}
			}else{
				unset($this->request->data['Book']['image']);
			}
			if($save){
				$this->check_writer($this->request->data['Writer']['Writer']);
					$this->Book->create();
					if ($this->Book->save($this->request->data)) {
							$this->Session->setFlash('Cập nhật sách thành công','default',array('class'=>'alert alert-success'),'flash_book');
							return $this->redirect($this->referer());
						}else{
							$this->Session->setFlash('Cập nhật thành công, vui lòng kiểm tra lại thông tin','default',array('class'=>'alert alert-success'),'flash_book');
						}
				
			}else{
				$this->Session->setFlash('Cập nhật thất bại, vui lòng kiểm tra lại thông tin','default',array('class'=>'alert alert-success'),'flash_book');
			}
		} else {
			$options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
			$this->request->data = $this->Book->find('first', $options);
			if(!empty($this->request->data['Writer'])){
				foreach ($this->request->data['Writer'] as $writer) {
					$writer_list[] = $writer['name'];
				}
				$writers = implode(',', $writer_list);
			}else{
				$writers = null;
			}
		}
		$categories = $this->Book->Category->generateTreeList();
		$title = 'Cập nhật thông tin sách';
		$this->set(compact('categories','writers','title'));
	}

	public function admin_view($id=null) {
		$this->layout = 'admin';
		if (!$this->Book->exists($id)) {
			throw new NotFoundException(__('Invalid book'));
		}
		$options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
		$this->set('book', $this->Book->find('first', $options));
		$this->set('title','Xem chi tiết sách');
	}

	public function admin_sale_book() {
		$this->layout = 'admin';
		$this->paginate = array(
			'fields'=>array('id','title','image','sale_price','slug','created','price','amount'),
			'order'=>array('created'=>'desc'),
			'limit'=> 5,
			//'conditions'=>array('status'=>1),
			'contain'=>array(
				'Order',
				'Category'=>array('name')
				),
			'paramType'=>'querystring'
			);
		$books = $this->paginate();
		//debug($books);exit();
		$this->set('books',$books);
	}
	
/*---------------------------Thống kê đếm số lượng truy cập theo IP----------------------------*/



    /*Đánh giá sách*/
	public function vote() {
		if($this->request->is('post')){
			$data = $this->request->data;
			//debug($data);exit();
			if(!empty($data)){
				if($data['Book']['type'] ==1){
					//$this->Vote->book_id = $data['Vote']['id'];
					$vote = $this->Book->findById($data['Book']['id']);
					$votes = $vote['Book']['vote_good'] + 1;
					$this->Book->id = $data['Book']['id'];
					$this->Book->saveField('Book.vote_good',$votes);
					$this->Book->updateAll(array('Book.vote_good'=>$votes),
						array('Book.id'=>$vote['Book']['id']));
					//debug($votes );exit();
				}else{
					$vote = $this->Book->findById($data['Book']['id']);
					$votes = $vote['Book']['vote_bad'] + 1;
					$this->Book->id = $data['Book']['id'];
					$this->Book->saveField('Book.vote_bad',$votes);
					$this->Book->updateAll(array('Book.vote_bad'=>$votes),
						array('Book.id'=>$vote['Book']['id']));
				}
				$this->Session->setFlash('Đánh giá của bạn đã được gửi','default',array('class'=>'alert alert-info'),'vote');
				$this->redirect($this->referer());
			}else{
				$this->redirect($this->referer());
			}
		}
	}

	/*-------------Tinh so nguoi online----------------------------*/
	public function countOnline(){
		// $this->loadModel('Usersonline');
		// $ip = $_SERVER['REMOTE_ADDR'];
		// $time_limit = 300;
		// $time = time();
		// $if_online = $this->Usersonline->findByIp($ip);
		// /*---thuc hien xoa nhung ban ghi co gio dawng nhap be hon gio hien tai---*/
		// 	$old = $this->Usersonline->find('all',array(
		// 		'conditions'=>array('time <'=>$time)
		// 	));
		// 	foreach ($old as $od) {
		// 		if($time - $od['Usersonline']['time'] > $time_limit){
		// 			$this->Usersonline->id = $od['Usersonline']['id'];
		// 			$this->Usersonline->delete();
		// 		}
		// 	}
		// if(empty($if_online)){
		// 	$info_online['Usersonline']['ip'] = $ip;
		// 	$info_online['Usersonline']['time'] = $time;			
		// 	$info_online['Usersonline']['status'] = 1;
		

		// 	$this->Usersonline->create();
		// 	$this->Usersonline->save($info_online);
		// }else{
		// 	$time_now = time();
		// 	$rs_time = $time_now - $if_online['Usersonline']['time'];
		// 	if($rs_time <= $time_limit){
		// 		$this->Usersonline->updateAll(array('Usersonline.time'=>$time_now),array('Usersonline.ip'=>$ip));
		// 	}
		// }
		// $countOnline = $this->Usersonline->find('all',array('conditions'=>array('Usersonline.status'=>1)));
		// debug(count($countOnline));
		exit();
	}

}
