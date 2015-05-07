<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                        
			      </button>
			      <a class="navbar-brand" href="#">SHOPCONGNGHE</a>
			    </div>
			    <div class="collapse navbar-collapse " id="myNavbar">
			      <ul class="nav navbar-nav">
			        <li class="active">
			        	<?php echo $this->Html->link('Trang chủ','/') ?>
			        </li>			   
			        <li><?php echo $this->Html->link('Sách mới','/sach-moi') ?></li>
			        <li><?php echo $this->Html->link('Liên hệ','/lien-he')?></li>
			      </ul>
			      <?php echo $this->Form->create('Book',array('action'=>'get_keyword',/*'novalidate'=>true,*/'class'=>'navbar-form navbar-left','role'=>"search",'controller'=>'Books','action'=>'get_keyword')); ?>
			      <div class="form-group">
			      <?php echo $this->Form->input('keyword',array('error'=>false,'label'=>'','placeholder'=>"Nhập tên sách muốn tìm",'type'=>'text','class'=>'form-control','size'=>45)) ?>
			      </div>
			      <?php echo $this->Form->button('Seach',array('class'=>'btn btn-default','type'=>'submit')); ?>
			      <?php echo $this->Form->end(); ?>
			      <?php if(!$this->Session->check('info_user')): ?>
			      <ul class="nav navbar-nav navbar-right">
			        <li><?php echo $this->Html->link('SignUp','/register',array('class'=>'glyphicon glyphicon-user')) ?></li>
			        <li><?php echo $this->Html->link('Login','/login',array('class'=>'glyphicon glyphicon-log-in')) ?></li>
			        			        
			      </ul>
			  <?php else: ?>
			  	<ul class="nav navbar-nav navbar-right">
			        <li><?php echo $this->Html->link('LogOut','/logout',array('class'=>'glyphicon glyphicon-off')) ?></li>			        
			      </ul>
			  <?php endif; ?>
			    </div>
			  </div>
			</nav>