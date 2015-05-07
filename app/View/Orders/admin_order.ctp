<?php //debug($info_order); ?>
<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Danh sách đặt hàng</h3>
      </div>
      
      <div class="panel-body">

        <table class="table table-condensed">
			<thead>
			<tr>
					<th>Mã</th>
					<th>Select</th>
					<th>Khách hàng</th>
					<th>Tổng đơn hàng</th>
					<th>Tình trạng</th>
					<th>Số điện thoại</th>
					<th><?php echo $this->Paginator->sort('created','Ngày tạo');?></th>
					<th>Ngày xử lí</th>
					<th  style="width:152px">Hành động</th>			
					
			</tr>
			</thead>
			<?php echo $this->Form->create('Order',array('action'=>'process')); ?>
			<tbody>
				<?php $i=1; foreach($info_order as $order): ?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td>
							<?php if($order['Order']['status']==1): ?>
								<?php echo $this->Form->checkbox('Order.id.'.$order['Order']['id'],array('checked'=>'checked')); ?>
							<?php else: ?>
								<?php echo $this->Form->checkbox('Order.id.'.$order['Order']['id']); ?>
							<?php endif; ?>
						</td>
						<td><?php echo $order['User']['name'] ?></td>
						<td><?php echo $order['Order']['total']?></td>
						<td>
							<?php if($order['Order']['status'] == 1): ?>
							Đã xử lí
						<?php else: ?>
							Chờ xử lí
						<?php endif; ?>
						</td>
						<td><?php echo $order['User']['phone_number'] ?></td>
						<td><?php echo $order['Order']['created'] ?></td>
						<td><?php echo $order['Order']['modified'] ?></td>
						<td>
							<?php echo $this->Html->link('Xem', array('action' => 'admin_view', $order['Order']['id']),array('class'=>'btn btn-success')); ?> 
							<?php echo $this->Html->link('Cập nhật',array('controller'=>'orders','action'=>'admin_updata',$order['User']['id']),array('class'=>'btn btn-warning')); ?>   
								<?php //echo $this->Form->postLink('Hủy', array('action' => 'admin_delete', $order['Order']['id']), array('class'=>'btn btn-warning'), __('Bạn muốn hủy hóa đơn của " %s " ?', $order['User']['lastname']));
							 ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="btn btn-default"><?php echo $this->Form->select('action',array('1'=>'Chấp nhận đơn hàng','2'=>'Hủy đơn hàng'),array('empty'=>false)) ?>
		</div>

  		<div><?php echo $this->Form->button('Thực hiện vập nhật',array('class'=>'btn btn-success')); ?></div>
  		<?php echo $this->Form->end() ?>
      </div>
  </div>
<?php echo $this->Paginator->counter('Trang {:page}/{:pages} hiển thị {:current} đơn hàng trong tổng số {:count} đơn hàng') ?><br>
		<?php if(!empty($this->Paginator->numbers())): ?>
		<?php echo $this->Paginator->prev('Quay lại')?> | 
		<?php echo $this->Paginator->numbers(array('separator'=>' - ')) ?> | 
		<?php echo $this->Paginator->next('Kế tiếp') ?>
		<?php endif; ?>
