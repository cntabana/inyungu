<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'igu-image-product-form',
	'enableAjaxValidation' => false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
));
$count = Yii::app()->db->createCommand('SELECT count(*) FROM igu_image_product where id='.$_GET['id'])->queryScalar();
if($count ==0){
$id = $_GET['id'];
}
else{
$get = Yii::app()->db->createCommand('SELECT idclientproduct FROM igu_image_product where id='.$_GET['id'])->queryAll();
foreach($get as $row);
$id = $row['idclientproduct'];
}
?>

	<p class="note">
		Niba nayo ufite kanda kuri injiza ukomeze.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo CHtml::activeFileField($model, 'image'); ?>
		<?php echo $form->error($model,'image'); ?>
		<?php echo $form->hiddenField($model, 'idclientproduct',array('value'=>$id)); ?>
		</div><!-- row -->
		
		<?php if($model->isNewRecord!='1'){ ?>
		<div class="row">
			 <?php echo CHtml::image(Yii::app()->request->baseUrl.'/products/'.$model->image,"image",array("width"=>200)); ?> 
		</div>
		
		<?php }?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Injiza'));
$this->endWidget();
?>
</div><!-- form -->