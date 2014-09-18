<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Kuzuza'),
);


?>

<h4><?php echo Yii::t('app', 'Kuzuza') . ' ' . GxHtml::encode($model->label()); ?></h4>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>