<div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Thông tin cá nhân</h3>
      </div>
      <div class="panel-body">
      <?php echo $this->Form->create('User',array('inputDefaults'=>array('label'=>false))); ?>
      <?php echo $this->Form->input('id'); ?>
        <table class="table">
	    <tbody>
	      <tr>
	      	<td>Vai trò</td>
	      	<td><?php echo $this->Form->input('group_id',array('type'=>'select','options'=>$roles)); ?></td>
	      </tr>
	      <tr>
	      	<td>Tên đăng nhập</td>
	      	<td><?php echo $this->Form->input('username'); ?></td>
	      </tr>
	      <tr>
	      	<td>Mật khẩu</td>
	      	<td><?php echo $this->Form->input('password'); ?></td>
	      </tr>
	      <tr>
	      	<td>Email</td>
	      	<td><?php echo $this->Form->input('email'); ?></td>
	      </tr>
	      <tr>
	      	<td>Họ</td>
	      	<td><?php echo $this->Form->input('firstname'); ?></td>
	      </tr>
	      <tr>
	      	<td>Tên</td>
	      	<td><?php echo $this->Form->input('lastname'); ?></td>
	      </tr>
	      <tr>
	      	<td>Địa chỉ</td>
	      	<td><?php echo $this->Form->input('address'); ?></td>
	      </tr>
	      <tr>
	      	<td>Số điện thoại</td>
	      	<td><?php echo $this->Form->input('phone_number'); ?></td>
	      </tr>
	      <tr>
	      	<td></td>
	      	<td><?php echo $this->Form->button('Tạo mới người dùng',array('class'=>'btn btn-primary')); ?></td>
	      </tr>
	    </tbody>
	  </table>
	  <?php echo $this->Form->end(); ?>
      </div>
</div>