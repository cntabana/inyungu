<?php

if($_GET['id'] == Yii::app()->session['iduser'] && Yii::app()->user->status == 1){
$this->menu=array(
	array('label'=>Yii::t('app', 'Guhindura') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
);

}
?>

<h3><?php echo Yii::t('app', 'Reba') . ' ' . GxHtml::encode($model->label()) ; ?></h3>
<?php
if($_GET['id'] == Yii::app()->session['iduser'] && Yii::app()->user->status == 1){
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
}else if(Yii::app()->user->status == 2){

$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Manage', 'icon'=>'icon-search', 'url'=>Yii::app()->controller->createUrl('admin'),'active'=>true, 'linkOptions'=>array('class'=>'search-button')),
	
	),
));
$this->endWidget();
}
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
	'id',
	'firstname',
	'lastname',
	'telephone',
	'datedinscription',
	'email',
	'idumurenge0.iddistrict0.district',
	array(
				'name' => 'idumurenge0',
				'type' => 'raw',
				'value' => GxHtml::encode(GxHtml::valueEx($model->idumurenge0)),
				),
	'akagali',
	'umudugudu',
	'identite',
	array(
				'name' => 'idcompanytype0',
				'type' => 'raw',
				'value' => GxHtml::encode(GxHtml::valueEx($model->idcompanytype0)),
				),
	'numberofmembers',
	'nameofcooperative',
	array(
				'name' => 'iduser0',
				'type' => 'raw',
				'value' => GxHtml::encode(GxHtml::valueEx($model->iduser0)),
				),
		),
	)); ?>

