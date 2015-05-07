  <?php //pr($books) 
  //pr($this->Session->read('cart'));
  ?>
  <div class="row">
    <nav>
      <div class="panel panel-primary">

        <div class="panel-heading">
        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
        <strong><?php echo $titles ?></strong>
        </div>
        
        <div class="panel-body">
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
                                <!-- Hiển thị tác giả -->
                               <!--  <div class="writer">
                                    <?php //pr($book['Writer']) ?>
                                  <?php //if(!empty($book['Writer'])): ?>
                                  <?php //foreach ($book['Writer'] as $writer): ?>

                                    <?php //echo $this->Html->link($writer['name'],'/tac-gia/'.$writer['slug']) ?>
                                  <?php //endforeach; ?>
                                  <?php //endif; ?>
                                </div> -->
                                <center>Giá: <?php echo $this->Number->currency($book['Book']['price'],' VND',
    array('places'=>0,'wholePosition'=>'after')) ?>
    <?php echo $this->Form->postLink('<i class="glyphicon glyphicon-shopping-cart">
        </i>Thêm giỏ hàng','/books/add_to_cart/'.$book['Book']['id'],array('class'=>'btn btn-success','escape'=>false)) ?></center>
                              </div>
                            </div>
                          </div><?php endforeach;?>
        </div>        
      </div>
    </nav>                         
</div>
<style type="text/css">
  .writer{ width: 100%;height: 20px;
  }
  .view{position: absolute;width: 172px;height: 30px;background-color: WhiteSmoke;border-radius: 3px;box-shadow: ;padding-left: 10px;left: 16px;top: 0px;box-shadow: 3px 3px 3px #888888;padding: 5px 10px;}
  .div-anh{
    width: 135px;height: 200px;border: 1px drash red;
  }
</style>