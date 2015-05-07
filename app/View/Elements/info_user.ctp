
<nav>
	<div class="panel panel-primary">
	<?php if($this->Session->check('info_user')): ?>
		<?php $data_user = $this->Session->read('info_user'); ?>
		<?php //debug($data_user); ?>
	  <div class="panel-heading">
	  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
	  Xin chào: <?php echo $data_user[0]['User']['name'] ?>
	  </div>
	  <div class="panel-body">
	  	<ul>
	  		<li><?php echo $this->Html->link('Thông tin cá nhân',array('controller'=>'users','action'=>'view',$data_user[0]['User']['id'])) ?></li>
	  		<li><?php echo $this->Html->link('Lịch sữ mua hàng',array('controller'=>'users','action'=>'history_buy')) ?></li>
	  	</ul>
	  </div>
	<?php else: ?>
		<div class="panel-heading">
	  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
	  Xin chào: GUEST
	  </div>
	  <div class="panel-body">
	  	Bạn chưa đăng  nhập<br><?php echo $this->Html->link('Đăng nhập ngay','/login') ?>
	  	<br><?php echo $this->Html->link('Đăng kí thành viên','/register'); ?>
	  </div>
	<?php endif; ?>
	</div>
</nav>