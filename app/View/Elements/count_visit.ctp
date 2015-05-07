
<nav>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
	  THỐNG KÊ TRUY CẬP
	  </div>
	  <div class="panel-body">
	   <?php echo $this->Html->image('leoz.gif'); ?> <?php echo $this->Html->image('leoz.gif'); ?><br>
	  	<?php if ($this->Session->check('isOnline')) {
	  		echo "<strong>Số người đang Online : ".$this->Session->read('isOnline')."</strong>";
	  	} ?>
	  	<br>
	  	<?php if ($this->Session->check('visit')) {
	  		echo "<strong>Lượt người truy cập : ".$this->Session->read('visit')."</strong>";
	  	} ?>
	  </div>	 
	</div>
</nav>