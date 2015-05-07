<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');
App::uses('File','Utility');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('Tool','Session','Cookie',
		'Auth'=>array(
			'loginAction'=>'/login',
			'authError'=>'Bạn chưa đăng nhập',
			'flash'=>array(
				'element'=>'default',
				'key'=>'auth',
				'params'=>array('class'=>'alert alert-danger')
				),
			'loginRedirect'=>'/'
			)
		);
	public function beforeFilter(){
		//statis $dem = 0;
		$this->Auth->allow(
			'index','menu','add_to_cart','view_cart','test','book_change'
		);
		$manager_action = array('admin_delete', 'admin_add', 'admin_edit');
		$manager_controller = array('orders', 'users');

		$action_acc = $this->action;
		$controller_acc = $this->params['controller'];

		if($this->Session->check('info_user')){
			$user = $this->Session->read('info_user');
			//debug($user);
			if ($user[0]['User']['group_id'] != 1 && in_array($controller_acc, $manager_controller) == true && in_array($action_acc,$manager_action)) {
			$this->Session->setFlash('Bạn không được quyền thực hiện hành động này!', 'default', array('class' => 'alert alert-danger'), 'role');
			$this->redirect('/admin/' . $this->params['controller'] . '/index');
			}

			$this->set('info_user',$user);
		}




		if(substr($this->request->params['action'], 0, 5) == 'admin') {
			$this->layout = 'admin';
		}
		/*Luong nguoi truy cap*/
		$path = APP.'webroot/files/count.txt';		
		if(file_exists($path)){			
			$f = fopen($path,'r');
			$ct = fgets($f);
			$this->Session->write('visit',$ct);
		}	
		//debug($this->Session->check('visit'));

		if(substr($this->request->params['action'], 0, 5) == 'admin' && $user[0]['User']['group_id'] == 4) {
			$this->redirect('/');
		}
		/*----dem so nguoi online---*/
		$this->loadModel('Usersonline');
		$ip = $_SERVER['REMOTE_ADDR'];
		$time_limit = 300;
		$time = time();
		$if_online = $this->Usersonline->findByIp($ip);
		/*---thuc hien xoa nhung ban ghi co gio dawng nhap be hon gio hien tai---*/
			$old = $this->Usersonline->find('all',array(
				'conditions'=>array('time <'=>$time)
			));
			foreach ($old as $od) {
				if($time - $od['Usersonline']['time'] > $time_limit){
					$this->Usersonline->id = $od['Usersonline']['id'];
					$this->Usersonline->delete();
				}
			}
		if(empty($if_online)){
			$info_online['Usersonline']['ip'] = $ip;
			$info_online['Usersonline']['time'] = $time;			
			$info_online['Usersonline']['status'] = 1;
		

			$this->Usersonline->create();
			$this->Usersonline->save($info_online);
		}else{
			$time_now = time();
			$rs_time = $time_now - $if_online['Usersonline']['time'];
			if($rs_time <= $time_limit){
				$this->Usersonline->updateAll(array('Usersonline.time'=>$time_now),array('Usersonline.ip'=>$ip));
			}
		}
		$countOnline = $this->Usersonline->find('all',array('conditions'=>array('Usersonline.status'=>1)));
		$this->Session->write('isOnline',count($countOnline));
		// debug(count($countOnline));
	}
	public function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
}
