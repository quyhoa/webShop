<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'Books', 'action' => 'index'));
	//Router::connect('/sach-moi', array('controller' => 'Books', 'action' => 'latest_books'));
	Router::connect('/sach-moi', array('controller' => 'Books', 'action' => 'home'));
	Router::connect('/admin',array('controller'=>'books','action'=>'index','admin'=>true));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout',));
	Router::connect('/quen-mat-khau', array('controller' => 'users', 'action' => 'fogot_pass',));
	

	Router::connect('/register', array('controller' => 'users', 'action' => 'register',));
	Router::connect('/book_change', array('controller' => 'details', 'action' => 'index',));
	Router::connect('/xac-thuc/:code', array('controller' => 'users', 'action' => 'comfirm'),array('pass'=>array('code')));
	

	Router::connect('/:books_title',array('controller' => 'Books', 'action' => 'view'),array('pass'=>array('books_title')));
	Router::connect('/danh-muc/*',array('controller'=>'Categories','action'=>'view'));
	//Router::connect('/danh-muc/*',array('controller'=>'books','action'=>'view'));
	
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';

