<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'igu-companytype-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'companytype'); ?>
		<?php echo $form->textField($model, 'companytype', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'companytype'); ?>
		</div><!-- row -->

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->