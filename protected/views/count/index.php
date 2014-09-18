<?php
/* @var $this CountController */

$this->breadcrumbs=array(
	'Count',
);
Yii::app()->counter->refresh();
?>
online: <?php echo Yii::app()->counter->getOnline(); ?><br />
today: <?php echo Yii::app()->counter->getToday(); ?><br />
yesterday: <?php echo Yii::app()->counter->getYesterday(); ?><br />
total: <?php echo Yii::app()->counter->getTotal(); ?><br />
maximum: <?php echo Yii::app()->counter->getMaximal(); ?><br />
