<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'imirenge-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'umurenge'); ?>
		<?php echo $form->textField($model, 'umurenge', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'umurenge'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'iddistrict'); ?>
		<?php echo $form->dropDownList($model, 'iddistrict', GxHtml::listDataEx(IguDistrict::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'iddistrict'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->