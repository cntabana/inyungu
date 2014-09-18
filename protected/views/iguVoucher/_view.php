<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('vouchernumber')); ?>:
	<?php echo GxHtml::encode($data->vouchernumber); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idcredit')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idcredit0)); ?>
	<br />

</div>