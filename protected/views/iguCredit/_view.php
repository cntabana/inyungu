<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('cash')); ?>:
	<?php echo GxHtml::encode($data->cash); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('days')); ?>:
	<?php echo GxHtml::encode($data->days); ?>
	<br />

</div>