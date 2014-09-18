<?php
/* @var $this ReportbyProductController */

$this->breadcrumbs=array(
	'Reportby Product',
);
?>

<div style='font-size: 1.1em;'>
<a href='?r=reportbyProduct'>Report by Products</a>&nbsp;&nbsp;|&nbsp;&nbsp;
<a href='?r=reportbyProduct/productInMarket'>Product in Market Chart</a>&&nbsp;&nbsp;|&nbsp;&nbsp;
<a href='?r=reportbyProduct/productbyDistrict'>Product by district</a>

</div>
<hr>
<div>
<?php
$this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
           // 'chart'=> array('type'=>'bar'),
			'chart'=> array('type'=>'column'),
			//'chart'=> array('zoomType'=>'xy'),
			 'tooltip'=>array ('valueSuffix'=> '', 'shared'=>true), 
			'legend'=>array('borderWidth'=> 1),
            'credits'=>array('enabled'=>false),
            'title' => array('text'=>$title),
            'legend'=> array('enabled'=>false,'y'=> 80),
            'plotOptions'=>array('bar'=>array('dataLabels'=>array('enabled'=>true))),
            'xAxis' => array('categories'=>$data),
            'yAxis' => array('title'=>array('text'=>'Number')),
            'series' => array(array('name' => 'Counts', 'data' => $num),
        ))
     ));

?>