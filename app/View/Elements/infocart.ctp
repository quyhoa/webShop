<nav>
	<div class="panel panel-primary">

	  <div class="panel-heading"><h4><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
	  Thông tin giỏ hàng của bạn</h4>
	  </div>
	  <div class="panel-body">
	    <!-- Show thong tin gio hàng -->
	    <table class="table table-striped">
		    <thead>
		      <tr>
		        <th>STT</th>
		        <th>Tên sách</th>
		        <th>Số lượng</th>
		        <th>Giá</th>
		        <th>Xóa</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php 
		    	$i = 0;
		    	foreach($carts as $cart): 
		    	$i += 1;
		    ?>
		      <tr>
		        <td><?php echo $i; ?></td>
		        <td><?php echo $cart['title'] ?></td>
		        <td class="row">
		        <?php //echo $cart['quantity'] ?>
		        <?php echo $this->Form->create('Book',array('class'=>'form-inline')); ?>
		        <?php echo $this->Form->input('quantity',array('label'=>false,'div'=>false,'type'=>'text','value'=>$cart['quantity'])) ?>
		        <?php echo $this->Form->button('cập nhật',array('class'=>'btn btn-link')); ?>
		        <?php echo $this->Form->end(); ?>
		        </td>
		        <td><?php echo $cart['saleprice'] ?></td>
		        <td><?php echo $this->Html->link('Delete','#') ?></td>
		      </tr>
		     <?php endforeach; ?>
		     <tr>
		     	<td colspan="3"><h4>Tổng cộng:</h4></td>
		     	<td colspan="2"><strong><?php echo $this->Number->currency($total,' VND',
    array('places'=>0,'wholePosition'=>'after')) ?></strong>
    			</td>
		     </tr>
		    </tbody>
		  </table>
</nav>
