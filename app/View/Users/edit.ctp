<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Thông tin cá nhân</h3>
      </div>
      <div class="panel-body">
      <?php echo $this->Form->create('User',array('action'=>'edit','inputDefaults'=>array('label'=>false))); ?>
      <?php echo $this->Form->input('id'); ?>
        <table class="table">
	    <tbody>
	      <tr>
	      	<td>Tên đăng nhập</td>
	      	<td id="userName"><?php echo $this->Form->input('username'); ?></td>
	      </tr>
	      <tr>
	      	<td>Mật khẩu củ</td>
	      	<td id="pw"><?php echo $this->Form->input('password',array('value'=>'')); ?></td>
	      </tr>
	      <tr>
	      	<td>Mật khẩu mới</td>
	      	<td id="newPw"><?php echo $this->Form->input('new_password',array('type'=>'password')); ?></td>
	      </tr>
	      <tr>
	      	<td>Xác nhận mật khẩu</td>
	      	<td id="comfirmPw"><?php echo $this->Form->input('comfirm_password',array('type'=>'password')); ?></td>
	      </tr>
	      <tr>
	      	<td>Email</td>
	      	<td id="em"><?php echo $this->Form->input('email'); ?></td>
	      </tr>
	      <tr>
	      	<td>Địa chỉ</td>
	      	<td id="ad"><?php echo $this->Form->input('address'); ?></td>
	      </tr>
	      <tr>
	      	<td>Số điện thoại</td>
	      	<td id="phone"><?php echo $this->Form->input('phone_number'); ?></td>
	      </tr>
	      <tr>
	      	<td></td>
	      	<td><?php echo $this->Form->button('Save',array('class'=>'btn btn-primary')); ?></td>
	      </tr>
	    </tbody>
	  </table>
	  <?php echo $this->Form->end(); ?>
      </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

	});
</script>