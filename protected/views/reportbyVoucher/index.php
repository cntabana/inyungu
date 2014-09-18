<?php
/* @var $this ReportbyVoucherController */

$this->breadcrumbs=array(
	'Reportby Voucher',
);
?>
<div style='font-size: 1.1em;'>
<a href='?r=reportbyVoucher'>Report by Voucher(Used)</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href='?r=reportbyVoucher/noUsed'>Report by Voucher(No Used)</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href='?r=reportbyVoucher/New'>Report by Voucher(New)</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href='?r=reportbyVoucher/voucherbyStatus'>Voucher by Status</a>&nbsp;&nbsp;&nbsp;


</div>
<hr>
<div>
<?php
$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
           // 'chart'=> array('type'=>'bar'),
			'chart'=> array('type'=>'column'),
		    'tooltip'=>array ('valueSuffix'=> ''), 
			'legend'=>array('borderWidth'=> 1),
            'credits'=>array('enabled'=>false),
            'title' => array('text'=>$title),
            'legend'=> array('enabled'=>false),
            'plotOptions'=>array('bar'=>array('dataLabels'=>array('enabled'=>true))),
            'xAxis' => array('categories'=>$data),
            'yAxis' => array('title'=>array('text'=>'Number')),
            'series' => array(array('name' => 'Counts', 'data' => $num),
        ))
     ));
?>