<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Subscription';
$this->breadcrumbs=array(
	'Subscription',
);

$this->menu=array(
	
	array('label'=>Yii::t('app', 'Login') , 'url'=>array('site/login')),
);
?>
	<div class="well">
        <h3><u><center>Murakoze</center></u></h3>
        <p>
		This is the download page for Mozilla Firefox. If you encounter any problems in accessing the download mirrors for Mozilla Firefox,
		please check your firewall settings or close your download manager.
		</p>
		<p>
		Aha hazajya amabbwiriza y uburyo agomba gukoresha username na password.
		uburyo agomba kwi registaring no gukora payment.
		Muri make uburyo agomba gukoresha iyi application.
		</p>
		<p>
		<h3><a href='?r=site/login'>Kanda hano ubashe kwinjiramo</a></h3>
		</p>
      </div>