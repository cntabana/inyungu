<?php

$client = Yii::app()->db->createCommand('SELECT id  FROM igu_registration where iduser='.Yii::app()->session['iduser'])->queryRow();
?>
<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'igu-payment-form',
	'enableAjaxValidation' => false,
));
?>


	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php //echo $form->labelEx($model,'idclient'); ?>
		<?php echo $form->hiddenField($model, 'idclient',array('value'=>$client['id'])); ?>
				</div><!-- row -->
		<div class="row">
		<?php //echo $form->labelEx($model,'datepaiement'); ?>
		<?php echo $form->hiddenField($model, 'datepaiement',array('value'=>date('Y-m-d'))); ?>
		<?php echo $form->error($model,'datepaiement'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'vouchernumber'); ?>
		<?php echo $form->textField($model, 'vouchernumber', array('maxlength' => 12)); ?>
		<?php echo $form->error($model,'vouchernumber'); ?>
		
		</div><!-- row -->

<br/>
<?php
echo GxHtml::submitButton(Yii::t('app', 'Ishyura'));
$this->endWidget();
?>
</div><!-- form -->