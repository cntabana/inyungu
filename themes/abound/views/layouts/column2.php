<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main');
$iduser = Yii::app()->session['iduser'];

if(isset($iduser)) {
if(Yii::app()->user->status ==1){

$obj = Yii::app()->db->createCommand('SELECT count(*) count FROM igu_registration where iduser=:iduser');
$obj->bindParam(":iduser",$iduser,PDO::PARAM_STR);
$status = $obj->queryScalar();

 $data =null;
 $rows=null; 
 $deadline = null;
     $kwa  = '';
	 $mama = '';
	 $za   = '';
if($status == 0){
   $span    = '<span class="label label-important pull-right">Nturakorwa</span>'; 
   $url='?r=iguRegistration/create';
   $urlpayment ='?r=iguPayment/create';
   $spanpay    ='<span class="label label-important pull-right">Nturishyura</span>';
   $kwamamaza	 ='';
  }
	else{
	$span ='<span class="badge badge-success pull-right">Byarakozwe</span>';
	$url='?r=iguRegistration/registration&id='.$iduser;
		$obj = Yii::app()->db->createCommand('SELECT id FROM igu_registration where  iduser=:iduser');
		$obj->bindParam(":iduser",$iduser,PDO::PARAM_STR);
        $idclient = $obj->queryRow();
		
		$payment1 = Yii::app()->db->createCommand('SELECT count(*) count FROM igu_payment where validity = 0 and idclient =:idclient2');
	    $payment1->bindParam(":idclient2",$idclient['id'],PDO::PARAM_STR);
        $payment = $payment1->queryScalar();
		
	if($payment != 1 ){
	 $spanpay    ='<span class="label label-important pull-right">Nturishyura</span>';
     $urlpayment ='?r=iguPayment/create';	
     $kwa  = '';
	 $mama = '';
	 $za   = '';
	}else{
		
	
		$rows1 = Yii::app()->db->createCommand('SELECT vouchernumber,datepaiement FROM igu_payment where  idclient=:idclient2 and validity = 0 limit 1');
		$rows1->bindParam(":idclient2",$idclient['id'],PDO::PARAM_STR);
        $rows = $rows1->queryRow();
		
		$data1 = Yii::app()->db->createCommand('SELECT days,cash FROM igu_credit where  id=(select idcredit from igu_voucher where vouchernumber=:vouchernumber)');
		$data1->bindParam(":vouchernumber",$rows['vouchernumber'],PDO::PARAM_STR);
        $data = $data1->queryRow();
		
		$date = strtotime(+$data['days']." day", strtotime($rows['datepaiement']));
		$deadline = date('Y-m-d', $date);
		
		
		if($deadline < date('Y-m-d')){
		   $spanpay    ='<span class="label label-important pull-right">Nturishyura</span>';
		   $urlpayment ='?r=iguPayment/create';
		  }else{
		  $spanpay   ='<span class="badge badge-success pull-right">Warishyuye</span>';
		  $urlpayment='?r=iguPayment/admin';
		   //$kwamamaza = 
		   $kwa = '<i class="icon icon-envelope"></i> Kwamamaza';
		   $mama = 'url';
		   $za = '?r=iguClientProduct/create';
		  
		  }
	}
}
	
}

}


