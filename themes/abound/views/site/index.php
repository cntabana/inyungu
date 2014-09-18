<?php
if(isset($_POST['searchtext'])){
header('location:?r=iguClientProduct&search='.$_POST['searchtext']);
}

?>
<?php
	$rawData=Yii::app()->db->createCommand('select c.id,productname,quantity,creationdate  from igu_client_product  c,igu_products p where c.idproduct = p.id order by c.id desc limit 10')->queryAll();
	// or using: $rawData=User::model()->findAll();
	$gridDataProvider=new CArrayDataProvider($rawData, array(
		'id'=>'user',
		'sort'=>array(
			'attributes'=>array(
				 'id','productname', 'quantity','creationdate'
			),
		),
		'pagination'=>array(
			'pageSize'=>10,
		),
	));

?>
<?php
$gridDataProvider3 = new CArrayDataProvider(array(
    array('id'=>1, 'firstName'=>'Mark', 'lastName'=>'Otto', 'language'=>'<span class="badge badge-warning">HTML</span>','usage'=>'<span class="inlinebar">1,4,4,7,5,9,10</span>'),
    array('id'=>2, 'firstName'=>'Jacob', 'lastName'=>'Thornton', 'language'=>'<span class="badge badge-important">CSS</span>','usage'=>'<span class="inlinebar">1,4,4,7,5,9,10</span>'),
    array('id'=>3, 'firstName'=>'Stu', 'lastName'=>'Dent', 'language'=>'<span class="badge badge-info">Javascript</span>','usage'=>'<span class="inlinebar">1,4,4,7,5,9,10</span>'),
));
?>
<div class="row-fluid">
	<div class="span3 ">
		<?php
				$this->beginWidget('zii.widgets.CPortlet', array(
					'title'=>"<center>Shakisha</center>",
				));
				
			?>
			<div class="form">
			<?php $form = $this->beginWidget('GxActiveForm', array(
				'id' => 'user-form',
				'enableAjaxValidation' => false,
				
			));
				echo CHtml::dropDownList('searchtext','coco',array('1'=>'Intara','2'=>'Ubwoko'), array('prompt'=>'-- Ukurikije --'));
				echo ' &nbsp;&nbsp;'.GxHtml::submitButton(Yii::t('app', 'shakisha'));
				$this->endWidget();
			?>
				

			</div><!-- form -->
			<?php $this->endWidget();?>
			<div>
				<?php
					$this->beginWidget('zii.widgets.CPortlet', array(
						'title'=>"<center>Ibiherukaho</center>",
					));
					
				?>
				
				<?php $this->widget('zii.widgets.grid.CGridView', array(
						/*'type'=>'striped bordered condensed',*/
						'itemsCssClass'=>'table table-bordered',
						'dataProvider'=>$gridDataProvider,
						'template'=>"{items}",
						'columns'=>array(
					    	array('name'=>'productname','header'=>'Productname'),
							array('name'=>'quantity', 'header'=>'Ingano'),
							array('name'=>'creationdate', 'header'=>'Italike'),
							),
					)); ?>
				<?php $this->endWidget();?>
  </div>
</div><!--/span-->
	<!-------->
