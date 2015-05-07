
  <div class="row">
    <nav>
      <div class="panel panel-primary">

        <div class="panel-heading">
        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
        <strong><?php echo 'SÁCH TRAO ĐỔI' ?></strong>
        </div>

        <div class="panel-body">
        <h4><?php echo $this->Html->link('Tạo sách muốn trao đổi',array('action'=>
        'add'),array('class'=>'btn btn-success')) ?></h4>
       			<table class="table">
       			<tr>
       				<th>Stt</th>
       				<th>Tên sách</th>
       				<th>Hình ảnh</th>
       				<th>Người đăng</th>
       				<th width="200px">Mô tả</th>
       				<th>Ngày tạo</th>

       			</tr>
       				<?php $i=1; foreach($details as $detail): ?>
       				<tr>
       					<td><?php echo $i++; ?></td>
       					<td><?php echo $this->Html->link($detail['Detail']['title'],array('action'=>'view',$detail['Detail']['id']));; ?></td>
       					<td><?php echo $this->Html->image($detail['Detail']['image'],array('width'=>90,'height'=>120)); ?></td>
       					<td>
       						<?php echo $detail['User']['name'] ?>
       					</td>
       					<td><?php echo $detail['Detail']['descriptions'] ?></td>
       					<td><?php echo $detail['Detail']['created'] ?></td>
       				</tr>
       				<?php endforeach; ?>

       			</table>
       			
        </div>
      </div>
    </nav>                         
</div>