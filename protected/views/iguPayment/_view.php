<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('idclient')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idclient0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('datepaiement')); ?>:
	<?php echo GxHtml::encode($data->datepaiement); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('vouchernumber')); ?>:
	<?php echo GxHtml::encode($data->vouchernumber); ?>
	<br />

</div>