<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'igu-voucher-management-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'idagent'); ?>
		<?php echo $form->dropDownList($model, 'idagent', GxHtml::listDataEx(IguAgents::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idagent'); ?>
		</div><!-- row -->
		
		 <div class="row">
		<?php echo $form->labelEx($model,'Number'); ?>
		<input type="text" name="number" class="row" />
		<span style='color:red'><?php echo $form->error($model,'idvoucher'); ?></span>
		<div/>
		
		<div class="row">
		<?php 
		$model2=new IguCredit;
		echo $form->labelEx($model2,'Credit'); ?>
		<?php 
		echo $form->dropDownList($model2, 'id', GxHtml::listDataEx(IguCredit::model()->findAllAttributes(null, true)), array('prompt'=>'Select Credit')); ?>
		<?php echo $form->error($model2,'id'); ?>
		</div><!-- row -->
		
		
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->