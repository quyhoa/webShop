<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">THÔNG TIN CHI TIẾT SÁCH TRAO ĐỔI</h3>
      </div>
      
      <div class="panel-body">
      <?php echo $this->Session->flash('vote'); ?>
      
      <div class="row">
      	<div class="col-sm-3 col-md-3">
      		 <div class="panel panel-default">
			  <div class="panel-body">
			    <?php echo $this->Html->image($detail['Detail']['image']); ?>
			  </div>
			</div>
      	</div>
      	<div class="col-sm-9 col-md-9">
      		<div class="list-group">
		      <a  class="list-group-item">
		        Tên sách : <?php echo $detail['Detail']['title']; ?>
		      </a>
		      <a class="list-group-item">Người đăng: <?php echo $detail['User']['name'] ?></a>
		      <a class="list-group-item">Ngày đăng: <?php echo $detail['Detail']['created'] ?></a>
		      <a class="list-group-item">Tình trạng: 
		      	<?php if($detail['Detail']['status']==1): ?>
              Đã được trao đổi
            <?php else: ?>
              Đang chờ trao đổi
              <?php endif; ?>
		      </a>
		    </div>
      	</div>
      </div> 
      <!-- hien thi comment -->  
      <div class='row'>
        <div class="panel-body">
        <h3>Mô tả nội dung</h3>
        <?php echo $detail['Detail']['descriptions'] ?>
        </div>
      </div>
      </div>
  </div>

  <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">VỊ TRÍ TRÊN BẢN ĐỒ</h3>
      </div>
      
      <div class="panel-body">
      <?php echo $this->element('map',array('address'=>$detail['User']['address'])); ?>
      </div>
  </div>
  