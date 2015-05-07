<?php //debug($order); ?>
<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Thông tin hóa đơn</h3>
      </div>
      
      <div class="panel-body">
      <?php foreach($order as $od): ?>
        <table class="table">
	    <tbody>
	      <tr>
	      	<td>Mã hóa đơn</td>
	      	<td><?php echo $od['Order']['id']; ?></td>
	      </tr>
	      <tr>
	      	<td>Ngày đặt hàng</td>
	      	<td><?php echo $od['Order']['created']; ?></td>
	      </tr>
	      <tr>
	      	<td>Ngày thanh toán</td>
	      	<td><?php echo $od['Order']['modified']; ?></td>
	      </tr>
	    </tbody>
	  </table>
	  <div><h3>Chi tiết hóa đơn</h3></div>

	  <table class="table">
	    <tbody>
	      <tr>
	      	<th>STT</th>
	      	<th>Tên sản phẩm</th>
	      	<th>Giá</th>
	      	<th>Số lượng</t>
	      	<th>Tổng tiền</td>
	      </tr>
	      <?php $i=1; foreach($od['Book'] as $ods): ?>
	      <tr>
	      	<td><?php echo $i++; ?></td>
	      	<td><?php echo $ods['title']; ?></td>
	      	<td><?php echo $ods['price']; ?></td>
	      	<td><?php echo $ods['BooksOrder']['sales']; ?></td>
	      	<td><?php 
	      		if( $ods['BooksOrder']['sales'] <= 0){
	      			$sl = 1;
	      		}else{
	      			$sl = $ods['BooksOrder']['sales'];
	      		}
	      		$tol = $ods['price'] * $sl;
	      		echo $tol;
	      	 ?></td>
	      </tr>
	      <?php endforeach; ?>
	    </tbody>

	  </table>
	  TỔNG TIỀN CỦA HÓA ĐƠN NÀY LÀ <div class="btn btn-success"><?php echo h($this->Number->currency($od['Order']['total'], ' VND', array('places' => 0, 'wholePosition' => 'after'))); ?></div>
	<?php endforeach; ?>
       
    </div>
      
</div>