
<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Danh sách người dùng</h3>
      </div>
      
      <div class="panel-body">
      <?php echo $this->Html->link('Thêm mới người dùng',array('controller'=>'users','action'=>'admin_add'),array('class'=>'btn btn-success')); ?>
        <table class="table table-condensed">
	<thead>
	<tr>
			<th>STT</th>
			<th>Vai trò</th>
			<th>Tên đăng nhập</th>
			<th>Địa chỉ</th>
			<th>Email</th>
			<th>Số điện thoại</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
			
	</tr>
	</thead>
	<tbody>
	<?php $i=0;
		foreach($users as $user):
			$i++;
	 ?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $user['Group']['name']; ?></td>
		<td><?php echo $this->Html->link($user['User']['username'],array('controller'=>'Users','action' => 'admin_view', $user['User']['id'])); ?></td>
		<td><?php echo $user['User']['address'] ?></td>
		<td><?php echo $user['User']['email'] ?></td>
		<td><?php echo $user['User']['phone_number'] ?></td>
		<td><?php if($user['User']['group_id'] !=1): ?>
			<?php echo $this->Html->link('sửa',array('controller'=>'users','action'=>'admin_edit',$user['User']['id']),array('class'=>'btn btn-success')) ?> <?php echo $this->Form->postLink('Xóa', array('action' => 'admin_delete', $user['User']['id']), array('class'=>'btn btn-danger'), __('Bạn có muốn xóa " %s "?', $user['User']['username']));
			 ?>
			<?php endif; ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
      </div>
  </div>

