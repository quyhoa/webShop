<?php echo $this->Session->flash('flash_book'); ?>
<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Thêm sách mới</h3>
      </div>
      <div class="panel-body">
      
      <?php echo $this->Form->create('Detail',array('action'=>'add','type'=>'file','inputDefaults'=>array('label'=>false))); ?>
  <table class="table">
    <tbody>
      <tr>
      	<td>Tên sách</td>
      	<td><?php echo $this->Form->input('title',array('label'=>false)); ?></td>
      </tr>
      <tr>
        <td>Hình ảnh</td>
        <td><?php echo $this->Form->input('image',array('label'=>false,'type'=>'file')); ?></td>
      </tr>
      <tr>
        <td>Số trang</td>
        <td><?php echo $this->Form->input('pages',array('label'=>false)); ?></td>
      </tr>
       
       <tr>
        <td>Số lượng</td>
        <td><?php echo $this->Form->input('amount',array('label'=>false)); ?></td>
      </tr>
       <tr>
        <td>Tác giả</td>
        <td><?php echo $this->Form->input('Writer',array('label'=>false,'type'=>'text')); ?></td>
      </tr>
       <tr>
      <tr>
        <td>Mô tả nội dung sách</td>
        <td><?php echo $this->Form->input('descriptions',array('label'=>false,'type'=>'textarea','class'=>'ckeditor')); ?></td>
      </tr>
        <td></td>
        <td><?php echo $this->Form->button('Thêm mới',array('class'=>'btn btn-info')) ?></td>
      </tr>
    </tbody>
  </table>
  	
  <?php echo $this->Form->end(); ?>
      </div>
    </div>
