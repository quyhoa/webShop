<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Thông tin cá nhân</h3>
      </div>
      <div class="panel-body">
        <table class="table">
	    <tbody>
	      <tr>
	      	<td>Vai trò</td>
	      	<td><?php echo $user['Group']['name']; ?></td>
	      </tr>
	      <tr>
	      	<td>Tên đăng nhập</td>
	      	<td><?php echo $user['User']['username']; ?></td>
	      </tr>
	      <tr>
	      	<td>Email</td>
	      	<td><?php echo $user['User']['email']; ?></td>
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