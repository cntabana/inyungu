<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'igu-credit-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'cash'); ?>
		<?php echo $form->textField($model, 'cash'); ?>
		<?php echo $form->error($model,'cash'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'days'); ?>
		<?php echo $form->textField($model, 'days'); ?>
		<?php echo $form->error($model,'days'); ?>
		</div><!-- row -->

		
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->