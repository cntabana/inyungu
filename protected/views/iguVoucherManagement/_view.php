<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('idagent')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idagent0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idvoucher')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idvoucher0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('useddate')); ?>:
	<?php echo GxHtml::encode($data->useddate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('givendate')); ?>:
	<?php echo GxHtml::encode($data->givendate); ?>
	<br />

</div>