<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('subcategory')); ?>:
	<?php echo GxHtml::encode($data->subcategory); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idcategory')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idcategory0)); ?>
	<br />

</div>