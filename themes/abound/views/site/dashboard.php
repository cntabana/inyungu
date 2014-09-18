<?php
/* @var $this SiteController */
    
if(Yii::app()->session['iduser']){
$iduser = Yii::app()->session['iduser'];
}else{
$iduser = 0;
}
$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>
<?php
if(Yii::app()->session['iduser']){
if(Yii::app()->user->status == 1)
$rawData=Yii::app()->db->createCommand('select p.id,productname,currentprice,quantity,totalamount from igu_products p,igu_client_product pr where p.id=pr.idproduct and  pr.idclient=(select id from igu_registration where iduser='.$iduser.')')->queryAll();
else
$rawData=Yii::app()->db->createCommand('select p.id,productname,currentprice,quantity,totalamount from igu_products p,igu_client_product pr where p.id=pr.idproduct')->queryAll();

// or using: $rawData=User::model()->findAll();
$gridDataProviderProduct=new CArrayDataProvider($rawData, array(
    'id'=>'igu_products',
    'sort'=>array(
        'attributes'=>array(
             'id', 'productname', 'quantity','currentprice','totalamount'
        ),
    ),
    'pagination'=>array(
        'pageSize'=>5,
    ),
));
if(Yii::app()->user->status == 1)
$rawData=Yii::app()->db->createCommand('SELECT id,nameofcooperative,numberofmembers,akagali,umudugudu,datedinscription FROM igu_registration where iduser='.$iduser)->queryAll();
else
$rawData=Yii::app()->db->createCommand('SELECT id,nameofcooperative,numberofmembers,akagali,umudugudu,datedinscription FROM igu_registration')->queryAll();

// or using: $rawData=User::model()->findAll();
$gridDataProviderCooperative=new CArrayDataProvider($rawData, array(
    'id'=>'cooperative',
    'sort'=>array(
        'attributes'=>array(
             'id','nameofcooperative','numberofmembers','akagali','datedinscription'

        ),
    ),
    'pagination'=>array(
        'pageSize'=>10,
    ),
));     
        $obj = Yii::app()->db->createCommand('SELECT id FROM igu_registration where  iduser=:iduser');
		$obj->bindParam(":iduser",$iduser,PDO::PARAM_STR);
        $idclient = $obj->queryRow();
		
        $payment1 = Yii::app()->db->createCommand('SELECT count(*) count FROM igu_payment where validity = 0 and idclient =:idclient2');
	    $payment1->bindParam(":idclient2",$idclient['id'],PDO::PARAM_STR);
        $payment = $payment1->queryScalar();
		
		if($payment != 0){
        $rows1 = Yii::app()->db->createCommand('SELECT vouchernumber,datepaiement FROM igu_payment where  idclient=:idclient2 and validity = 0 limit 1');
		$rows1->bindParam(":idclient2",$idclient['id'],PDO::PARAM_STR);
        $rows = $rows1->queryRow();
		
		$data1 = Yii::app()->db->createCommand('SELECT days,cash FROM igu_credit where  id=(select idcredit from igu_voucher where vouchernumber=:vouchernumber)');
		$data1->bindParam(":vouchernumber",$rows['vouchernumber'],PDO::PARAM_STR);
        $data = $data1->queryRow();
		$datedepaiement = $rows['datepaiement'];
		$date = strtotime(+$data['days']." day", strtotime($rows['datepaiement']));
		$deadline = date('Y-m-d', $date);
		$days = $data['days'];
		$isigaye = (strtotime($deadline) - strtotime(date('Y-m-d'))) / (60 * 60 * 24);
		$cash1 = number_format($data['cash'],0,",",".").' frw';
		}else{
		$datedepaiement = '-';
		$deadline = '-';
		$days = 0;
		$isigaye = 0;
		$cash1 = 0;
		}
		
$cash=Yii::app()->db->createCommand('SELECT sum(totalamount) cash FROM igu_client_product WHERE idclient =(select id from igu_registration where iduser='.$iduser.')')->queryRow();
$numofprod=Yii::app()->db->createCommand('SELECT count(*) count FROM igu_client_product where idclient=(select id from igu_registration where iduser='.$iduser.')')->queryScalar();
}else{
$numofprod = 0;
$datedepaiement = '-';
		$deadline = '-';
		$days = 0;
		$isigaye = 0;
		$cash1 = 0;
		
}
?>

