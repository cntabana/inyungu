<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Grid';
$this->breadcrumbs=array(
	'Abo turibo',
);

 $who_we_are = "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
 $our_mission = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
 $objectif = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
 $cvs    = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
 ?>
  <div class="span14">
  	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"Abo turibo",
		));
		
	?>
    <?php
    $this->widget('zii.widgets.jui.CJuiAccordion', array(
		'panels'=>array(
			'Abo turibo'=>$who_we_are,
			'Icyo tugamije'=>$our_mission,
			'Uko ikora'=>$objectif,
			'Imyirondoro'=>$cvs,
			// panel 5 contains the content rendered by a partial view
			//'panel 5'=>$this->renderPartial('_partial',null,true),
		),
		// additional javascript options for the accordion plugin
		'options'=>array(
			'animated'=>'bounceslide',
		),
	));
	?>
    <?php $this->endWidget();?>
  </div>