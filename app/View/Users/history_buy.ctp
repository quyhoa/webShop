
<div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">LỊCH SỮ MUA HÀNG</h3>
      </div>
      
      <div class="panel-body">
      <?php foreach($info_users as $info_user): ?>
        <table class="table">
      <tbody>
        <tr>
          <td>Tên khách hàng</td>
          <td><?php echo $info_user['User']['name']; ?></td>
        </tr>
        <tr>
          <td>Địa chỉ</td>
          <td><?php echo $info_user['User']['address']; ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo $info_user['User']['email']; ?></td>
        </tr>
        <tr>
          <td>Số điện thoại</td>
          <td><?php echo $info_user['User']['phone_number']; ?></td>
        </tr>
      </tbody>
    </table>
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
        <?php $i=1; foreach($info_user['Order'] as $order): ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $this->Html->link($order['id'],array('controller'=>'Orders','action'=>'view',$order['id'])); ?></td>
          <td><?php echo $order['created']; ?></td>
          <td>
            <?php if(empty($order['status'])): ?>
              <div class="btn btn-warning"><?php echo 'Chờ xử lí'?></div>
            <?php else: ?>
              <div class="btn btn-success"><?php echo 'Đã xử lí'?></div>
            <?php endif; ?>
          </td>
          <td>
            <div class="btn btn-success"><?php echo h($this->Number->currency($order['total'], ' VND', array('places' => 0, 'wholePosition' => 'after'))); ?></div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endforeach; ?>
       
    </div>
      
</div>