?>

  <div class="row-fluid">
	<div class="span3">
		<div class="sidebar-nav">
        
		  <?php
          if(Yii::app()->session['iduser'] && Yii::app()->user->status == 1) {

		  $this->widget('zii.widgets.CMenu', array(
			/*'type'=>'list',*/
			'encodeLabel'=>false,
			'items'=>array(
				array('label'=>'<i class="icon icon-home"></i>  Inshamake <span class="label label-info pull-right">BETA</span>', 'url'=>array('/site/dashboard'),'itemOptions'=>array('class'=>'')),
				array('label'=>'<i class="icon icon-book"></i> Umwirondoro'.$span.'', 'url'=>$url),
				array('label'=>'<i class="icon icon-bookmark"></i> Kwishyura'.$spanpay.'', 'url'=>$urlpayment),
				array('label'=>$kwa,$mama=>$za),
				array('label'=>'<i class="icon icon-tag"></i> Guhindura akajambo k ibanga', 'url'=>'?r=user/changepswd&id='.$iduser),
				// Include the operations menu
				array('label'=>'OPERATIONS','items'=>$this->menu),
			),
			));
			} 
			else if( Yii::app()->session['iduser'] && Yii::app()->user->status == 2){
			
			 $this->widget('zii.widgets.CMenu', array(
			/*'type'=>'list',*/
			'encodeLabel'=>false,
			'items'=>array(
			    array('label'=>'<i class="icon icon-home"></i>  Home ', 'url'=>'?r=site/index'),
				array('label'=>'<i class="icon icon-tag"></i> Products', 'url'=>'?r=iguProducts/admin'),
				array('label'=>'<i class="icon icon-star"></i> Registrations', 'url'=>'?r=iguRegistration/admin'),
				array('label'=>'<i class="icon icon-pause"></i> Agents', 'url'=>'?r=iguAgents/admin'),
				array('label'=>'<i class="icon icon-camera"></i> Credit', 'url'=>'?r=iguCredit/admin'),
				array('label'=>'<i class="icon icon-camera"></i> Voucher', 'url'=>'?r=iguVoucher/admin'),
				array('label'=>'<i class="icon icon-tint"></i> Voucher Management', 'url'=>'?r=iguVoucherManagement/admin'),
				array('label'=>'<i class="icon icon-lock"></i> Company Type', 'url'=>'?r=iguCompanyType/admin'),
				array('label'=>'<i class="icon icon-book"></i> Categories', 'url'=>'?r=iguProductCategory/admin'),
				array('label'=>'<i class="icon icon-bookmark"></i> Sous Categories', 'url'=>'?r=iguSousCategory/admin'),
				array('label'=>'<i class="icon icon-forward"></i> Intara ', 'url'=>'?r=iguProvince/admin'),
				array('label'=>'<i class="icon icon-eject"></i> Uturere', 'url'=>'?r=iguDistrict/admin'),
				array('label'=>'<i class="icon icon-eject"></i> Imirenge', 'url'=>'?r=imirenge/admin'),
				array('label'=>'<i class="icon icon-user"></i> User Management', 'url'=>'?r=user/admin'),
				array('label'=>'<i class="icon icon-play"></i> Backup', 'url'=>'?r=backup'),
				array('label'=>'<i class="icon icon-stop"></i> Statistcs(Users)', 'url'=>'?r=count'),
				// Include the operations menu
				array('label'=>'OPERATIONS','items'=>$this->menu),
			),
			));
			
			}
			else if(Yii::app()->session['iduser'] && Yii::app()->user->status ==3){
				 $this->widget('zii.widgets.CMenu', array(
			/*'type'=>'list',*/
			'encodeLabel'=>false,
			'items'=>array(
				// Include the operations menu
				array('label'=>'OPERATIONS','items'=>$this->menu),
			),
			));
			
			}
			else if(!Yii::app()->session['iduser'] && !isset($_GET['create'])){
			  $this->widget('zii.widgets.CMenu', array(
				/*'type'=>'list',*/
				'encodeLabel'=>false,
				'items'=>array(
					array('label'=>'<i class="icon icon-home"></i> Ahabanza', 'url'=>'?r=site/index'),
					),
				));
				//browser by category
                if(isset($_GET['search'])){
                    if($_GET['search'] == 2){
							
						if(!isset($_REQUEST['productname'])){
					            if(isset($_GET['id']) && !isset($_GET['idsub'])){
								$ceatequery1 = Yii::app()->db->createCommand('SELECT id,subcategory FROM igu_sous_category where  idcategory=:id order by 2');
								$ceatequery1->bindParam(":id",$_GET['id'],PDO::PARAM_STR);
                                $ceatequery = $ceatequery1->queryAll();
								echo "<div style='background-color:#fcfcfc;height:30px'><a href='?r=iguClientProduct&search=2'><b><span style='margin-left:20px;'>Subira inyuma</b></a></div>";									
							
								 foreach($ceatequery as $rep){
								  $this->widget('zii.widgets.CMenu', array(
									/*'type'=>'list',*/
									'encodeLabel'=>false,
									'items'=>array(
										array('label'=>'<i class="icon icon-forward"></i> '.$rep['subcategory'], 'url'=>'?r=iguClientProduct&search=2&id='.$_GET['id'].'&idsub='.$rep['id']),
									),
									));
								}
							}
							else if(isset($_GET['idsub'])){
								$ceatequery1 = Yii::app()->db->createCommand('SELECT id,productname FROM igu_products where  idsouscategory	=:idsub order by 2');
                                $ceatequery1->bindParam(":idsub",$_GET['idsub'],PDO::PARAM_STR);
                                $ceatequery = $ceatequery1->queryAll();	
                              echo "<div style='background-color:#fcfcfc;height:30px'><a href='?r=iguClientProduct&search=2&id=".$_GET['id']."'><b><span style='margin-left:20px;'>Subira inyuma</b></a></div>";									
															
								foreach($ceatequery as $rep){
								  $this->widget('zii.widgets.CMenu', array(
									/*'type'=>'list',*/
									'encodeLabel'=>false,
									'items'=>array(
										array('label'=>'<i class="icon icon-forward"></i> '.$rep['productname'], 'url'=>'?r=iguClientProduct&search=2&id='.$_GET['id'].'&idsub='.$_GET['idsub'].'&idprod='.$rep['id']),
									),
									));
							  }
							}
							else{
								$ceatequery = Yii::app()->db->createCommand('SELECT id,category FROM igu_product_category order by 2')->queryAll();
								 foreach($ceatequery as $rep){
								  $this->widget('zii.widgets.CMenu', array(
									/*'type'=>'list',*/
									'encodeLabel'=>false,
									'items'=>array(
										array('label'=>'<i class="icon icon-forward"></i> '.$rep['category'], 'url'=>'?r=iguClientProduct&search=2&id='.$rep['id']),
									),
									));
								}
							}
						}else{
						     $createquery = Yii::app()->db->createCommand('SELECT id,category FROM igu_product_category order by 2')->queryAll();
								 foreach($createquery as $rep){
								  $this->widget('zii.widgets.CMenu', array(
									/*'type'=>'list',*/
									'encodeLabel'=>false,
									'items'=>array(
										array('label'=>'<i class="icon icon-forward"></i> '.$rep['category'], 'url'=>'?r=iguClientProduct&id='.$rep['id']),
									),
									));
									}
						}
						
					}else{
					
					        if(isset($_GET['idprovince']) && !isset($_GET['iddistrict'])){
							 $ceatequery1 = Yii::app()->db->createCommand('SELECT id,district FROM igu_district where idprovince=:idprovince order by 2');
							 $ceatequery1->bindParam(":idprovince",$_GET['idprovince'],PDO::PARAM_STR);
                             $ceatequery = $ceatequery1->queryAll();
                            
                            echo "<div style='background-color:#fcfcfc;height:30px'><a href='?r=iguClientProduct&search=1'><b><span style='margin-left:20px;'>Subira inyuma</b></a></div>";									
							
							foreach($ceatequery as $rep){
								  $this->widget('zii.widgets.CMenu', array(
									/*'type'=>'list',*/
									'encodeLabel'=>false,
									'items'=>array(
										array('label'=>'<i class="icon icon-forward"></i> '.$rep['district'], 'url'=>'?r=iguClientProduct&search=1&idprovince='.$_GET['idprovince'].'&iddistrict='.$rep['id']),
									),
									));
						        }
							}
							else   if(isset($_GET['idprovince']) && isset($_GET['iddistrict']) && !isset($_GET['idumurenge'])){
							 $ceatequery1 = Yii::app()->db->createCommand('SELECT id,umurenge FROM imirenge where iddistrict=:iddistrict order by 2');
							 $ceatequery1->bindParam(":iddistrict",$_GET['iddistrict'],PDO::PARAM_STR);
                             $ceatequery = $ceatequery1->queryAll();
                            echo "<div style='background-color:#fcfcfc;height:30px'><a href='?r=iguClientProduct&search=1&idprovince=".$_GET['idprovince']." '><b><span style='margin-left:20px;'>Subira inyuma</b></a></a></div>";							 
								 foreach($ceatequery as $rep){
								  $this->widget('zii.widgets.CMenu', array(
									/*'type'=>'list',*/
									'encodeLabel'=>false,
									'items'=>array(
										array('label'=>'<i class="icon icon-forward"></i> '.$rep['umurenge'], 'url'=>'?r=iguClientProduct&search=1&idprovince='.$_GET['idprovince'].'&iddistrict='.$_GET['iddistrict'].'&idumurenge='.$rep['id']),
									),
									));
						        }
							}
			                 else if(isset($_GET['idumurenge'])){
							$ceatequery1 = Yii::app()->db->createCommand('SELECT distinct productname,p.id FROM igu_client_product c,igu_products p where c.idproduct = p.id and c.idclient in (select id from igu_registration where idumurenge =:idumurenge) order by 1');
                            $ceatequery1->bindParam(":idumurenge",$_GET['idumurenge'],PDO::PARAM_STR);
                            $ceatequery = $ceatequery1->queryAll();	
                            echo "<div style='background-color:#fcfcfc;height:30px'><a href='?r=iguClientProduct&search=1&idprovince=".$_GET['idprovince']."&iddistrict=".$_GET['iddistrict']." '><b><span style='margin-left:20px;'>Subira inyuma</b></a></a></div>";							 
														
							foreach($ceatequery as $rep){
								  $this->widget('zii.widgets.CMenu', array(
									/*'type'=>'list',*/
									'encodeLabel'=>false,
									'items'=>array(
										array('label'=>'<i class="icon icon-forward"></i> '.$rep['productname'], 'url'=>'?r=iguClientProduct&search=1&idprovince='.$_GET['idprovince'].'&iddistrict='.$_GET['iddistrict'].'&idumurenge='.$_GET['idumurenge'].'&idprod='.$rep['id']),
									),
									));
							  }
							}
							else{
					             $ceatequery = Yii::app()->db->createCommand('SELECT id,province FROM igu_province order by 2')->queryAll();
								 foreach($ceatequery as $rep){
								  $this->widget('zii.widgets.CMenu', array(
									/*'type'=>'list',*/
									'encodeLabel'=>false,
									'items'=>array(
										array('label'=>'<i class="icon icon-forward"></i> '.$rep['province'], 'url'=>'?r=iguClientProduct&search=1&idprovince='.$rep['id']),
									),
									));
						         }
							}
				    }
				}				
				
				
			}//end by browser category
	?>
		</div>
        <br> 
		<?php
		  if($iduser && Yii::app()->user->status ==3){
		?>
		<div class="well">
		
        <table class="table table-striped table-bordered">
		<thead>
		<th colspan='2'><center>Vouchers Available</center></th>
		</thead>
          <tbody>
		  <?php
		  
		   $credit1=Yii::app()->db->createCommand('select count(*) count,v.idcredit idcredit from  igu_voucher_management i,igu_voucher v  where idagent=(select id from igu_agents where iduser=:iduser) and  i.idvoucher=v.id and v.status= 1 group by v.idcredit');
           $credit1->bindParam(":iduser",$iduser,PDO::PARAM_STR);
           $credit = $credit1->queryAll();
		   foreach($credit as $row){
		?>
            <tr>
              <td width="50%">Credit <?php echo $row['idcredit'];?></td>
              <td>
              	<div >
                  <div ><?php echo $row['count'];?></div>
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
	    <?php } ?>
		<?php
		if($iduser &&  Yii::app()->user->status ==1) {
		?>
        <table class="table table-striped table-bordered">
          <tbody>
            <tr>
              <td width="50%">Iminsi Wishyuye</td>
              <td>
                 <?php 
				 if($data['days'])
				    echo 'iminsi '.$data['days'];
					else
					echo 0;
					?>
              </td>
			  </tr>
            <tr>
              <td>Igihe wishyuriye</td>
              
             	<td colspan=2>
                <?php 
				if($rows['datepaiement'])
				echo $rows['datepaiement'];
				else
				echo "-";
				?>
                </td>
            </tr>
			<tr>
              <td>Igihe izarangirira</td>
              
             	<td colspan=2>
               	<?php 
				echo  $deadline;
				?>
                </td>
            </tr>
			<tr>
              <td>Iminsi usigaje</td>
              
             	<td colspan=2>
               	<?php 
					$days = (strtotime($deadline) - strtotime(date('Y-m-d'))) / (60 * 60 * 24);
					if(isset($deadline))
				       echo number_format($days, 0, '.', ''); 
					   else
					   echo "-";
				?>
                </td>
            </tr>
          </tbody>
        </table>
		<div class="well">
        
            <dl class="dl-horizontal">
              <dt>Amafaranga wishyuye</dt>
              <dd>
			  <?php 
			  if($data['cash'])
			  echo  number_format($data['cash'],0,",",".").' frw';
			  else
			  echo '0 frw';
			  ?>
			  </dd>
                 
            </dl>
      </div>
	<?php 
	}
	if(isset($_GET['st'])){
	?>
	<div class="well">
        <img src='./images/pub/pub.jpg' />
     </div>
	 <div class="well">
	  <h3>Heading</h3>
	  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
	  <p><a class="btn" href="#">View details &raquo;</a></p>
	</div>
	<?php
      }
	?>	

    </div><!--/span-->
    <div class="span9">
    
    <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
			'homeLink'=>CHtml::link('Dashboard'),
			'htmlOptions'=>array('class'=>'breadcrumb')
        )); ?><!-- breadcrumbs -->
    <?php endif?>
    
    <!-- Include content pages -->
    <?php echo $content; ?>

	</div><!--/span-->
  </div><!--/row-->


<?php $this->endContent(); ?>