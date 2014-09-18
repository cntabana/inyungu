<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'igu-voucher-form',
	'method'=>'post',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
    <div class="row">
	<?php echo $form->labelEx($model,'Number'); ?>
	<input type="text" name="number" class="row" />

	<div/>
	<div class="row">
		<?php echo $form->labelEx($model,'idcredit'); ?>
		<?php //echo $form->textField('number'); ?>
		<?php echo $form->dropDownList($model, 'idcredit', GxHtml::listDataEx(IguCredit::model()->findAllAttributes(null, true)), array('prompt'=>'Select Credit')); ?>
		<?php echo $form->error($model,'idcredit'); ?>
		</div><!-- row -->

<?php
echo GxHtml::submitButton(Yii::t('app', 'Generating voucher'));
$this->endWidget();
?>
</div><!-- form -->