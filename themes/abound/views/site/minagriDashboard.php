<?php
/* @var $this SiteController */

$iduser = Yii::app()->session['iduser'];

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>
<?php
	
$numofprod=Yii::app()->db->createCommand('SELECT count(*) count FROM igu_client_product where idclient=(select id from igu_registration where iduser='.$iduser.')')->queryScalar();
$abahinzi = Yii::app()->db->createCommand('SELECT count(*) count FROM igu_registration')->queryScalar();
$ibigurishwa = Yii::app()->db->createCommand('SELECT count(*) count FROM igu_client_product')->queryScalar();

?>

<div class="row-fluid">
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-count" style='width:100%'><center><span><?php echo $abahinzi;?></span><span>Umubare w abahinzi n aborozi</span></center></li>
	  </ul>
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		
		<li class="stat-count" style='width:100%'><center><span><?php echo $ibigurishwa;?></span><span>Umubare w ibigurishwa biri kw isoko</span></center></li>
	  </ul>
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-count" style='width:100%'><center><span><?php //echo $days;?></span><span>Umubare w uturere dukora</span></center></li>
	  </ul>
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-count" style='width:100%'><center><span>
		        <?php //echo $isigaye?></span>
		<span>Iminsi usigaje</span></center></li>
	  </ul>
	</div>
  </div>
</div>

<div class="row-fluid">

    
	<div class="span12">
    
         <?php
		
         $this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
            //'chart'=> array('type'=>'pie'),
			//'chart'=> array('type'=>'column'),
		    'tooltip'=>array ('valueSuffix'=> ' Persons'), 
			'legend'=>array('borderWidth'=> 1),
            'credits'=>array('enabled'=>false),
            'title' => array('text'=>'Report by registration'),
            'legend'=> array('enabled'=>false),
            'plotOptions'=>array('bar'=>array('dataLabels'=>array('enabled'=>true))),
            'xAxis' => array('categories'=>$credit),
            'yAxis' => array('title'=>array('text'=>'Number')),
            'series' => array(array('name' => 'Counts', 'data' => $num),
			
        ))
     ));
	 
	 ?>
	</div>
	
	

	</div>