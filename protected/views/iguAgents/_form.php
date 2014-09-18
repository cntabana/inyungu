<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'igu-agents-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model, 'firstname', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'firstname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model, 'lastname', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'lastname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'telephone'); ?>
		<?php echo $form->textField($model, 'telephone'); ?>
		<?php echo $form->error($model,'telephone'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'iddistrict'); ?>
		<?php echo $form->dropDownList($model, 'iddistrict', GxHtml::listDataEx(IguDistrict::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'iddistrict'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'sector'); ?>
		<?php echo $form->textField($model, 'sector', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'sector'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'identite'); ?>
		<?php echo $form->textField($model, 'identite'); ?>
		<?php echo $form->error($model,'identite'); ?>
		</div><!-- row -->
		<div class="row">
		<?php //echo $form->labelEx($model,'iduser'); ?>
		<?php echo $form->hiddenField($model, 'iduser',array('value'=>$_GET['iduser'])); ?>
		<?php //echo $form->error($model,'iduser'); ?>
		</div><!-- row -->

	<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->