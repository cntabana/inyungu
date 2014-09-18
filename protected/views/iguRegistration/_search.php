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
		<?php echo $form->label($model, 'firstname'); ?>
		<?php echo $form->textField($model, 'firstname', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lastname'); ?>
		<?php echo $form->textField($model, 'lastname', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'telephone'); ?>
		<?php echo $form->textField($model, 'telephone', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'datedinscription'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'datedinscription',
			'value' => $model->datedinscription,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'iddistrict'); ?>
		<?php echo $form->textField($model, 'iddistrict'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idumurenge'); ?>
		<?php echo $form->dropDownList($model, 'idumurenge', GxHtml::listDataEx(Imirenge::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'akagali'); ?>
		<?php echo $form->textField($model, 'akagali', array('maxlength' => 20)); ?>
	</div>
    <div class="row">
		<?php echo $form->label($model, 'umudugudu'); ?>
		<?php echo $form->textField($model, 'umudugudu', array('maxlength' => 20)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model, 'identite'); ?>
		<?php echo $form->textField($model, 'identite', array('maxlength' => 16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idcompanytype'); ?>
		<?php echo $form->dropDownList($model, 'idcompanytype', GxHtml::listDataEx(IguCompanytype::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'numberofmembers'); ?>
		<?php echo $form->textField($model, 'numberofmembers'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nameofcooperative'); ?>
		<?php echo $form->textField($model, 'nameofcooperative', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'iduser'); ?>
		<?php echo $form->dropDownList($model, 'iduser', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
