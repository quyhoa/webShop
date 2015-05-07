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

	<!-- jQuery library -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js1"></script> -->

	<!-- Latest compiled JavaScript -->
	<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
	

	<?php
		echo $this->Html->meta('icon');



		//echo $this->Html->css('cake.generic');\
		echo $this->Html->css('bootstrap');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-theme.min');
	?>
</head>
<body>
	<div class="container" id="services">

		<!-- MENU HEADER -->
		<?php echo $this->element('menu_header') ?>
		<?php echo $this->fetch('content'); ?>
		<?php //echo $this->element('infocart') ?>
		<!-- <div id="left_container" class="col col-md-3 col-sm-12">
					
		</div>		

		<div id="right_container" class="col col-md-9 col-sm-12">

			<?php //echo $this->Session->flash(); ?>
			<?php //echo $this->fetch('content'); ?>
		</div> -->
		<div id="footer">
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
