<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model) => array('view', 'id' => GxActiveRecord::extractPkValue($model, true)),
	Yii::t('app', 'Update'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Amamaza ') . ' ' . IguClientProduct::label(), 'url' => array('create')),

);

$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Amamaza', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
		array('label'=>'Ibicuruzwa', 'icon'=>'icon-search', 'url'=>Yii::app()->controller->createUrl('admin'), 'linkOptions'=>array()),
	),
));
$this->endWidget();
?>
<h3><?php echo Yii::t('app', 'Guhindura') . ' ' . GxHtml::encode($model->label()); ?></h3>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>