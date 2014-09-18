<?php

$this->breadcrumbs = array(
	IguPayment::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(

	array('label'=>Yii::t('app', 'Manage') . ' ' . IguPayment::label(2), 'url' => array('admin')),
);
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
        
		array('label'=>'Manage', 'icon'=>'icon-search', 'url'=>Yii::app()->controller->createUrl('admin'), ,'active'=>true'linkOptions'=>array('class'=>'search-button')),
		),
));
$this->endWidget();
?>

<h3><?php echo GxHtml::encode(IguPayment::label(2)); ?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 