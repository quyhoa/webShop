
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
      <div class="col-sm-4 col-md-3">
                            <div class="thumbnail">
                            
                              <?php if(!empty($books['Book']['amount_view'])): ?>
                                <span class='view'>
                                Tổng lượt xem là <?php echo $books['Book']['amount_view'] ?>
                                </span>
                              <?php endif; ?>
                            
                              <div class="div-anh1">
                                <?php echo $this->Html->link(
                              $this->Html->image($books['Book']['image'],array('class'=>'img-responsive','alt'=>$books['Book']['slug'])),'/'.$books['Book']['slug'],array('escape'=>false)); ?>
                              </div>
                              <div class="caption">
                                <center>Giá: <?php echo $this->Number->currency($books['Book']['price'],' VND',
    array('places'=>0,'wholePosition'=>'after')) ?>
    <?php echo $this->Form->postLink('<i class="glyphicon glyphicon-shopping-cart">
        </i>Thêm giỏ hàng','/books/add_to_cart/'.$books['Book']['id'],array('class'=>'btn btn-success','escape'=>false)) ?></center>
                              </div>
                            </div>
        </div>
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
<script type="text/javascript">
  $('#myCollapsible').on('hidden.bs.collapse', function () {
  // do something…
})
</script>
