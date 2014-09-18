<?php

if(Yii::app()->session['iduser']) {
$iduser = Yii::app()->session['iduser'];
$obj = Yii::app()->db->createCommand('SELECT count(*) count FROM igu_registration where iduser=:iduser');
$obj->bindParam(":iduser",$iduser,PDO::PARAM_STR);
$status = $obj->queryScalar();

		
$payment1 = Yii::app()->db->createCommand('SELECT count(*) count FROM igu_payment where validity = 0 and idclient =(SELECT id FROM igu_registration where  iduser=:iduser)');
$payment1->bindParam(":iduser",$iduser,PDO::PARAM_STR);
$payment = $payment1->queryScalar();

		if($status!=1){
			  $url='iguRegistration/create';
			  $urlPayment='iguPayment/create';
			  $urlPub = 'iguPayment/create';
			   if(Yii::app()->user->status !=4)
			      $urldash = '/site/dashboard';
				  else
				$urldash = '/site/minagriDashboard';
		  }else{
			  $url='iguRegistration/registration&id='.$iduser;
			  if(Yii::app()->user->status !=4)
			      $urldash = '/site/dashboard';
				  else
				$urldash = '/site/minagriDashboard';
			  if($payment == 0){
			       $urlPub='iguPayment/create';
				   $urlPayment='iguPayment/create';
			 }
			  else{
			       $urlPub = 'iguClientProduct/create'; 
				   $urlPayment='iguPayment/admin';
            }				   
		}
}else{
$url='/site/login';
$urlPayment='/site/login';
$urlPub = '/site/login';
$urldash = '/site/login';
}
?>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#">Inyungu </a>
         
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'Inshamake', 'url'=>array($urldash), 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'Umwirondoro', 'url'=>array($url), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->status ==1),
						array('label'=>'Kwishyura', 'url'=>array($urlPayment), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->status ==1 ),
						array('label'=>'Kwamamaza', 'url'=>array($urlPub), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->status == 1),
                        array('label'=>'Products', 'url'=>'?r=iguProducts/admin', 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->status == 2),
						array('label'=>'Credit', 'url'=>'?r=iguCredit/admin', 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->status == 2),
						array('label'=>'Voucher', 'url'=>'?r=iguVoucher/admin', 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->status == 2),
						array('label'=>'Voucher Management', 'url'=>'?r=iguVoucherManagement/admin', 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->status == 2),
						array('label'=>'Agents', 'url'=>'?r=iguAgents/admin', 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->status == 2),
						array('label'=>'User Management', 'url'=>'?r=user/admin', 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->status == 2),
                        array('label'=>'Reports <span class="caret"></span>', 'url'=>'#', 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->status == 4),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                           	array('label'=>'Report by registration', 'url'=>'?r=reportbyRegistration'),
							array('label'=>'Report by Products', 'url'=>'?r=reportbyProduct'),
												
                        )),
						array('label'=>'Reports <span class="caret"></span>', 'url'=>'#', 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->status == 2),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Report by payments', 'url'=>'?r=report/index'),
							array('label'=>'Report by registration', 'url'=>'?r=reportbyRegistration'),
							array('label'=>'Report by Products', 'url'=>'?r=reportbyProduct'),
							array('label'=>'Report by Voucher', 'url'=>'?r=reportbyVoucher'),
							
                        )),
						 array('label'=>'Amakarita', 'url'=>'?r=iguVoucherManagement/saleVoucher', 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->status == 3),						
                        array('label'=>'Settings <span class="caret"></span>', 'url'=>'#', 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->status == 2),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Back Up ', 'url'=>'?r=backup'),
							array('label'=>'', 'url'=>'?r=IguVoucher/admin'),
							array('label'=>'User Management', 'url'=>'?r=user/admin'),
							array('label'=>'More...', 'url'=>'?r=settings'),
                        )),
						array('label'=>'Ahabanza', 'url'=>'?r=site/index', 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Ibihingwa', 'url'=>'?r=iguClientProduct&search=2&id=1', 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Amatungo', 'url'=>'?r=iguClientProduct&search=2&id=2', 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Ibindi', 'url'=>'?r=iguClientProduct&search=2&id=3', 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Abo turibo', 'url'=>array('/site/page', 'view'=>'about'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Injira', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Sohoka ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>
<!--<input type="text" class="search-query span2" placeholder="Search"> -->
<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        
           <form class="navbar-search pull-right" action="">
	
 
           </form>
    	</div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->