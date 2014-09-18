<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'igu-sous-category-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'subcategory'); ?>
		<?php echo $form->textField($model, 'subcategory', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'subcategory'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idcategory'); ?>
		<?php echo $form->dropDownList($model, 'idcategory', GxHtml::listDataEx(IguProductCategory::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idcategory'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->