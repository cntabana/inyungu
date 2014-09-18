<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('igu-voucher-management-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
	    array('label'=>'Manage', 'icon'=>'icon-search', 'url'=>Yii::app()->controller->createUrl('adminAgent'),'active'=>true, 'linkOptions'=>array()),
	),
));
$this->endWidget();
?>

<h3><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h3>


<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style='display:none'>
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'igu-voucher-management-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
			array(
				'name'=>'idvoucher',
				'value'=>'GxHtml::valueEx($data->idvoucher0->idcredit0)',
				'filter'=>GxHtml::listDataEx(IguCredit::model()->findAllAttributes(null, true)),
				),
		
		'givendate',
		
	),
)); ?>