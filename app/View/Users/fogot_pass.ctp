

<!-- <div class="fb-comments" data-href="http://localhost:9999/web/" data-colorscheme="light" 
   data-numposts="5" data-width="500">
</div> -->

<div class="row">
  <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Quên mật khẩu</h3>
      </div>      
      <div class="panel-body">
        <?php echo $this->Form->create('User',array('action'=>'fogot_pass',/*'novalidate' => true,*/'inputDefaults'=>array('label'=>false))); ?>
    <div class="form-group">
    <label>Tên đăng nhập:</label>
    <?php echo $this->Form->input('username',array('class'=>'form-control','placeholder'=>'Vui lòng nhập tên đăng nhập')); ?>
    </div>
    <div class="form-group">
    <label>Email</label>
    <?php echo $this->Form->input('email',array('class'=>'form-control','placeholder'=>'Vui lòng nhập email')); ?>
    </div>
<?php echo $this->Form->button('Submit',array('type'=>'submit','class'=>'btn btn-success')); ?>
  <?php echo $this->Form->end(); ?>
      </div>
  </div>
  <!-- sach lien quan -->

</div>