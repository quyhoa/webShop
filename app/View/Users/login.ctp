<div class="panel panel-primary">

	<div class="panel-heading"><h4><span class="glyphicon glyphicon glyphicon-off" aria-hidden="true"></span> Đăng nhập tài khoản</h4>
	</div>
	<?php if(!$this->Session->check('info_user')): ?>

	<div class="panel-body">
	<?php echo $this->Session->flash('auth'); ?>
	 <!-- Show thong tin đăt hàng-->
	<?php echo $this->Form->create('User',array(/*'novalidate' => true,*/'inputDefaults'=>array('label'=>false))); ?>
		<div class="form-group">
		<label for="email">Tên đăng nhập:</label>
		<?php echo $this->Form->input('username',array('class'=>'form-control','placeholder'=>'Nhập tên đăng nhập')); ?>
		</div>
		<div class="form-group">
		<label for="pwd">Mật khẩu:</label>
		 <?php echo $this->Form->input('password',array('class'=>'form-control','placeholder'=>'Nhập mật khẩu')); ?>
		</div>
		<div class="form-group">
			<div class='row'>
				<div class='col-md-2'><?php echo $this->Html->link('Quên mật khẩu','/quen-mat-khau') ?></div>
				<div class='col-md-2'><?php echo $this->Html->link('Đăng kí mới','/register') ?></div>
			</div>
		</div>
		<?php if(!empty($_SERVER['HTTP_REFERER'])): ?>
	<?php echo $this->Form->input('link_re',array('hidden'=>true,'label'=>false,'value'=>$_SERVER['HTTP_REFERER'])); ?>
<?php endif; ?>
<?php echo $this->Form->button('ĐĂNG NHẬP',array('type'=>'submit','class'=>'btn btn-success')); ?>
	<?php echo $this->Form->end(); ?>
	</div>
<?php else: ?>
	<div class='panel-body'>
		<h4>Bạn đã đăng nhập hãy click vào <?php echo $this->Html->link('đây','/') ?> để quay lại trang chủ</h4>
	</div>
<?php endif; ?>
</div>