<?php //debug($infoBooks); ?>
<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">QUẢN LÍ SÁCH</h3>
      </div>
      
      <div class="panel-body">
      <?php echo $this->Html->link('Thêm mới sách',array('controller'=>'books','action'=>'admin_add'),array('class'=>'btn btn-success')); ?>
        <table class="table table-condensed">
	<thead>
	<tr>
			<th>Hiển thị</th>
			<th>Thể loại</th>
			<th>Tên sách</th>
			<th>Ảnh</th>
			<th>Giá bán</th>
			<th>Số lượng còn</th>
			<th>Giảm giá</th>
			<th style="width:150px"><?php echo __('Actions'); ?></th>
			
	</tr>
	</thead>

      <?php echo $this->Form->create('Book',array('action'=>'process_book')); ?>
	<tbody>
	<?php $i = 1; foreach($infoBooks as $infoBook): ?>
	<tr>
		<td>
			<?php if($infoBook['Book']['status']==1): ?>
				<?php echo $this->Form->checkbox('Book.id.'.$infoBook['Book']['id'],array('checked'=>'checked')); ?>
			<?php else: ?>
				<?php echo $this->Form->checkbox('Book.id.'.$infoBook['Book']['id']); ?>
			<?php endif; ?>
		</td>
		<td><?php echo $infoBook['Category']['name'] ?></td>
		<td><?php echo $this->Html->link($infoBook['Book']['title'],array('action'=>'view',$infoBook['Book']['id'])) ?></td>
		<td><?php echo $this->Html->image($infoBook['Book']['image'],array('width'=>90,'height'=>120))?></td>
		<td><?php echo $infoBook['Book']['price'] ?></td>
		<td>
			<?php 
				if(empty($infoBook['Order']['sales'])){
					$sale = 0;
					//debgu();
				}else{
					$sale = $infoBook['Order']['sales'];
				}
				$con = $infoBook['Book']['amount'] - $sale;
				echo $con;
			 ?>
		</td>
		<td><?php echo $infoBook['Book']['discount'] ?></td>
		<td>
			<?php echo $this->Html->link('sửa',array('controller'=>'books','action'=>'admin_edit',$infoBook['Book']['id']),array('class'=>'btn btn-success')) ?> 
			<?php echo $this->Html->link('Xóa', array('controller'=>'books','action' => 'admin_delete', $infoBook['Book']['id']), array('class'=>'btn btn-danger'), __('Bạn muốn xóa quyển sách  %s?',$infoBook['Book']['title']));
			 ?>
		</td>
	</tr>
<?php endforeach; ?>

	</tbody>
	</table>
	<div class="btn btn-default"><?php echo $this->Form->select('action',array('1'=>'Cho phép hiển thị','2'=>'Không cho phép hiển thị','3'=>'Xóa sách'),array('empty'=>false)) ?>
		</div>

  		<div><?php echo $this->Form->button('Thực hiện vập nhật',array('class'=>'btn btn-success')); ?></div>
      <?php echo $this->Form->end(); ?>
      </div>
  </div>
  <div class="panel-body">
      	<?php echo $this->element('paginate',array('object'=>'quyển sách')) ?>
      </div>

