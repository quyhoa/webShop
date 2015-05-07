<?php //debug($data); ?>
<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Thống kê của năm</h3>
      </div>
      <div class="panel-body">
            <div>
                <?php echo $this->Form->create('Order',array('action'=>'statical','class'=>'navbar-form navbar-left','role'=>"search")); ?>
                  <div class="form-group">
                  <?php echo $this->Form->input('pick_year',array('error'=>false,'label'=>'','placeholder'=>"Search",'type'=>'year','class'=>'form-control')) ?>
                  </div>
                  <?php echo $this->Form->button('Submit',array('class'=>'btn btn-success','type'=>'submit')); ?>
                  <?php echo $this->Form->end(); ?>
            </div>
            <div id="container" style="min-width: 310px; margin: 0 auto"></div>
      </div>
</div>
<?php echo $this->Html->script('highcharts'); ?>
<script type="text/javascript">
    $(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Thống kê của năm'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (VND)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} VNĐ</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Giá trị',
            data: [<?php echo $data[0]?>, <?php echo $data[1]?>, <?php echo $data[2]?>, <?php echo $data[3]?>, <?php echo $data[4]?>, <?php echo $data[5]?>, <?php echo $data[6]?>, <?php echo $data[7]?>, <?php echo $data[8]?>, <?php echo $data[9]?>, <?php echo $data[10]?>, <?php echo $data[11]?>]

        }/*, {
            name: 'Tuần 2',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'Tuần 3',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Tuần 4',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        }*/]
    });
});
</script>
