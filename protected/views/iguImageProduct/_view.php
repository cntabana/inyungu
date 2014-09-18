<div class="view">

	<?php echo CHtml::image(Yii::app()->request->baseUrl.'/products/'.$data->image,"image",array("width"=>200)); ?> 
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idclientproduct')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idclientproduct0->idproduct0->productname)); ?>
	<br />

</div>