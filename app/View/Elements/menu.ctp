<!-- show categories -->

<?php $categories = $this->requestAction('/categories/menu') ?>
<nav>
	<div class="panel panel-primary">

	  <div class="panel-heading"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
	  DANH MỤC SÁCH
	  </div>
	  <div class="panel-body">
	    <ul class="nav">
		<?php foreach($categories as $category):?>
		    <li class="panel panel-primary"><?php echo $this->Html->link($category['Category']['name'],'/danh-muc/'.$category['Category']['slug'])?></li>
		<?php endforeach;?>
		</ul>
	  </div>
	</div>
</nav>