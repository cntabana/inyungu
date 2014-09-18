<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('firstname')); ?>:
	<?php echo GxHtml::encode($data->firstname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lastname')); ?>:
	<?php echo GxHtml::encode($data->lastname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('telephone')); ?>:
	<?php echo GxHtml::encode($data->telephone); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('datedinscription')); ?>:
	<?php echo GxHtml::encode($data->datedinscription); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('iddistrict')); ?>:
	<?php echo GxHtml::encode($data->iddistrict); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('idumurenge')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idumurenge0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('sector')); ?>:
	<?php echo GxHtml::encode($data->sector); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('identite')); ?>:
	<?php echo GxHtml::encode($data->identite); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idcompanytype')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idcompanytype0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('numberofmembers')); ?>:
	<?php echo GxHtml::encode($data->numberofmembers); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nameofcooperative')); ?>:
	<?php echo GxHtml::encode($data->nameofcooperative); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('iduser')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->iduser0)); ?>
	<br />
	*/ ?>

</div>