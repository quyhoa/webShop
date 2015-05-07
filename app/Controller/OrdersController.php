<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {
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
	// public function index() {
	// 	$this->Order->recursive = 0;
	// 	$this->set('orders', $this->Paginator->paginate());
	// }
	public function view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$order = $this->Order->find('all',array(
			'join'=>array(
				array(
					'table'=>'books_orders',
					'alias'=>'BookOrder',
					'conditions'=>'BookOrder.order_id = Order.id'
				),
				array(
					'table'=>'books',
					'alias'=>'Book',
					'conditions'=>'BookOrder.book_id = Book.id'
				)
			),
			'conditions'=>array('Order.id'=>$id),
			'contain'=>array(
				'User'=>array(
					'fields'=>array('User.username','email','address')
				),
				'Book'=>array(
					'fields'=>array('title','image','price')
				)
				)
		));
		$this->set(compact('order'));

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		//$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		//$this->set('order', $this->Order->find('first', $options));
		$order = $this->Order->find('all',array(
			'join'=>array(
				array(
					'table'=>'books_orders',
					'alias'=>'BookOrder',
					'conditions'=>'BookOrder.order_id = Order.id'
				),
				array(
					'table'=>'books',
					'alias'=>'Book',
					'conditions'=>'BookOrder.book_id = Book.id'
				)
			),
			'conditions'=>array('Order.id'=>$id),
			'contain'=>array(
				'User'=>array(
					'fields'=>array('User.username','email','address')
				),
				'Book'=>array(
					'fields'=>array('title','image','price')
				)
				)
		));
		$this->set(compact('order'));
		//debug($order);
	}
	public function admin_updata($id=null){
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if($this->Order->updateAll(array('Order.status'=>1),array('Order.id'=>$id))){
			$this->Session->setFlash('Cập nhật thành công','default',array('class'=>'alert alert-info'));
		}else{
			$this->Session->setFlash('Cập nhật không thành công','default',array('class'=>'alert alert-info'));
		}
		$this->redirect($this->referer());
	}

