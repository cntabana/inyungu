
<h1><?php echo Yii::t('app', 'Shyiramo ifoto'); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>