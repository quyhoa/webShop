<nav>
   <div class="panel panel-info">

     <div class="panel-heading"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
     DANH MỤC
     </div>
     <div class="panel-body">
       <ul class="nav">
          <li class="panel panel-success"><?php echo $this->Html->link('Quản lí danh mục', array('controller' => 'categories', 'action' => 'index','admin'=>true),array('class'=>'list-group-item')); ?></li>
          <li class="panel panel-success"><?php echo $this->Html->link('Quản lí sách', array('controller' => 'books', 'action' => 'admin_index'),array('class'=>'list-group-item')); ?></li>
          <li class="panel panel-success"><?php echo $this->Html->link('Quản lí người dùng', array('controller' => 'users', 'action' => 'admin_index'),array('class'=>'list-group-item')); ?></li>
          <li class="panel panel-success"><?php echo $this->Html->link('Quản lí khách hàng', array('controller' => 'users', 'action' => 'admin_member'),array('class'=>'list-group-item')); ?></li>
          <li class="panel panel-success"><?php echo $this->Html->link('Quản lí đặt hàng', array('controller' => 'orders', 'action' => 'admin_order'),array('class'=>'list-group-item')); ?></li>
          <li class="panel panel-success"><?php echo $this->Html->link('Sách bán chạy', array('controller' => 'Books', 'action' => 'sale_book'),array('class'=>'list-group-item')); ?></li>
          <li class="panel panel-success"><?php echo $this->Html->link('Thống kê doanh thu', array('controller' => 'orders', 'action' => 'index'),array('class'=>'list-group-item')); ?></li>
          <li class="panel panel-success"><?php echo $this->Html->link('Sách xem nhiều nhất', array('controller' => 'books', 'action' => 'view_more'),array('class'=>'list-group-item')); ?></li>       
      </ul>
     </div>
   </div>
</nav>
   

<style type="text/css">
	.div-menu{
		background-color: #00EE00;
		color:#FFFFFF
	}
</style>