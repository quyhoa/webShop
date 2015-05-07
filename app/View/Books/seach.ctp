<?php if(isset($errors)): ?>
	<?php foreach($errors as $error): ?>
		<h3><?php echo $error[0] ?></h3>
	<?php endforeach; ?>
<?php endif; ?>
<p>
	<?php if(isset($result) && $notfound): ?>
		<!-- hien thi sach tim duoc -->	
				  <div class="row">
				    <nav>
				      <div class="panel panel-primary">
				        <div class="panel-heading">
				        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
				        <strong><?php echo 'Tìm kiếm sách' ?></strong>
				        </div>
				        <h4>Kết quả tìm kiếm của từ khóa: "<strong><?php echo $keyword ?></strong>"</h4><br>
				        <div class="panel-body">
				          <?php foreach($result as $book): ?>
				                          <div class="col-sm-4 col-md-3">
				                            <div class="thumbnail">
				                            <?php //echo $this->Html->image($book['Book']['image']); ?>
				                              <?php echo $this->Html->link(
				                              $this->Html->image($book['Book']['image']/*,array('alt'=>$book['Book']['slug'],'width'=>150,'height'=>150)*/),'/'.$book['Book']['slug'],array('escape'=>false)); ?>                              
				                              <div class="caption">        
				                               
				                                <p>Giá: <?php echo $this->Number->currency($book['Book']['price'],' VND',
				    array('places'=>0,'wholePosition'=>'after')) ?></p>
				    <?php echo $this->Form->postLink('<i class="glyphicon glyphicon-shopping-cart">
				        </i>Add Cart','/books/add_to_cart/'.$book['Book']['id'],array('class'=>'btn btn-primary','escape'=>false)) ?>
				                              </div>
				                            </div>
				                          </div><?php endforeach;?>
				        </div>
				      </div>
				    </nav>                         
				</div>
		<?php echo $this->element('paginate',array('object'=>'quyển sách')) ?>
	<?php elseif($notfound == false): ?>
		<div class="row">
				    <nav>
				      <div class="panel panel-primary">
				        <div class="panel-heading">
				        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
				        <strong><?php echo 'Tìm kiếm sách' ?></strong>
				        </div>				        
				        <div class="panel-body">
				          <h3>Không tìm thấy quyển sách nào</h3>
				        </div>
				      </div>
				    </nav>                         
				</div>
	<?php endif; ?>

</p>