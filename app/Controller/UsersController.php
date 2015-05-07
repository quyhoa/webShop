<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail','Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
public function beforeFilter(){
	parent::beforeFilter();
		$this->Auth->allow('fogot_pass','register','send_mail','comfirm');
		//debug($this->request->params);
	}
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public function login(){
		if($this->request->is('post')){
			$data = $this->request->data;
			$us = $data['User']['username'];
			$pw = $data['User']['password'];
			$user = $this->User->find('all',array(
				'recursive'=>-1,
				'conditions'=>array(
					'User.username'=>$us,
					'User.password'=>md5($pw),
					'User.actived'=>1
				)
			));
			if(count($user)>0){
				if($this->Auth->login($user)){
					$this->Session->write('info_user',$user);
					$this->Session->write('user.id',$user[0]['User']['id']);
					if($user[0]['User']['group_id']==4){
						if(!empty($this->request->data['User']['link_re'])){
							$this->redirect($this->request->data['User']['link_re']);
						}else{
							$this->redirect('/');
						}
						
					}else{
						$this->redirect('/admin');
					}
				}else{
					$this->Session->setFlash('Sai thông tin tài khoản','default',array('class'=>'alert alert-warning'));
				}
			}/*else{
				$this->Session->setFlash('Bạn chưa đăng kí, hãy đăng kí người dùng để tiếp tục','default',array('class'=>'alert alert-warning'),'auth');
			}*/
			//debug($user);exit();
			//$this->Session->write('link_re',$link_re);
		}
		
	}

	// logout - Đăng xuất khỏi hệ thống
	public function logout(){
		if($this->Session->check('info_user')){
			$this->Session->destroy();
			$this->Session->setFlash('Bạn đã đăng xuất. Hãy đăng nhập để tiếp tục!', 'default', array('class' => 'alert alert-info'), 'auth');
			$this->redirect('/login');
		}
		else {
			$this->Session->setFlash('Bạn chưa đăng nhập!', 'default', array('class' => 'alert alert-danger'), 'auth');
			$this->redirect('/login');
		}
	}
	/*Khách hàng đăng kí thành viên*/
	public function register() {
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$check_cf_pass = strcmp($data['User']['password'],$data['User']['cf_pass']);
			if($check_cf_pass === 0){
				$this->request->data['User']['group_id'] = 4;
				$infoUs = $this->User->find('all',array(
					'recursive'=>-1,
					'conditions'=>array(
						'or'=>array(
							'User.username'=>$this->request->data['User']['username'],
							'User.email'=>$this->request->data['User']['email']
							)
						)
				));
				if(empty($infoUs)){
					$day = date("Y-m-d H:i:s");
					$code = md5($this->request->data['User']['username'].$this->request->data['User']['email'].$day);
					
					$link_comfirm = 'http://butchigh0.tk/xac-thuc/'.$code;
					$msg = 'Rất vui khi bạn đăng kí là thành viên của trang web của chúng tôi, hãy click vào link sau để kích hoạt người dùng '.$link_comfirm;
					$this->request->data['User']['code'] = $code;
					/*Kiêm tra send mail*/

						// $from='testcakequyhoa@gmail.com';
						// $to=$this->request->data['User']['email'];
						// $subject='Xác thực người dùng';
						// $message=$msg;
						// $options="Content-type:text/html;charset=utf-8\r\nFrom:$from\r\nReply-to:$from";
						// mail($to,$subject,$message,$options);
						$sendMail = $this->send_mail($this->request->data['User']['email'],$msg);
					
					/**/
					// debug($sendMail);exit();
					$this->User->create();
					$this->request->data['User']['password'] = md5($data['User']['password']);
					if ($this->User->save($this->request->data)) {
						$this->Session->setFlash('Đăng kí thành viên thành công. Vui lòng kiểm tra mail để kích hoạt người dùng','default',array('class'=>'alert alert-info'));
						// return $this->redirect($this->referer());
						return $this->redirect('/');
					} else {
						$this->Session->setFlash('Đăng kí không thành công vui lòng thử lại','default',array('class'=>'alert alert-info'));
					}
				}else{
					$this->Session->setFlash('Người dùng hoặc email đã được sử dụng','default',array('class'=>'alert alert-info'));
				}
			}else{
				$this->Session->setFlash('Xác thực mật khẩu không dúng','default',array('class'=>'alert alert-warning'));
			}
			//debug($check_cf_pass);
			
			//debug($code);exit();

		}
		$this->set(compact('roles'));
	}
	/*kich hoat nguoi dung*/
	public function comfirm($code=null){
		$kt = false;
		if(!empty($code)){
			$user = $this->User->findByCode($code);
			if(!empty($user)){
				$this->User->id = $user['User']['id'];
				$this->User->updateAll(array('User.actived'=>1),array('User.id'=>$user['User']['id']));
				// $this->User->saveField('actived',1);
				$this->User->updateAll(array('User.code'=>null),array('User.id'=>$user['User']['id']));
				$this->Session->setFlash('Bạn đã kích hoạt tài khoản thành công','default',array('class'=>'alert alert-info'),'comfirm');
				$this->redirect(array('action'=>'comfirm'));
				$kt = true;
			}else{
				$this->Session->setFlash('Tài khoản của bạn đã được kích hoạt','default',array('class'=>'alert alert-info'),'comfirm');
				$this->redirect(array('action'=>'comfirm'));
			}

		}
		$this->set(compact($kt));
	}

	public function history_buy() {
		if($this->Session->check('info_user')){
			$data = $this->Session->read('info_user');
			$info_users = $this->User->find('all',array(
				'conditions'=>array('User.id'=>$data[0]['User']['id']),
				'contain'=>array('Order')
			)
			);
		//debug($info_users);exit();
			//debug($info_users);
		$this->set(compact('info_users'));
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

public function checkout() {
		if($this->request->is('post')){
			/*thực hiện lưu thông tin người dùng và thông tin hóa đơn*/
			if($this->Session->check('info_user')){
				$user_info = $this->Session->read('info_user');
				$data = $this->request->data;
				//$cart = $this->Session->read();
				$user = $this->User->findById($data['User']['id']);
				//debug($this->Session->read('cart'));exit();
				$save_order = $this->save_order();
				$info_order = $this->Order->find('all',array(
					'order'=>array('Order.created'=>'desc'),
					'limit'=>1
					));
				//debug($info_order);
				/*------------lu thong tin book_order -------------*/
				$this->loadModel('BooksOrder');
				foreach ($this->Session->read('cart') as $book) {
					//debug($book['id']);
					$data_book['BooksOrder']['book_id'] = $book['id'];
					$data_book['BooksOrder']['order_id'] = $info_order[0]['Order']['id'];
					$data_book['BooksOrder']['sales'] = $book['quantity'];
					$this->BooksOrder->create($data_book);
					if($this->BooksOrder->save()){
						$this->Session->delete('cart');
						$this->Session->delete('total');
						$this->Session->setFlash('Bạn đã đăng kí mua hàng thành công','default',array('class'=>'alert alert-info'));
					}else{
						$this->Session->setFlash('Đăng kí mua hàng không thành công','default',array('class'=>'alert alert-info'));
					}
				}

				$this->redirect('/');
			}else{
				$this->redirect('/login');
			}
		}
	}
	/*---------------------Thuc hien luu hoa don----------------------*/
	public function save_order(){
		if($this->Session->check('cart')){
			$t=null;
			$save = false;
			$data_order['Order']['user_id'] = $this->request->data['User']['id'];
			//debug($this->Session->read('cart'));exit();
			foreach ($this->Session->read('cart') as $cart) {
				$t += ($cart['quantity'] * $cart['price']);
			}
			$data_order['Order']['total'] = $t;
			//debug($data_order);exit();
			$this->loadMOdel('Order');
			$this->Order->create();
			if ($this->Order->save($data_order)) {
				//$this->Session->setFlash(__('The order has been saved.'));
				$save = true;
			}
			return $save; 
		}
	}
	/*----------------------Thuc hien luu thong tin book order---------------------------*/
	/*public function save_book_order(){
		if($this->Session->check('cart')){
			$t=null;
			$save = false;
			//$data = $this->Session->read('cart');
			$this->loadModel('BooksOrder');
			foreach ($this->Session->read('cart') as $book) {
				//$data_book['BooksOrder']['book_id'] = 
			}
		}
	}*/
	public function register_member(){
		if ($this->request->is('post')) {
			$day = date("Y-m-d H:i:s");
			$code = md5($this->request->data['User']['username'].$this->request->data['User']['email'].$day);
			//debug($code);exit();
			$this->request->data['User']['group_id'] = 4;
			$infoUs = $this->User->find('all',array(
				'recursive'=>-1,
				'conditions'=>array(
					'or'=>array(
						'User.username'=>$this->request->data['User']['username'],
						'User.email'=>$this->request->data['User']['email']
						)
					)
			));
			
			if(empty($infoUs)){

				$this->User->create();
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash('Thêm mới người dùng thành công','default',array('class'=>'alert alert-success'));
					return $this->redirect($this->referer());
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			}else{
				$this->Session->setFlash('Người dùng đã tồn tại','default',array('class'=>'alert alert-danger'));
			}

		}
		$this->set(compact('roles'));
	}
/*---------------------------function sendmail--------------------------------------------*/	
	public function send_mail($to_mail=null,$msg=null){
		$kt = false;
		// $email = new CakeEmail('gmail');
		// $email->from('testcakequyhoa@gmail.com');
		// $email->to($to_mail);
		// $email->subject('Xác thực người dùng');
		$from='testcakequyhoa@gmail.com';
		$to=$to_mail;
		$subject='Xác thực người dùng';
		$message=$msg;
		$options="Content-type:text/html;charset=utf-8\r\nFrom:$from\r\nReply-to:$from";
		mail($to,$subject,$message,$options);	
		// $email->send($msg);	
		if(mail($to,$subject,$message,$options)){
			$kt = true;
		}
		return $kt;
	}
/*---------------------------Thông tin các quản trị viên--------------------------------------------*/
	public function admin_index() {
		$infoUsers = $this->User->find('all',array(
			'fields'=>array('id','group_id','username','address','phone_number','email'),
			'conditions'=>array('User.group_id <>'=>4),
			'contain'=>array(
				'Group'=>'name'
				)
		));
		$this->set('users', $infoUsers);
	}
/*---------------------------Actived--------------------------------------------*/	
	public function admin_activaced($id=null) {
		if($this->User->updateAll(array('User.actived'=>1),array('User.id'=>$id))){
			$this->Session->setFlash('Người dùng đã được kích hoạt','default',array('class'=>'alert alert-info'));
		}else{
			$this->Session->setFlash('Activaced không thành công','default',array('class'=>'alert alert-succsess'));
		}
		$this->redirect(array('action'=>'admin_list_member'));
	}

/*---------------------------Thông tin member--------------------------------------------*/
	public function admin_member() {
		$users = $this->User->find('all',array(
			'fields'=>array('id','group_id','username','address','phone_number','email','actived'),
			'conditions'=>array('User.group_id ='=>4),
			'contain'=>array(
				'Group'=>'name'
				)
		));
		// $this->set('users', $infoUsers);
		$title = 'Danh sách khách hàng';
		$this->set(compact('users','title'));
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}
	public function admin_view_member($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		//debug($this->request->data);
		//$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		//$this->set('user', $this->User->find('first', $options));
		$user = $this->User->findById($id);
		$this->loadModel('Order');
		$history = $this->Order->find('all',array(
			'order'=>array('Order.created'=>'desc'),
			'conditions'=>array('Order.user_id'=>$id),
			'join'=>array(
				array(
					'table'=>'books_orders',
					'alias'=>'BookOrder',
					'conditions'=>'BookOrder.order_id = Order.id'
					),
				array(
					'table'=>'books',
					'alias'=>'Book',
					'conditions'=>'BookOrder.books_id = Book.id')
				),
			'contain'=>array(
				'Book'
				)
			));
		//debug($history);exit();
		$this->set(compact('user','history'));
	}
	public function view($id=null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}
	public function edit($id=null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if($this->request->is('post')){
			$info_edit = $this->request->data;
			$info_user = $this->User->findById($id);
			$us_ss = $this->Session->read('info_user');
			if($us_ss[0]['User']['group_id'] == $info_user['User']['group_id']){
				if(md5($info_edit['User']['password']) == $info_user['User']['password']){
					if(strcmp($info_edit['User']['new_password'], $info_edit['User']['comfirm_password']) === 0){
						$info_edit['User']['password'] = md5($this->request->data['User']['new_password']);
						if ($this->User->save($info_edit)) {
						$this->Session->setFlash('Cập nhật thành công','default',array('class'=>'alert alert-success'));
						$this->redirect(array('action'=>'view',$id));
							//return $this->redirect(array('action' => 'index'));
						} else {
							$this->Session->setFlash('Cập nhật không thành công','default',array('class'=>'alert alert-success'));							
						}
					}else{
						$this->Session->setFlash('Xác thực mật khẩu không đúng','default',array('class'=>'alert alert-danger'));
					}
				}else{
					$this->Session->setFlash('Mật khẩu hiện tại không đúng','default',array('class'=>'alert alert-danger'));
				}
			}else{
				// $this->Session->setFlash('Bạn không có quyền thực hiện hành động này');
				$this->redirect('/');
			}
		}else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}	

	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		$this->loadModel('Group');
		$roles = $this->Group->find('list',array(
			'conditions'=>array('Group.id <>'=>1)
		));
		if ($this->request->is('post')) {
			$infoUs = $this->User->find('all',array(
				'recursive'=>-1,
				'conditions'=>array('User.username'=>$this->request->data['User']['username'])
			));
			//debug($this->request->data['User']['password']);
			//debug($this->Auth->password($this->request->data['User']['password']));exit();
			if(empty($infoUs)){
				$this->request->data['User']['password'] = md5($this->request->data['User']['password']);
				//debug($this->request->data['User']['password']);exit();
				//$password = md5($this->request->data['User']['password']);
				//$this->request->data['User']['password'] = $password;
				$this->User->create();				
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash('Thêm mới người dùng thành công','default',array('class'=>'alert alert-success'));
					return $this->redirect($this->referer());
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			}else{
				$this->Session->setFlash('Người dùng đã tồn tại','default',array('class'=>'alert alert-danger'));
			}

		}
		$this->set(compact('roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		
		if (!$this->User->exists($id) && $id != 1) {
			throw new NotFoundException(__('Invalid user'));
		}
		if($id != 1)
		{
			if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Cập nhật thành công','default',array('class'=>'alert alert-success'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Cập nhật không thành công','default',array('class'=>'alert alert-success'));
				}
			} else {
				$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
				$this->request->data = $this->User->find('first', $options);
			}
			$this->loadModel('Group');
			$roles = $this->Group->find('list',array(
				'conditions'=>array('Group.id <>'=>1)
				));
			$this->set(compact('votes','roles'));
		}else{
			$this->redirect(array('controller'=>'users','action'=>'admin_index'));
		}
		//debug($this->request->data);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if($id!=1){
			$this->User->id = $id;
			$this->request->allowMethod('post', 'delete');
			if ($this->User->delete()) {
				$this->Session->setFlash('Xóa người dùng thành công','default',array('class'=>'alert alert-success'));
			} else {
				$this->Session->setFlash('Xóa người dùng không thành công','default',array('class'=>'alert alert-warning'));
			}
			return $this->redirect($this->referer());
		}else{
			$this->redirect(array('controller'=>'users','action'=>'admin_index'));
		}
	}
	/*-----------fogot pass---------------*/
	public function fogot_pass(){
		if($this->request->is('post')){
			$data = $this->request->data;
			$check_data = $this->User->findByEmail($data['User']['email']);
			// debug($data);
			// debug($check_data);exit();
			if(empty($check_data)){
				$this->Session->setFlash('Email không tồn tại. Vui lòng chọn mail khác','default',array('class'=>'alert alert-danger'));
			}else{
					$day = time();
					$code = $data['User']['username'].$day;
					$new_pass = md5($code);
					$msg = 'Rất vui khi bạn đăng kí là thành viên của trang web của chúng tôi.Mật khẩu hiện tại của bạn là:'.$code.' hãy tiến hành đăng nhập để đổi lại mật khẩu';
					// $data['User']['password'] = md5($code);
					$this->send_mail($data['User']['email'],$msg);
					// $fogot = $this->User->updateAll(array('User.password'=>$date['User']['password']),array('User.id'=>$check_data['User']['id']));
					$this->User->updateAll(array('User.password'=>$new_pass),array('User.id'=>$check_data['User']['id']));
					$this->Session->setFlash('Vui lòng kiểm tra mail để lấy lại mật khẩu','default',array('class'=>'alert alert-info'));
			}
		}
	}
	
}
