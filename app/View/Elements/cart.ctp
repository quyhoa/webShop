<nav>
	<div class="panel panel-primary">

	  <div class="panel-heading">
	  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
	  Giỏ hàng
	  </div>
	  <div class="panel-body">

  		<?php echo $this->Session->flash('cart') ?>
		  <!-- 
		  Kiem tra su ton tai cua gio hang
		   -->
		   <?php if($this->Session->check('cart')): ?>
		   		<?php $carts = $this->Session->read('cart');?>

		   		<?php $i = 0; ?>	
			   	<?php foreach($carts as $cart): ?>
			   		<?php $i += 1; ?>
			   		<?php echo $i.'.'.$this->html->link($cart['title'],'/'.$cart['slug']).'('.$this->Number->currency($cart['price'],' VND',
	    array('places'=>0,'wholePosition'=>'after')).')' ?><br>
			   		<?php endforeach; ?>	   	
		    <?php else: ?>
			   		<?php echo 'Chưa có sản phẩm nào!' ?><br>
		   	<?php endif; ?>
		   	
		   	<?php $total = $this->Session->read('total');?>

		   	<!-- test button -->
		   	<span class='glyphicon glyphicon-pencil'></span>Tổng tiền : 
		   		<?php echo $this->Number->currency($total,' VND',
	    array('places'=>0,'wholePosition'=>'after'))//$total; ?><br>
		   	<p><?php echo $this->Html->link('Xem/cập nhật giỏ hàng',array('controller'=>'books','action'=>'view_cart'),array('class'=>'btn btn-primary btn-block')); ?></p>
	  </div>
	</div>
</nav>