<div class="span7 well">
					<div id="content" style='background:white'>
						<ul id="tabs" class="nav nav-tabs" data-tabs="tabs" style='background:#F8F8F8'>
							<li class="active" ><a href="#red" data-toggle="tab">Ibigurishwa</a></li>
							<li><a href="#orange" data-toggle="tab">Imbuto</a></li>
							<li><a href="#yellow" data-toggle="tab">Imboga</a></li>
							<li><a href="#green" data-toggle="tab">Ibihingwa Ngengabukungu</a></li>
							<li><a href="#blue" data-toggle="tab">Ibihingwa Ngandurarugo</a></li>
							<li><a href="#white" data-toggle="tab">Amatungo</a></li>
						</ul>
						<div id="my-tab-content" class="tab-content" >
							<div class="tab-pane active" id="red" >
							<!-- ------------------------------------------------ Ibigurishwa --------------------------------------- -->
								 <div class="">
										<?php
											$this->beginWidget('zii.widgets.CPortlet', array(
												'title'=>"<center>Ntimucikwe</center>",
											));
										        $rawData = IguClientProduct::displayProductsHomegage();
												foreach($rawData as $row){
												if($row['idsouscategory'] == 4 || $row['idsouscategory'] == 5 || $row['idsouscategory'] == 6 || $row['idsouscategory'] == 7)
												$ku = 'zigera ku ';
												else
												$ku ='agera ku biro ';
												
												$link = $row['district']." haraboneka ".$row['productname']." ".$ku." ".$row['quantity']." ,ubwo mwabaza kuri izi numero zikurikira ".$row['telephone'];
									            $href = '?r=iguClientProduct/displayAll&st=2&id='.$row["id"];
												$links = '<div style="display: inline-block;"><p  style="font-size:12px"> <a href='.$href.'>'.$link.'</a></p></div>';
									   ?>
										
										<blockquote ><div><?php echo "<div style='display: inline-block;width:7%;height:7%'><img src=images/products/".$row['image']."></div> ".$links.'';?></div></p></blockquote>
										<?php
										}
										?>
											
										<?php $this->endWidget();?>
									  </div>
		                    </div>
							<!-- -----------------------------------end ibigurishwa ------------------------------------------------ -->
							<!-- ----------------------------------- Imbuto    -------------------------------------------------- -->
							<div class="tab-pane" id="orange">
							       <div class="accordion-group">
										<div class="accordion-heading" style='background:#F8F8F8'>
										  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
											Imbuto
										  </a>
										</div>
										<div id="collapseOne" class="accordion-body collapse in">
										  <div class="accordion-inner">
											<?php 
											
											    $id = 8;
												$rawData1=Yii::app()->db->createCommand('select p.id,productname,image,idsouscategory,idcategory from igu_products p,igu_sous_category s where s.id= p.idsouscategory and s.id =:id order by 2');
												$rawData1->bindParam(":id",$id,PDO::PARAM_STR);
                                                $rawData = $rawData1->queryAll();
												foreach($rawData as $row){
												$link = '?r=iguClientProduct&search=2&id='.$row["idcategory"].'&idsub='.$row["idsouscategory"].'&idprod='.$row["id"].'';
												$image = './images/products/'.$row["image"].' ';
											    echo '<div class="span3 well"><a href='.$link.'> <img src='.$image.'/><p><center>'.$row["productname"].'</center><p/></a></div>';
												}
														
												?>
										  </div>
										</div>
									  </div>
							</div>	
							<!-- ---------------------------------------- end imbuto ------------------------------------------ -->
							<!-- ----------------------------------- Imboga    -------------------------------------------------- -->
							<div class="tab-pane" id="yellow">
							       <div class="accordion-group">
										<div class="accordion-heading" style='background:#F8F8F8'>
										  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
											Imboga
										  </a>
										</div>
										<div id="collapseOne" class="accordion-body collapse in">
										  <div class="accordion-inner">
											<?php 
											    $id = 9;
												$rawData1=Yii::app()->db->createCommand('select p.id,productname,image,idsouscategory,idcategory from igu_products p,igu_sous_category s where s.id= p.idsouscategory and s.id =:id order by 2');
												$rawData1->bindParam(":id",$id,PDO::PARAM_STR);
                                                $rawData = $rawData1->queryAll();
												foreach($rawData as $row){
												$link = '?r=iguClientProduct&search=2&id='.$row["idcategory"].'&idsub='.$row["idsouscategory"].'&idprod='.$row["id"].'';
												$image = './images/products/'.$row["image"].' ';
											    echo '<div class="span3 well"><a href='.$link.'> <img src='.$image.'/><p><center>'.$row["productname"].'</center><p/></a></div>';		}
												?>
										  </div>
										</div>
									  </div>
							</div>	
							<!-- ---------------------------------------- end imboga ------------------------------------------ -->
							<!-- ----------------------------------- Ibihingwa Ngandurabukungu    -------------------------------------------------- -->
							<div class="tab-pane" id="green">
							       <div class="accordion-group">
										<div class="accordion-heading" style='background:#F8F8F8'>
										  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
											Ibihingwa Ngandurabukungu
										  </a>
										</div>
										<div id="collapseOne" class="accordion-body collapse in">
										  <div class="accordion-inner">
											<?php 
											    $id = 11;
												$rawData1=Yii::app()->db->createCommand('select p.id,productname,image,idsouscategory,idcategory from igu_products p,igu_sous_category s where s.id= p.idsouscategory and s.id =:id order by 2');
												$rawData1->bindParam(":id",$id,PDO::PARAM_STR);
                                                $rawData = $rawData1->queryAll();
												foreach($rawData as $row){
												$link = '?r=iguClientProduct&search=2&id='.$row["idcategory"].'&idsub='.$row["idsouscategory"].'&idprod='.$row["id"].'';
												$image = './images/products/'.$row["image"].' ';
											    echo '<div class="span3 well"><a href='.$link.'> <img src='.$image.'/><p><center>'.$row["productname"].'</center><p/></a></div>';	}
												?>
										  </div>
										</div>
									  </div>
							</div>	
							<!-- ---------------------------------------- end Ibihingwa Ngandurabukungu ------------------------------------------ -->
							
							<!-- ----------------------------------- Ibihingwa Ibihingwa Ngandurarugo    -------------------------------------------------- -->
							<div class="tab-pane" id="blue">
							       <div class="accordion-group">
										<div class="accordion-heading" style='background:#F8F8F8'>
										  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
											Ibihingwa Ibihingwa Ngandurarugo
										  </a>
										</div>
										<div id="collapseOne" class="accordion-body collapse in">
										  <div class="accordion-inner">
											<?php 
											    $id = 10;
												$rawData1=Yii::app()->db->createCommand('select p.id,productname,image,idsouscategory,idcategory from igu_products p,igu_sous_category s where s.id= p.idsouscategory and s.id =:id order by 2');
												$rawData1->bindParam(":id",$id,PDO::PARAM_STR);
                                                $rawData = $rawData1->queryAll();
												foreach($rawData as $row){
												$link = '?r=iguClientProduct&search=2&id='.$row["idcategory"].'&idsub='.$row["idsouscategory"].'&idprod='.$row["id"].'';
												$image = './images/products/'.$row["image"].' ';
											    echo '<div class="span3 well"><a href='.$link.'> <img src='.$image.'/><p><center>'.$row["productname"].'</center><p/></a></div>';		}
												?>
										  </div>
										</div>
									  </div>
							</div>	
							<!-- ---------------------------------------- end Ibihingwa Ibihingwa Ngandurarugo ------------------------------------------ -->
							
							<!-- ----------------------------------- Amatungo    -------------------------------------------------- -->
							<div class="tab-pane" id="white">
							       <div class="accordion-group">
										<div class="accordion-heading" style='background:#F8F8F8'>
										  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
											Amatungo
										  </a>
										</div>
										<div id="collapseOne" class="accordion-body collapse in">
										  <div class="accordion-inner">
											<?php 
												
												$id1 = 4;
												$id2 = 5;
												$id3 = 6;
												$id4 = 7;
												$rawData1=Yii::app()->db->createCommand('select p.id,productname,image,idsouscategory,idcategory from igu_products p,igu_sous_category s where s.id= p.idsouscategory and s.id in(:id1,:id2,:id3,:id4)');
												$rawData1->bindParam(":id1",$id1,PDO::PARAM_STR);
												$rawData1->bindParam(":id2",$id2,PDO::PARAM_STR);
												$rawData1->bindParam(":id3",$id3,PDO::PARAM_STR);
												$rawData1->bindParam(":id4",$id4,PDO::PARAM_STR);
                                                $rawData = $rawData1->queryAll();
												foreach($rawData as $row){
												$link = '?r=iguClientProduct&search=2&id='.$row["idcategory"].'&idsub='.$row["idsouscategory"].'&idprod='.$row["id"].'';
												$image = './images/products/'.$row["image"].' ';
											    echo '<div class="span3 well"><a href='.$link.'><img src='.$image.'/><p><center>'.$row["productname"].'</center><p/></a></div>';
												}
												
												?>
										  </div>
										</div>
									  </div>
							</div>	
							<!-- ---------------------------------------- end amatungo ------------------------------------------ -->
							
							
							
						<script type="text/javascript">
							jQuery(document).ready(function ($) {
							$('#tabs').tab();
							});
						</script>    
					 
					<script type="text/javascript" src="bootstrap.js"></script>
		</div>
		</div>
</div><!--/row-->


<div class="span2">
			
			<div class="well">
			       <img src="images/pub/mtn.jpg">
			</div> 
			
			<div class="well">
			       <img src="images/pub/minagri.jpg">
			</div> 
			
</div>
			
			 
			 
