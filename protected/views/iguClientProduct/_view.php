<div class="view">

	<b><?php echo "Ikigurishwa"; ?></b>:
	<?php echo $data['productname'];?>
	<br />
	<b><?php echo 'Ingano'; ?></b>:
	<?php echo GxHtml::encode(number_format($data['quantity'],0,",",".").' '.$data['mesure']); ?>
	<br />
	<b><?php echo 'Igiciro'; ?></b>:
	<?php echo GxHtml::encode(number_format($data['currentprice'],0,",",".")).' frw'; ?>
	<br />
	<b><?php echo 'Intara'; ?></b>:
	<?php echo $data['province']; ?>
	<br />
	<b><?php echo 'Akarere'; ?></b>:
	<?php echo $data['district']; ?>
	<br />
	<b><?php echo 'Umurenge'; ?></b>:
	<?php echo $data['umurenge']; ?>
	<br />
	<b><?php echo 'Amafaranga yose'; ?></b>:
	<?php echo GxHtml::encode(number_format($data['totalamount'],0,",",".")).' frw'; ?>
	<br />
	<i><b><?php echo GxHtml::link(GxHtml::encode('Kanda hano urebe neza'), array('displayAll', 'id' => $data['id'], 'st'=>2)); ?></b></i>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('detail')); ?>:
	<?php echo GxHtml::encode($data->detail); ?>
	<br />
	*/ ?>

</div>