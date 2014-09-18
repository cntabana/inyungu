<?php
if($_GET['id'] == Yii::app()->session['iduser'] && Yii::app()->user->status == 1){
		$this->menu=array(
			
			array('label'=>Yii::t('app', 'Guhindura') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
		);
}
?>
<h3><?php echo Yii::t('app', 'Reba') . ' ' . GxHtml::encode($model->label()); ?></h3>
<?php
if($_GET['id'] == Yii::app()->session['iduser']){
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Update', 'icon'=>'icon-edit', 'url'=>Yii::app()->controller->createUrl('update&id='.$model->id), 'linkOptions'=>array()),
    ),
));
$this->endWidget();
}
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
	'id',
	'nameofcooperative',
	'firstname',
	'lastname',
	'telephone',
	'datedinscription',
	'email',
	'idumurenge0.umurenge',
	'akagali',
	'umudugudu',
	'identite',
	'idcompanytype0.companytype',
	'numberofmembers',

	),
)); ?>

