<?php //debug($books) ?>
<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">QUẢN LÍ SÁCH</h3>
      </div>
      
      <div class="panel-body">
      <?php echo $this->Html->link('Thêm mới sách',array('controller'=>'books','action'=>'admin_add'),array('class'=>'btn btn-success')); ?>
        <table class="table table-condensed">
	<thead>
	<tr>
			<th>STT</th>
			<th>Thể loại</th>
			<th><?php echo $this->Paginator->sort('title','Tên sách') ?></th>
			<th>Ảnh</th>
			<th><?php echo $this->Paginator->sort('price','Giá bán') ?></th>
			<th>Còn lại</th>
			<th><?php echo $this->Paginator->sort('sales','Số lượng bán') ?></th>
			
	</tr>
	</thead>
	<tbody>
	<?php $i = 1; foreach($books as $sale_book): ?>
	<tr>
		<td><?php echo $i++; ?></td>
		<td><?php echo $sale_book['Category']['name'] ?></td>
		<td><?php //echo $this->Html->link($sale_book['Book']['title'],array('action'=>'view',$sale_book['Book']['id'])) ?>
		<?php echo $sale_book['Book']['title'] ?>
		</td>
		<td><?php echo $this->Html->image($sale_book['Book']['image'],array('alt'=>$sale_book['Book']['slug'],'width'=>90,'height'=>120))?></td>
		<td><?php echo $sale_book['Book']['price'] ?></td>
		<td>
			<?php $tt = 0; foreach($sale_book['Order'] as $t): ?>

				<?php 
				//debug($t);
					$t = $t['BooksOrder']['sales'] ;
					$tt = $tt + $t;
				 ?>				
			<?php endforeach; ?>
			<?php echo $sale_book['Book']['amount'] - $tt ?>
		</td>
		<td>
			<?php $tt = 0; foreach($sale_book['Order'] as $t): ?>

				<?php 
				//debug($t);
					$t = $t['BooksOrder']['sales'] ;
					$tt = $tt + $t;
				 ?>				
			<?php endforeach; ?>
			<?php echo $tt; ?>
			<?php //echo $sale_book['Order']['sales'] ?>
		</td>
		
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>


      </div>
  </div>
  <?php echo $this->element('paginate',array('object'=>'quyển sách')) ?>

