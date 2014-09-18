<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('idclient')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idclient0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idproduct')); ?>:
	<?php echo GxHtml::encode($data->idproduct); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cashinvested')); ?>:
	<?php echo GxHtml::encode($data->cashinvested); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cashprofit')); ?>:
	<?php echo GxHtml::encode($data->cashprofit); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('year')); ?>:
	<?php echo GxHtml::encode($data->year); ?>
	<br />

</div>