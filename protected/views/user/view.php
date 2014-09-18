<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

?>

<h3><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'username',
//'password',
'status',
//'salt',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('iguRegistrations')); ?></h2>
<?php
$umwirondoro = 'Urashaka kureba umwirondoro we? Kanda hano';
	echo GxHtml::openTag('ul');
	foreach($model->iguRegistrations as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode($umwirondoro), array('iguRegistration/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>