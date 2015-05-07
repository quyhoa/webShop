<?php if($this->Session->check('info_user')): ?>
	<?php $info_user = $this->Session->read('info_user'); ?>
<?php endif; ?>
<?php if(!empty($carts)): ?>
<nav>
	<div class="panel panel-primary">

	  <div class="panel-heading"><h4><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
	  Thông tin giỏ hàng của bạn</h4>
	  </div>
	  <div class="panel-body">
	  <?php echo $this->Form->postLink('Hủy giỏ hàng','/books/empty_cart',array('class'=>'btn btn-success')) ?>
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
		        <?php echo $this->Form->create('Book',array('class'=>'form-inline','url'=>array('controller'=>'Books','action'=>'update_cart'))); ?>
		        <?php echo $this->Form->input('id',array('label'=>false,'div'=>false,'type'=>'text','value'=>$cart['id'],'size'=>3,'hidden'=>true)) ?>
		        <?php echo $this->Form->input('quantity',array('label'=>false,'div'=>false,'type'=>'text','value'=>$cart['quantity'],'size'=>3)) ?>
		        <?php echo $this->Form->button('cập nhật',array('class'=>'btn btn-link')); ?>
		        <?php echo $this->Form->end(); ?>
		        </td>
		        <td><?php echo $cart['saleprice'] ?></td>
		        <td><?php echo $this->Form->postLink('Xóa','/books/remove/'.$cart['id']) ?></td>
		      </tr>
		     <?php endforeach; ?>
		     <tr>
		     	<td colspan="3"><h4>Tổng tiền thanh toán:</h4></td>
		     	<td colspan="2"><strong><?php echo $this->Number->currency($total,' VND',
    array('places'=>0,'wholePosition'=>'after')) ?></strong>
    			</td>
		     </tr>
		    </tbody>
		  </table>
	
</nav>
<div class='row'>
	<div class="col col-md-4 col-sm-12">
	<!-- Thông tin feelback -->
			<div class="panel panel-primary">

			  <div class="panel-heading"><h4><span class="glyphicon glyphicon-book" aria-hidden="true"></span>
			  Sách nổi bật</h4>
			  </div>
			  <div class="panel-body">
			  <?php foreach($book_hot as $book): ?>
			   <div class="row">
			   		 <div class='col-md-6'>			    	
			    		<div class="thumbnail">
                            <?php //echo $this->Html->image($book['Book']['image']); ?>
                              <?php echo $this->Html->link(
                              $this->Html->image($book['Book']['image']/*,array('alt'=>$book['Book']['slug'],'width'=>150,'height'=>150)*/),'/'.$book['Book']['slug'],array('escape'=>false)); ?>                              
                              <div class="caption">        
                               
                                <p>Giá: <?php echo $this->Number->currency($book['Book']['price'],' VND',
    array('places'=>0,'wholePosition'=>'after')) ?></p>
    
                              </div>
                            </div>
			    	
			    </div>
			    <div class='col-md-6'>
			    	<?php echo $this->Html->link($book['Book']['title'],'/'.$book['Book']['slug']); ?><br>
			    	Giá: <?php echo $this->Number->currency($book['Book']['price'],' VND',
    array('places'=>0,'wholePosition'=>'after')) ?><br>
    Tổng lượt xem : <?php echo $book['Book']['amount_view'] ?>
    <div class='span-cart'><br>
			    		<?php echo $this->Form->postLink('<i class="glyphicon glyphicon-shopping-cart">
        </i> Thêm vào giỏ','/books/add_to_cart/'.$book['Book']['id'],array('class'=>'btn btn-success','escape'=>false)) ?>
			    	</div>
			    </div>
			   </div>
			    <?php endforeach; ?>
			  </div>
			</div>
	</div>

	<div id="left_container" class="col col-md-8 col-sm-12">
	<!-- Thông tin đặt hàng -->
			<div class="panel panel-primary">

			  <div class="panel-heading"><h4><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
			  Xác nhận thông tin giao hàng</h4>
			  </div>
			  <div class="panel-body">
			  	<?php if(empty($info_user)): ?>
			  		<div class="alert alert-warning">
			  			Bạn chưa đăng nhập. Hãy đăng nhập, nếu bạn chưa đăng kí hãy đăng kí để thực hiện chức năng thanh toán.
			  		</div>
			  	<?php endif; ?>
			    <!-- Show thong tin đăt hàng -->
					<?php echo $this->Form->create('User',array('role'=>"form",'class'=>'form-horizontal','action'=>'checkout','controller'=>'books','inputDefaults'=>array('label'=>false))); ?>
					<?php if(!empty($info_user)): ?>
					<?php foreach($info_user as $info_user): ?>
						<fieldset>
						<?php
						echo $this->Form->input('id',array('value'=>$info_user['User']['id']));
							echo 'Tên khách hàng';
							echo $this->Form->input('fullname ',array('class'=>'form-control','placeholder'=>"Tên khách hàng",'value'=>$info_user['User']['name']));
							?>
							<?php echo 'Email '; ?>
							<?php echo $this->Form->input('email',array('class'=>'form-control','placeholder'=>"Enter email",'value'=>$info_user['User']['email'])) ?>
							<?php
							echo 'Địa chỉ giao hàng ';
							echo $this->Form->input('address',array('class'=>'form-control','placeholder'=>"Địa chỉ giao hàng",'value'=>$info_user['User']['address']));
							echo 'Số điện thoại';
							echo $this->Form->input('phone_number',array('class'=>'form-control','placeholder'=>"Vui lòng nhập số điện thoại",'value'=>$info_user['User']['phone_number']));
						?>
						<br>
						<?php echo $this->Form->button('Thanh toán',array('class'=>'btn btn-success')); ?>
						</fieldset>
					<?php endforeach; ?>
				<?php else: ?>
					
						<fieldset>
						<?php
							echo $this->Form->input('id');
							echo 'Tên khách hàng';
							echo $this->Form->input('fullname ',array('class'=>'form-control','placeholder'=>"Tên khách hàng"));
							?>
							<?php echo 'Email '; ?>
							<?php echo $this->Form->input('Email',array('class'=>'form-control','placeholder'=>"Enter email")) ?>
							<?php
							echo 'Địa chỉ giao hàng ';
							echo $this->Form->input('address',array('class'=>'form-control','placeholder'=>"Địa chỉ giao hàng"));
							echo 'Số điện thoại';
							echo $this->Form->input('phone_number',array('class'=>'form-control','placeholder'=>"Enter email"));
						?>
						<br>
						<?php echo $this->Form->button('Thanh toán',array('class'=>'btn btn-success')); ?>
						</fieldset>
					
				<?php endif; ?>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>

			<!-- hien vi tri tren ban do -->
			<?php if(!empty($info_user)): ?>
				<div class="panel panel-primary">
			      <div class="panel-heading">
			        <h3 class="panel-title">VỊ TRÍ TRÊN BẢN ĐỒ</h3>
			      </div>
			      
			      <div class="panel-body">
			      <?php echo $this->element('map',array('address'=>$info_user['User']['address'])); ?>
			      </div>
			    </div>
			<?php endif; ?>
</div>

<?php else: ?>
	<?php echo 'Bạn chưa có sản phẩm nào nhấn '.$this->Html->link('quay lại','/').' để thực hiện việc mua hàng'; ?>
<?php endif; ?>
