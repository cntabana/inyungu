<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Create'),
);

$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('saleVoucher'),'active'=>true, 'linkOptions'=>array()),
        
	),
));
$this->endWidget();
?>

<h4><?php echo Yii::t('app', 'Sale') . ' ' . GxHtml::encode("voucher number"); ?></h4>

<?php
$this->renderPartial('_saleVoucher', array(
		'model' => $model,
		'buttons' => 'create'));
?>