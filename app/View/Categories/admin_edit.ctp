<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Thông tin chuyên mục</h3>
      </div>
      <div class="panel-body">
      
      <?php echo $this->Form->create('Category',array('action'=>'admin_edit')); ?>
        <table class="table">
          <tbody>
            <tr>
            	<td>Tên chuyên mục</td>
            	<td><?php echo $this->Form->input('name',array('label'=>false)); ?></td>
            </tr>
            <tr>
            	<td>Mô tả</td>
            	<td><?php echo $this->Form->input('description',array('label'=>false,'type'=>'textarea','class'=>'ckeditor')); ?></td>
            </tr>
          </tbody>
        </table>
  	<?php echo $this->Form->button('Cập nhật chuyên mục',array('class'=>'btn btn-info')) ?>
  <?php echo $this->Form->end(); ?>
      </div>
    </div>

