<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Create'),
);

$this->menu = array(

	array('label'=>Yii::t('app', 'Uko wishyuye') , 'url' => array('admin')),
);
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Uko wishyuye', 'icon'=>'icon-search', 'url'=>Yii::app()->controller->createUrl('admin'), 'active'=>true,'linkOptions'=>array()),
	),
));
$this->endWidget();
?>

<h3><?php echo Yii::t('app', '') . ' ' . GxHtml::encode($model->label()); ?></h3>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>