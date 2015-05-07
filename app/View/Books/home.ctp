  <div class="row">
    <nav>
      <div class="panel panel-primary">

        <div class="panel-heading">
        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
        <strong> Sách mới phát hành</strong>
        </div>
        
        <div class="panel-body">

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    
    <div class="item active">
      <?php foreach ($act as $book):?>
          <div class="col-sm-4 col-md-3">
                            <div class="thumbnail">
                            
                              <?php if(!empty($book['Book']['amount_view'])): ?>
                                <span class='view'>
                                Tổng lượt xem là <?php echo $book['Book']['amount_view'] ?>
                                </span>
                              <?php endif; ?>
                            
                              <div class="div-anh1">
                                <?php echo $this->Html->link(
                              $this->Html->image($book['Book']['image'],array('class'=>'img-responsive','alt'=>$book['Book']['slug'])),'/'.$book['Book']['slug'],array('escape'=>false)); ?>
                              </div>
                              <div class="caption">
                                <center>Giá: <?php echo $this->Number->currency($book['Book']['price'],' VND',
    array('places'=>0,'wholePosition'=>'after')) ?>
    <?php echo $this->Form->postLink('<i class="glyphicon glyphicon-shopping-cart">
        </i>Thêm giỏ hàng','/books/add_to_cart/'.$book['Book']['id'],array('class'=>'btn btn-success','escape'=>false)) ?></center>
                              </div>
                            </div>
        </div>
      <?php endforeach; ?>
    </div>

    <?php foreach ($l_book as $books):?>
      <div class="item">
      <?php foreach($books as $book): ?>
        <div class="col-sm-4 col-md-3">
                            <div class="thumbnail">
                            
                              <?php if(!empty($book['Book']['amount_view'])): ?>
                                <span class='view'>
                                Tổng lượt xem là <?php echo $book['Book']['amount_view'] ?>
                                </span>
                              <?php endif; ?>
                            
                              <div class="div-anh1">
                                <?php echo $this->Html->link(
                              $this->Html->image($book['Book']['image'],array('class'=>'img-responsive','alt'=>$book['Book']['slug'])),'/'.$book['Book']['slug'],array('escape'=>false)); ?>
                              </div>
                              <div class="caption">
                                <center>Giá: <?php echo $this->Number->currency($book['Book']['price'],' VND',
    array('places'=>0,'wholePosition'=>'after')) ?>
    <?php echo $this->Form->postLink('<i class="glyphicon glyphicon-shopping-cart">
        </i>Thêm giỏ hàng','/books/add_to_cart/'.$book['Book']['id'],array('class'=>'btn btn-success','escape'=>false)) ?></center>
                              </div>
                            </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
    <!-- test -->

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>
      </div>
    </nav>
</div>



<?php foreach($cate as $books): ?>
  <?php if(!empty($books['Book'])): ?>
  <div class="row">
    <nav>
      <div class="panel panel-primary">

        <div class="panel-heading">
        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
        <strong> Sách thuộc chuyên mục <?php echo $books['Category']['name']; ?> mới nhất</strong>
        </div>
        
        <div class="panel-body">
          <?php foreach($books['Book'] as $book): ?>
                          <div class="col-sm-4 col-md-3">
                            <div class="thumbnail">
                            
                              <?php if(!empty($book['amount_view'])): ?>
                                <span class='view'>
                                Tổng lượt xem là <?php echo $book['amount_view'] ?>
                                </span>
                              <?php endif; ?>
                            
                              <?php echo $this->Html->link(
                              $this->Html->image($book['image'],array('class'=>'img-responsive','alt'=>$book['slug'])),'/'.$book['slug'],array('escape'=>false)/*,array('width'=>'150','height'=>'150px')*/); ?>
                              <div class="caption">                                
                                <!-- Hiển thị tác giả -->
                               
                                <center>Giá: <?php echo $this->Number->currency($book['price'],' VND',
    array('places'=>0,'wholePosition'=>'after')) ?>
    <?php echo $this->Form->postLink('<i class="glyphicon glyphicon-shopping-cart">
        </i>Insert giỏ hàng','/books/add_to_cart/'.$book['id'],array('class'=>'btn btn-success','escape'=>false)) ?></center>
                              </div>
                            </div>
                          </div><?php endforeach;?>
        </div> 
        <div class="panel-body"><?php echo $this->Html->link('Xem thêm ','/danh-muc/'.$books['Category']['slug'],array('class'=>'btn btn-default')); ?></div>      
      </div>

    </nav>  

</div>
<?php endif; ?>
<?php endforeach; ?>

<style type="text/css">
  .writer{ width: 100%;height: 20px;
  }
  .xemthem{}
  .view{position: absolute;width: 172px;height: 30px;background-color: WhiteSmoke;border-radius: 3px;box-shadow: ;padding-left: 10px;left: 16px;top: 0px;box-shadow: 3px 3px 3px #888888;padding: 5px 10px;}
</style>
<script type="text/javascript">
  $('#myCollapsible').on('hidden.bs.collapse', function () {
  // do something…
})
</script>