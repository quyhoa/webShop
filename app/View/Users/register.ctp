<div class="panel panel-primary">
	<div class="panel-heading"><h4><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Đăng kí tài khoản</h4>
	</div>
	<div class="panel-body">
	 <!-- Show thong tin đăt hàng-->
	<?php echo $this->Form->create('User',array('action'=>'register',/*'novalidate' => true,*/'inputDefaults'=>array('label'=>false))); ?>
		<div class="form-group">
		<label>Họ và tên:</label>
		<?php echo $this->Form->input('name',array('class'=>'form-control','placeholder'=>'Vui lòng nhập họ và tên')); ?>
		</div>
		<div class="form-group">
		<label>Tên đăng nhập:</label>
		<?php echo $this->Form->input('username',array('class'=>'form-control','placeholder'=>'Vui lòng nhập tên đăng nhập')); ?>
		</div>
		<div class="form-group">
		<label>Email</label>
		<?php echo $this->Form->input('email',array('class'=>'form-control','placeholder'=>'Vui lòng nhập email')); ?>
		</div>
		<div class="form-group">
		<label for="pwd">Mật khẩu:</label>
		 <?php echo $this->Form->input('password',array('class'=>'form-control','placeholder'=>'Vui lòng nhập mật khẩu')); ?>
		</div>
		<div class="form-group">
		<label>Xác nhận mật khẩu:</label>
		<?php echo $this->Form->input('cf_pass',array('type'=>'password','class'=>'form-control','placeholder'=>'Vui lòng nhập lại mật khẩu')); ?>
		</div>
		<div class="form-group">
		<label>Địa chỉ liên hệ</label>
		<?php echo $this->Form->input('address',array('class'=>'form-control','placeholder'=>'Vui lòng nhập địa chỉ liên hệ chính xác.')); ?>
		</div>
<?php echo $this->Form->button('Đăng kí ngay',array('type'=>'submit','class'=>'btn btn-success')); ?>
	<?php echo $this->Form->end(); ?>
	</div>

</div>