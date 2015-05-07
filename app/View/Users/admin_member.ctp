
<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Danh sách khách hàng</h3>
      </div>
      
      <div class="panel-body">
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
	<?php  ?>
	<?php $i=0;
		foreach($users as $user):
			$i++;
	 ?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $user['Group']['name']; ?></td>
		<td><?php echo $this->Html->link($user['User']['username'],array('controller'=>'Users','action' => 'admin_view_member', $user['User']['id'])); ?></td>
		<td><?php echo $user['User']['address'] ?></td>
		<td><?php echo $user['User']['email'] ?></td>
		<td><?php echo $user['User']['phone_number'] ?></td>
		<td><?php if($user['User']['actived'] ==1): ?>
			<?php echo $this->Html->link('Chi tiết',array('controller'=>'users','action'=>'admin_view_member',$user['User']['id']),array('class'=>'btn btn-success')) ?> 
		<?php else: ?>
			<?php echo $this->Html->link('activated',array('controller'=>'users','action'=>'admin_activaced',$user['User']['id']),array('class'=>'btn btn-warning')) ?>
			
			<?php endif; ?>
			<?php echo $this->Form->postLink(__('Xóa'), array('action' => 'admin_delete', $user['User']['id']), array('class'=>'btn btn-danger'), __('Bạn muốn xóa khách hàng này  %s?', $user['User']['id']));
			 ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
      </div>
  </div>

