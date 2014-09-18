<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('umurenge')); ?>:
	<?php echo GxHtml::encode($data->umurenge); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('iddistrict')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->iddistrict0)); ?>
	<br />

</div>