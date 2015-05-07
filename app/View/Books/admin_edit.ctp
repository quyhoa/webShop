<?php //debug($this->request->data); ?>
<?php echo $this->Session->flash('flash_book'); ?>
<div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Cập nhật sách</h3>
      </div>
      <div class="panel-body">
      
      <?php echo $this->Form->create('Book',array('action'=>'admin_edit','type'=>'file','inputDefaults'=>array('label'=>false))); ?>
      <?php echo $this->Form->input('id'); ?>
		  <table class="table">
		    <tbody>
		      <tr>
		      	<td>Thể loại sách</td>
		      	<td><?php echo $this->Form->input('category_id'); ?></td>
		      </tr>
		      <tr>
		      	<td>Tên sách</td>
		      	<td><?php echo $this->Form->input('title'); ?></td>
		      </tr>
		      <tr>
		        <td>Hình ảnh minh học</td>
		        <td><?php echo $this->Html->image($this->request->data['Book']['image']); ?>
		        </td>
		      </tr>
		      <tr>
		        <td>Tác giả</td>
		        <td><?php echo $this->Form->input('Writer',array('type'=>'text','value'=>$writers)); ?></td>
		      </tr>
		       <tr>
		        <td>Hình ảnh minh học</td>
		        <td><?php echo $this->Form->input('image',array('type'=>'file')); ?></td>
		      </tr>
		      <tr>
		        <td>Giá bán</td>
		        <td><?php echo $this->Form->input('price'); ?></td>
		      </tr>
		      <tr>
		        <td>Số trang</td>
		        <td><?php echo $this->Form->input('pages'); ?></td>
		      </tr>
		       <tr>
		        <td>Link Download</td>
		        <td><?php echo $this->Form->input('link_download'); ?></td>
		      </tr>
		       <tr>
		        <td>Số lượng</td>
		        <td><?php echo $this->Form->input('amount'); ?></td>
		      </tr>
		       
		       <tr>
		      <tr>
		        <td>Mô tả nội dung sách</td>
		        <td><?php echo $this->Form->input('descriptions',array('type'=>'textarea','class'=>'ckeditor')); ?></td>
		      </tr>
		        <td></td>
		        <td><?php echo $this->Form->button('Thêm mới',array('class'=>'btn btn-info')) ?></td>
		      </tr>
		    </tbody>
		  </table>
  	
  <?php echo $this->Form->end(); ?>
      </div>
    </div>
