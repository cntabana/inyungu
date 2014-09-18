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
		<?php echo $form->label($model, 'idclient'); ?>
		<?php echo $form->dropDownList($model, 'idclient', GxHtml::listDataEx(IguRegistration::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idproduct'); ?>
		<?php echo $form->textField($model, 'idproduct'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cashinvested'); ?>
		<?php echo $form->textField($model, 'cashinvested'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cashprofit'); ?>
		<?php echo $form->textField($model, 'cashprofit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'year'); ?>
		<?php echo $form->textField($model, 'year'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
