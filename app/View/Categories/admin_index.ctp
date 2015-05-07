<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">QUẢN LÍ DANH MỤC</h3>
      </div>
      
      <div class="panel-body">
      <?php echo $this->Html->link('Thêm mới danh mục',array('controller'=>'categories','action'=>'admin_add'),array('class'=>'btn btn-success')); ?>
        <table class="table table-condensed">
			<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('STT'); ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('description'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
					
			</tr>
			</thead>
			<tbody>
			<?php $i=0;
				foreach($categories as $categorie):
					$i++;
			 ?>
			<tr>
				<td><?php echo $i ?></td>
				<td>
				<?php if(!empty($categorie['Category']['parent_id'])): ?>
					+
				<?php endif; ?>
				<?php echo $this->Html->link($categorie['Category']['name'],array('action' => 'admin_view', $categorie['Category']['slug'])); ?>
				</td>
				<td><?php echo $categorie['Category']['description'] ?></td>
				<td><?php echo $categorie['Category']['created']  ?></td>
				<td><?php echo $this->Html->link('sửa',array('action'=>'admin_edit',$categorie['Category']['id'])) ?> | <?php echo $this->Form->postLink(__('Xóa'), array('action' => 'admin_delete', $categorie['Category']['id']), array(), __('Bạn có muốn xóa tats cả các quyển sách có trong danh mục  " %s " ?', $categorie['Category']['name']));
					 ?></td>
			</tr>
		<?php endforeach; ?>
			</tbody>
		</table>
   </div>
 </div>

