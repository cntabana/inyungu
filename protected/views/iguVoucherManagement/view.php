<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
        array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
		array('label'=>'Manage', 'icon'=>'icon-search', 'url'=>Yii::app()->controller->createUrl('admin'), 'linkOptions'=>array()),
	),
));
$this->endWidget();
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'idagent0',
			'type' => 'raw',
			'value' => $model->idagent0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idagent0)), array('iguAgents/view', 'id' => GxActiveRecord::extractPkValue($model->idagent0, true))) : null,
			),
array(
			'name' => 'idvoucher0',
			'type' => 'raw',
			'value' => $model->idvoucher0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idvoucher0)), array('iguVoucher/view', 'id' => GxActiveRecord::extractPkValue($model->idvoucher0, true))) : null,
			),
'useddate',
'givendate',
	),
)); ?>

