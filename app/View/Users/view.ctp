<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Thông tin cá nhân</h3>
      </div>
      <div class="panel-body">
      <div><?php echo $this->Html->link('Đổi mật khẩu',array('controller'=>'users','action'=>'edit',$user['User']['id']),array('class'=>'btn btn-success')); ?></div><br>
        <table class="table">
	    <tbody>
	      <tr>
	      	<td>Tên đăng nhập</td>
	      	<td id="userName"><?php echo $user['User']['username']; ?></td>
	      	
	      </tr>
	      <tr>
	      	<td>Mật khẩu</td>
	      	<td id="pw">**************************</td>
	      </tr>
	      <tr>
	      	<td>Email</td>
	      	<td id="em"><?php echo $user['User']['email']; ?></td></td>
	      </tr>
	      <tr>
	      	<td>Tên đầy đủ</td>
	      	<td><?php echo $user['User']['name']; ?></td>
	      </tr>
	      <tr>
	      	<td>Địa chỉ</td>
	      	<td><?php echo $user['User']['address']; ?></td>
	      </tr>
	      <tr>
	      	<td>Số điện thoại</td>
	      	<td><?php echo $user['User']['phone_number']; ?></td>
	      </tr>
	    </tbody>
	  </table>

      </div>
</div>