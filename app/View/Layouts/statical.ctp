<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title; ?>
	</title>
	
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->css('jquery-ui.min');
	?>
	<?php echo $this->Html->script('jquery-1.11.1.min'); ?>
	<?php echo $this->Html->script('jquery-ui.min'); ?>
	<?php echo $this->Html->script('admin'); ?>
	
	<?php echo $this->Html->script('ckeditor/ckeditor');; ?>
	
</head>
<body>
	<div class="container-fluid" id="services">
	<?php echo $this->fetch('content'); ?>
	<!-- menu header -->
	<?php //debug($user_info) ?>
		<?php //echo $this->element('header') ?>
		<!-- <div class="row">
			<div class="col-sm-3 col-md-3">
				<?php //echo $this->element('menu_left'); ?>
			</div>
			<div class="col-sm-9 col-md-9">
				<?php //debug($_SERVER['REQUEST_URI']); ?>
				<?php //debug($_SERVER['REMOTE_ADDR']); ?>
				<?php //debug($_SERVER); ?>
				<?php //echo $this->Session->flash(); ?>
				<?php //echo $this->fetch('content'); ?>
			</div>
			
		</div>
		<div id="footer">
			
		</div> -->
	</div>
	<?php echo $this->element('sql_dump'); ?>

</body>
</html>
