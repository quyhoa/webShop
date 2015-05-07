

<!-- <div class="fb-comments" data-href="http://localhost:9999/web/" data-colorscheme="light" 
   data-numposts="5" data-width="500">
</div> -->

<div class="row">
  <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Thông tin chi tiết</h3>
      </div>
      
      <div class="panel-body">
      <?php echo $this->Session->flash('vote'); ?>
      <div class='row'>
        <div class="panel-body">
          <div class='col-md-4'>Theo bạn quyển sách này là :</div>
          <div class='col-md-3'>
          <?php echo $this->Form->create('Book',array('action'=>'vote')); ?>
          <?php echo $this->Form->input('id',array('label'=>false/*,'hidden'=>true*/,'value'=>$books['Book']['id'])); ?>
          <?php $options = array('1' => ' Tốt','2' => 'Không tốt');
          $attributes = array(
              'legend' => false,
              'value' => true,
              'checked'=> (2=='Không tốt') ? true : false,
              //'checked'=> ($foo == "pro") ? FALSE : TRUE,
          );
          echo $this->Form->radio('type',$options, $attributes); ?>
          </div>
          <div class='col-md-5'>
          <?php echo $this->Form->button('Gửi đánh giá của tôi đến quyển sách này',array('class'=>'btn btn-success','type'=>'submit')); ?>
          <?php echo $this->Form->end(); ?>
          </div>
        </div>
      </div>
      <div>
      <?php echo $this->Html->image('leoz.gif'); ?><?php echo $this->Html->image('leoz.gif'); ?><?php echo $this->Html->image('leoz.gif'); ?> Gửi nhận xét nhanh...Yahoooooooooooooo...:))</div>
      <div class="row">
        <div class="col-sm-3 col-md-3">
           <div class="panel panel-default">
        <div class="panel-body">
          <?php echo $this->Html->image($books['Book']['image']); ?>
        </div>
      </div>
        </div>
        <div class="col-sm-9 col-md-9">
          <div class="list-group">
          <a  class="list-group-item">
            Tên sách : <?php echo $books['Book']['title']; ?>
          </a>
          <a class="list-group-item">Giá : <?php echo $this->Number->currency($books['Book']['price'],' VND',
    array('places'=>0,'wholePosition'=>'after')) ?></a>
          <a class="list-group-item">Số trang: <?php echo $books['Book']['pages'] ?></a>
          <a class="list-group-item">Ngày đăng: <?php echo $books['Book']['created'] ?></a>
          <a class="list-group-item">Tác giả: 
            <?php foreach($books['Writer'] as $writer): ?>
              <?php echo $writer['name'] ?>
            <?php endforeach; ?>
          </a>
          <a class="list-group-item">Số lượng xem: <?php echo $books['Book']['amount_view'] ?></a>
        </div>
        </div>
      </div> 
      <div class="row">
        <div class="panel-body">
          <?php echo $this->Form->postLink('<i class="glyphicon glyphicon-shopping-cart">
        </i>Thêm giỏ hàng','/books/add_to_cart/'.$books['Book']['id'],array('class'=>'btn btn-success ','escape'=>false)) ?>

        </div>
      </div>
      <!-- hien thi comment -->  
      <div class='row'>
          <div class="panel-body">
          <div id="description" class="btn btn-success">Xem mô tả nội dung</div>
          <?php //echo $book['Book']['descriptions'] ?>
          <?php if (!empty($books['Book']['descriptions'])): ?>
            <div class="content_des"><?php echo $books['Book']['descriptions'] ?></div>
          <?php endif ?>
          </div>
          <div class="panel-body">
          <?php echo $this->element('comment_face'); ?>
          </div>
        </div>
      </div>
  </div>
  <!-- sach lien quan -->

</div>
<?php echo $this->element('books',array('books'=>$related_books,'titles'=>'Sách cùng chuyên mục')) ?>