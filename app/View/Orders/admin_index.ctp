
<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Thống kê sản phẩm</h3>
      </div>
      <div class="panel-body">
      	<?php /*echo $this->Form->postLink('<i class="glyphicon glyphicon-shopping-cart">
        </i>Add Cart','/books/add_to_cart/'.$book['Book']['id'],array('class'=>'btn btn-primary','escape'=>false))*/ ?>
        <div class="row">
        <!-- Theo ngày -->
          <div class="col-md-12">
          <?php echo $this->Form->create('Order',array('action'=>'index','inputDefaults'=>array('label'=>false))) ?>
            <div class="col-md-5">
              <table class="table">
              <tr>
                <th>Bắt đầu từ ngày </th>
                <td><?php echo $this->Form->input('begin',array('type'=>'text','placeholder'=>'Chọn ngày muốn thống kê','class'=>'datepicker')); ?></td>
              </tr>
              <tr>
                <th>Đến ngày</th>
                <td><?php echo $this->Form->input('end',array('type'=>'text','placeholder'=>'Chọn ngày muốn thống kê','class'=>'datepicker')); ?></td>
              </tr>
              <tr>
                <td></td>
                <td><?php echo $this->Form->button('Xem thống kê',array('class'=>'btn btn-info')); ?></td>
              </tr>
            </table>
            </div>              
            <?php echo $this->Form->end(); ?>
            <div class="col-md-7">
            <?php if(!empty($total_day)): ?>
              <h3>Tổng doanh thu</h3>
            <p class="btn btn-success"><?php echo h($this->Number->currency($total_day, ' VND', array('places' => 0, 'wholePosition' => 'after'))); ?></p>
            <?php endif; ?>
          </div>          
          </div>
          <div class="panel-body">
            <?php echo $this->Html->link('Thống kê của năm',array('controller'=>'orders','action'=>'statical'),array('class'=>'btn btn-success')); ?>
          </div>
          <?php if(!empty($orders)): ?>
          <div class="col-md-12">
            <div><h3>Chi tiết hóa đơn</h3></div>

              <table class="table">
                <tbody>
                  <tr>
                    <th>STT</th>
                    <th>Mã hóa đơn</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</t>
                    <th>Tổng</td>
                  </tr>
                  <?php $i=1; foreach($orders as $order): ?>

                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $this->Html->link($order['Order']['id'],array('controller'=>'Orders','action'=>'view',$order['Order']['id'])); ?></td>
                    <td><?php echo $order['Order']['created']; ?></td>
                    <td>
                      <?php if(empty($order['Order']['status'])): ?>
                        <div class="btn btn-warning"><?php echo 'Chờ xử lí'?></div>
                      <?php else: ?>
                        <div class="btn btn-success"><?php echo 'Đã xử lí'?></div>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="btn btn-success"><?php echo h($this->Number->currency($order['Order']['total'], ' VND', array('places' => 0, 'wholePosition' => 'after'))); ?></div>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
          </div>
        <?php else: ?>
          <div class="panel-body">
            <h4>Không có hóa đơn nào, Vui lòng chọn ngày khác</h4>
          </div>
        <?php endif; ?>
        </div>
           
      </div>
</div>