<div class="row-fluid">
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-count" style='width:100%'><center><span><?php echo $datedepaiement;?></span><span>Igihe wishyuriye</span></center></li>
	  </ul>
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		
		<li class="stat-count" style='width:100%'><center><span><?php echo $deadline;?></span><span>Igihe izarangirira</span></center></li>
	  </ul>
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-count" style='width:100%'><center><span><?php echo $days;?></span><span>Iminsi wishyuye</span></center></li>
	  </ul>
	</div>
  </div>
  <div class="span3 ">
	<div class="stat-block">
	  <ul>
		<li class="stat-count" style='width:100%'><center><span>
		        <?php echo $isigaye?></span>
		<span>Iminsi usigaje</span></center></li>
	  </ul>
	</div>
  </div>
</div>

<div class="row-fluid">

    
	<div class="span9">
    
         <?php
		 if(Yii::app()->user->status == 2){
         $this->Widget('ext.highcharts.HighchartsWidget', array(
        'options'=>array(
           // 'chart'=> array('type'=>'bar'),
			'chart'=> array('type'=>'column'),
		    'tooltip'=>array ('valueSuffix'=> ' Persons'), 
			'legend'=>array('borderWidth'=> 1),
            'credits'=>array('enabled'=>false),
            'title' => array('text'=>'Credits'),
            'legend'=> array('enabled'=>false),
            'plotOptions'=>array('bar'=>array('dataLabels'=>array('enabled'=>true))),
            'xAxis' => array('categories'=>$credit),
            'yAxis' => array('title'=>array('text'=>'Number')),
            'series' => array(array('name' => 'Counts', 'data' => $num),
        ))
     ));
	 }else{
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'<span class="icon-picture"></span>Ubuzima',
			'titleCssClass'=>''
		));
		?>
        
        <div class="auto-update-chart" style="height: 250px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
        
        <?php 
		$this->endWidget(); 
		}
		?>
	</div>
	<div class="span3">
		<div class="summary">
          <ul>
		    <li>
            	<span class="summary-icon">
                	<img src="<?php echo $baseUrl ;?>/img/page_white_edit.png" width="36" height="36" alt="Open Invoices">
                </span>
                <span class="summary-number"> <?php  echo $cash1 ;?>
				</span>
                <span class="summary-title"> Amafaranga wishyuye </span>
            </li>
		     <li>
            	<span class="summary-icon">
                	<img src="<?php echo $baseUrl ;?>/img/folder_page.png" width="36" height="36" alt="Active Members">
                </span>
                <span class="summary-number"><?php echo $numofprod;?></span>
                <span class="summary-title"> Ibicuruzwa</span>
            </li>
           	<li>
          		<span class="summary-icon">
                	<img src="<?php echo $baseUrl ;?>/img/credit.png" width="36" height="36" alt="Monthly Income">
                </span>
                <span class="summary-number"><?php echo $cash['cash'];?> frw</span>
                <span class="summary-title"> Amafaranga yose</span>
            </li>
                      
        
          </ul>
        </div>

	</div>
</div>


<div class="row-fluid">
	<div class="span6">
	  <?php 
	  if(Yii::app()->session['iduser']){
	  $this->widget('zii.widgets.grid.CGridView', array(
			/*'type'=>'striped bordered condensed',*/
			'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
			'dataProvider'=>$gridDataProviderProduct,
			'template'=>"{items}",
			'columns'=>array(
				array('class'=>'IndexColumn', 'header'=>'#'),
				array('name'=>'productname', 'header'=>'Igicuruzwa'),
				array('name'=>'quantity', 'header'=>'Ingano'),
				array('name'=>'currentprice', 'header'=>'Igiciro(frw)'),
				array('name'=>'totalamount', 'header'=>'Igiciro cyose (frw)', 'type'=>'raw'),
				
			),
		)); 
		}
		?>
		  
	</div><!--/span-->
	<div class="span6">
		 <?php
if(Yii::app()->session['iduser']){
		 $this->widget('zii.widgets.grid.CGridView', array(
			/*'type'=>'striped bordered condensed',*/
			'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
			'dataProvider'=>$gridDataProviderCooperative,
			'template'=>"{items}",
			'columns'=>array(
				array('class'=>'IndexColumn', 'header'=>'#'),
				array('name'=>'nameofcooperative', 'header'=>'Ikigo Cyawe'),
				array('name'=>'numberofmembers', 'header'=>'Umubare w abakozi'),
				array('name'=>'akagali', 'header'=>'Akagali', 'type'=>'raw'),
				array('name'=>'datedinscription', 'header'=>'Igihe wiyandikishirije', 'type'=>'raw'),
							),
		)); 
		}
		?>
        	
	</div><!--/span-->
</div><!--/row-->


	
</div><!--/row-->