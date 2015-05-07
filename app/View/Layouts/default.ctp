<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription ?>
		<?php //echo $this->fetch('title'); ?>
		<?php echo $title_for_layout; ?>
	</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<?php
		echo $this->Html->meta('icon');



		//echo $this->Html->css('cake.generic');\
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('jquery-ui.min');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('test');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
	<?php echo $this->Html->script('jquery-1.11.1.min'); ?>
	<?php echo $this->Html->script('bootstrap.min'); ?>
	<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
	<?php echo $this->Html->script('default'); ?>
</head>
<body>
	<div class="container" id="services">
		<?php echo $this->element('menu_header') ?>
			<div class="col col-sm-3 col-sm-4">
						<!-- show info gio nguoi dung -->
					<?php echo $this->element('info_user') ?>
					<!-- show info gio hang element -->
					<?php echo $this->element('cart') ?>
					<!-- show categories -->
					<?php echo $this->element('menu') ?>
					<?php echo $this->element('book_change') ?>
					<?php echo $this->element('count_visit'); ?>
					<center>
						<div>
							<?php echo $this->Html->image('facebook.png') ?>
							<?php echo $this->Html->image('twitter.png') ?>
							<?php echo $this->Html->image('rss.png') ?>
						</div>
					</center>
					<!-- end show -->
					 <!-- nav -->
			</div>		

			<div id="right_container" class="col col-md-9 col-sm-8">

			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
			</div>
		<div id="footer">
		<?php //echo $this->element('map',array('address'=>'459 ton duc thang')); ?>
			<?php /*echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);*/
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
