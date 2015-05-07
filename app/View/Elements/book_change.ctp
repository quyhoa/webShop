<?php $book_change = $this->requestAction('/details/book_change') ?>
<?php //debug($book_change); ?>
<nav>
	<div class="panel panel-primary">

	  <div class="panel-heading">
	  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
	  <?php echo $this->Html->link('SÁCH TRAO ĐỔI','/book_change',array('class'=>'div-title')); ?>
	  </div>
	  <div class="panel-body">
	  <ul>
	  <?php foreach($book_change as $change): ?>
	  		<li><?php echo $this->Html->link($change['Detail']['title'],array('controller'=>'details','action'=>'view',$change['Detail']['id']));; ?></li>
		<?php endforeach; ?>
		</ul>
		
	  </div>
	</div>
</nav>
<style type="text/css">
	.div-title{color: white}
	.div-title:hover{color: yellow}
</style>