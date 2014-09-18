<?php

$this->breadcrumbs = array(
	IguRegistration::label(2),
	Yii::t('app', 'Index'),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Update') . ' ' . IguRegistration::label(2), 'url'=>array('update', 'id' => $model->id)),
);
?>

<h3><?php echo GxHtml::encode(IguRegistration::label(2)); ?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 