<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('idsouscategory')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idsouscategory0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('productname')); ?>:
	<?php echo GxHtml::encode($data->productname); ?>
	<br />

</div>