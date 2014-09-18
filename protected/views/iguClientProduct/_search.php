<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idproduct'); ?>
		<?php echo $form->dropDownList($model, 'idproduct', GxHtml::listDataEx(IguProducts::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idclient'); ?>
		<?php echo $form->dropDownList($model, 'idclient', GxHtml::listDataEx(IguRegistration::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'currentprice'); ?>
		<?php echo $form->textField($model, 'currentprice'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'creationdate'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'creationdate',
			'value' => $model->creationdate,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'quantity'); ?>
		<?php echo $form->textField($model, 'quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'totalamount'); ?>
		<?php echo $form->textField($model, 'totalamount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'detail'); ?>
		<?php echo $form->textArea($model, 'detail'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
