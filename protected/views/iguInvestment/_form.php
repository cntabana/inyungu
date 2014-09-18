<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'igu-investment-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'idclient'); ?>
		<?php echo $form->dropDownList($model, 'idclient', GxHtml::listDataEx(IguRegistration::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idclient'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idproduct'); ?>
		<?php echo $form->textField($model, 'idproduct'); ?>
		<?php echo $form->error($model,'idproduct'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cashinvested'); ?>
		<?php echo $form->textField($model, 'cashinvested'); ?>
		<?php echo $form->error($model,'cashinvested'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cashprofit'); ?>
		<?php echo $form->textField($model, 'cashprofit'); ?>
		<?php echo $form->error($model,'cashprofit'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model, 'year'); ?>
		<?php echo $form->error($model,'year'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->