/**
 * add method
 *
 * @return void
 */
	// public function add() {
	// 	if ($this->request->is('post')) {
	// 		$this->Order->create();
	// 		if ($this->Order->save($this->request->data)) {
	// 			$this->Session->setFlash(__('The order has been saved.'));
	// 			return $this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
	// 		}
	// 	}
	// 	$users = $this->Order->User->find('list');
	// 	$books = $this->Order->Book->find('list');
	// 	$this->set(compact('users', 'books'));
	// }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	// public function edit($id = null) {
	// 	if (!$this->Order->exists($id)) {
	// 		throw new NotFoundException(__('Invalid order'));
	// 	}
	// 	if ($this->request->is(array('post', 'put'))) {
	// 		if ($this->Order->save($this->request->data)) {
	// 			$this->Session->setFlash(__('The order has been saved.'));
	// 			return $this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
	// 		}
	// 	} else {
	// 		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
	// 		$this->request->data = $this->Order->find('first', $options);
	// 	}
	// 	$users = $this->Order->User->find('list');
	// 	$books = $this->Order->Book->find('list');
	// 	$this->set(compact('users', 'books'));
	// }


	/*-----------------------------admin------------------------*/
	public function admin_index() {
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$title = 'Thống kê sản phẩm';
		if($this->request->is('post')){
			$start = date('Y-m-d H:i:s', strtotime($this->request->data['Order']['begin']));
			$end = date('Y-m-d H:i:s', strtotime($this->request->data['Order']['end']) + 24*60*60 - 1);
			if($start > $end) {
				$this->Session->setFlash('Ngày bắt đầu không được lớn hơn ngày kết thúc!', 'default', array('class' => 'alert alert-danger'));
			}
			else {
				$orders = $this->Order->find('all',array(
					'conditions'=>array(
						'Order.modified >='=>$start,
						'Order.modified <='=>$end,
						'status'=>1
					),
					'join'=>array(
						array(
							'table'=>'books_orders',
							'alias'=>'BookOrder',
							'conditions'=>'BookOrder.order_id = Order.id'
							),
						array(
							'table'=>'books',
							'alias'=>'Book',
							'conditions'=>'BookOrder.book_id = Book.id'
							)
					),
					'contain'=>array('Book'=>array('title','price')),
					'order'=>array('Order.modified'=>'desc')
				));
				$total_day = 0;
				foreach($orders as $order){
					$total_day = $total_day + $order['Order']['total'];
				}
				$this->set(compact('orders','total_day','title'));
			}
			
		}else{
			$day = date("Y-m-d");
			$start = date('Y-m-d H:i:s', strtotime($day));
			$end = date('Y-m-d H:i:s', strtotime($day) + 24*60*60 - 1);
			$orders = $this->Order->find('all',array(
				'recursive'=>-1,
					'conditions' => array(
							'status'=>1,
							'Order.modified >=' => $start,
							'Order.modified <=' => $end
					)
				));
				//debug($orders);exit();
				$total_day = 0;
				foreach($orders as $order){
					$total_day = $total_day + $order['Order']['total'];
				}
				$this->set(compact('orders','total_day','title'));				
		}
		//debug($total_day);

		// $this->set(compact('orders','total_day'));
		//debug($day);
	}
	public function admin_order() {
		$this->paginate = array(
			'order'=>array('created'=>'desc'),
			'limit'=>10,
			'contain'=>array('User'),
			'paramType'=>'querystring'
			);
		$info_order = $this->paginate();
		$title = 'Danh sách đặt hàng';
		// $this->set('info_order',$info_order);
		$this->set(compact('title','info_order'));
	}
	/*--------Thong ke-----------*/
	public function admin_statical($id=null) {
		if($this->request->is('post')){
			//$date = strtotime($this->request->data['Order']['pick_year']['year']);
			$date = $this->request->data['Order']['pick_year']['year'];
			//debug($date);
			for($i=1;$i <13;$i++){
				$ar[] = $this->Order->find('all',array(
					'recursive'=>-1,
					'conditions'=>array('year(Order.modified)'=>$date,'month(Order.modified)'=>$i,'Order.status'=>1)
				));
			}
			foreach ($ar as $vl => $i) {
			    $total =0;
			    foreach ($i as $key=>$t) {
			        /*Tong donh thu theo thanh*/
			        $total =  $total + $t['Order']['total'];
			    }
			    $month[$vl] = $total;
			}
			$title = 'Thống kê của năm';
			$data = $month;
			// $this->set('data',$month);
			$this->set(compact('data','title'));
		}else{
			$date = date('Y');
			for($i=1;$i <13;$i++){
				$ar[] = $this->Order->find('all',array(
					'recursive'=>-1,
					'conditions'=>array('year(Order.modified)'=>$date,'month(Order.modified)'=>$i,'Order.status'=>1)
				));
			}
			foreach ($ar as $vl => $i) {
			    $total =0;
			    foreach ($i as $key=>$t) {
			        // Tong donh thu theo thanh
			        $total =  $total + $t['Order']['total'];
			    }
			    $month[$vl] = $total;
			}
			$title = 'Thống kê của năm';
			$data = $month;
			// $this->set('data',$month);
			$this->set(compact('data','title'));
		}
		
	}
	public function admin_process() {
		//
		foreach($this->request->data['Order']['id'] as $id =>$value){
			if($value == 1){
				$ids[] = $id;
			}			
		}
			if(!empty($ids)){
				switch ($this->request->data['Order']['action']) {
				case 1:
					if($this->Order->updateAll(array('Order.status'=>1),array('Order.id'=>$ids))){
						$this->Session->setFlash('Đã xử lí đơn hàng thành công','default',array('class'=>'alert alert-success'));
					}else{
						$this->Session->setFlash('Có lỗi xảy ra vui lòng thử lại','default',array('class'=>'alert alert-warning'));
					}
					break;
				case 2:
					if($this->Order->updateAll(array('Order.status'=>0),array('Order.id'=>$ids))){
						$this->Session->setFlash('Đã xử lí đơn hàng thành công','default',array('class'=>'alert alert-success'));
					}else{
						$this->Session->setFlash('Có lỗi xảy ra vui lòng thử lại','default',array('class'=>'alert alert-warning'));
					}
					break;
				default:
					$this->Session->setFlash('Không có xử lí này vui lòng chọn xử lí khác','default',array('class'=>'alert alert-warning'));
					break;
			}
			}else{
				$this->Session->setFlash('Bạn chưa chọn đơn hàng để xử lí','default',array('class'=>'alert alert-warning'));
			}
		
		$this->redirect(array('action'=>'order'));
	}

	public function admin_sale_book() {
		/*$sale_books = $this->Order->find('all',array(
			'order'
		));*/
		$this->paginate = array(
			'join'=>array(
				
				array(
					'table'=>'orders',
					'alias'=>'Order',
					'conditions'=>'BookOrder.order_id = Order.id'),
				array(
					'table'=>'books_orders',
					'alias'=>'BookOrder',
					'conditions'=>'BookOrder.book_id = Book.id'
					)	
				),
			'contain'=>array('Book'
				),
		);
		$sale_books = $this->paginate();
		$this->set(compact('sale_books'));
	}

	
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function admin_delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Order->delete()) {
			$this->Session->setFlash('Hóa đơn đã được xóa','default',array('class'=>'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'list_order'));
	}*/
}
