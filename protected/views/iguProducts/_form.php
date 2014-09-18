<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'igu-products-form',
	'enableAjaxValidation' => false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
));
 echo Yii::app()->basePath.'../products/';
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'idsouscategory'); ?>
		<?php echo $form->dropDownList($model, 'idsouscategory', GxHtml::listDataEx(IguSousCategory::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idsouscategory'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'productname'); ?>
		<?php echo $form->textField($model, 'productname', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'productname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo CHtml::activeFileField($model, 'image'); ?>
		<?php echo $form->error($model,'image'); ?>
		</div><!-- row -->
       <?php if($model->isNewRecord!='1'){ ?>
		<div class="row">
			 <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/products/'.$model->image,"image",array("width"=>200)); ?> 
		</div>
		
		<?php
          
		}?>
	
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->