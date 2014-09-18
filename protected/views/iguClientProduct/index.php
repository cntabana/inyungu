<?php
$model = new IguClientProduct;
$b = $model->searchArray();

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . IguClientProduct::label(), 'url' => array('create')),

);
 $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); 
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>"Shakisha",
			));

		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'name'=>'productname',
			'source'=>$b,
			// additional javascript options for the autocomplete plugin
			'options'=>array(
				'minLength'=>'2',
			),
			'htmlOptions'=>array(
				'style'=>'height:20px;width:60%'
			),
		));
		echo '&nbsp;&nbsp;&nbsp;'.GxHtml::submitButton(Yii::t('app', 'Search')); 
		$this->endWidget();

$this->endWidget();
?>
	
<h3><?php echo GxHtml::encode(IguClientProduct::label(2)); ?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 