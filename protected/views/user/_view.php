<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('username')); ?>:
	<?php echo GxHtml::encode($data->username); ?>
	<br />
	<?php //echo GxHtml::encode($data->getAttributeLabel('password')); ?>
	<?php //echo GxHtml::encode($data->password); ?>
	
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php //echo GxHtml::encode($data->getAttributeLabel('salt')); ?>
	<?php //echo GxHtml::encode($data->salt); ?>
	

</div>