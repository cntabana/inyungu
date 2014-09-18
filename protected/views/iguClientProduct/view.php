<?php
$this->menu = array(
	array('label'=>Yii::t('app', 'Amamaza') . ' ' . IguClientProduct::label(), 'url' => array('create')),

);

$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Amamaza', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
		array('label'=>'Ibicuruzwa', 'icon'=>'icon-search', 'url'=>Yii::app()->controller->createUrl('admin'), 'linkOptions'=>array()),
	),
));
$this->endWidget();
?>
<h3><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) ; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'idproduct0',
			'type' => 'raw',
			'value' => $model->idproduct0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idproduct0)), array('iguProducts/view', 'id' => GxActiveRecord::extractPkValue($model->idproduct0, true))) : null,
			),
array(
			'name' => 'idclient0',
			'type' => 'raw',
			'value' => $model->idclient0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idclient0)), array('iguRegistration/view', 'id' => GxActiveRecord::extractPkValue($model->idclient0, true))) : null,
			),
			'igiciro',
			'creationdate',
			'ingano',
			'igiciroCyose',
			'detail',
	),
)); ?>
<div><a href='?r=iguImageProduct/create&id=<?php echo $model->id;?>'>Urashaka kongeraho indi foto? Kanda hano</a></div>
<?php
	 $i=1;
	foreach($model->iguImageProducts as $relatedModel) {
        
        echo GxHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/products/'.GxHtml::valueEx($relatedModel),"image",array("width"=>200)), array('iguImageProduct/update', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo '&nbsp;';
		if($i%5 == 0)
	      echo '<br/>';
		
		$i++;
	}
	
?>

		