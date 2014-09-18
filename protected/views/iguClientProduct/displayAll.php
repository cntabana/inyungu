<h3><?php echo Yii::t('app', 'Reba') . ' ' . GxHtml::encode($model->label()) ; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
array(
			'name' => 'idproduct0',
			'type' => 'raw',
			'value' => GxHtml::valueEx($model->idproduct0),
			),
			
			'igiciro',
			'ingano',
			'igiciroCyose',
			'idclient0.name',
			'idclient0.telephone',
			'idclient0.email',
			'creationdate',
			'idclient0.idumurenge0.iddistrict0.idprovince0.province',
			'idclient0.idumurenge0.iddistrict0.district',
			'idclient0.idumurenge0.umurenge',
			'idclient0.akagali',
			'idclient0.umudugudu',
			'idclient0.nameofcooperative',
			'detail',
	),
)); ?>

	
	  <?php
	 $i=1;
	foreach($model->iguImageProducts as $relatedModel) {
	?>
	<div class="span3 well">
	  <?php
        
        echo CHtml::image(Yii::app()->request->baseUrl.'/products/'.GxHtml::valueEx($relatedModel),"image",array("width"=>200));
		echo '&nbsp;';
		if($i%4 == 0)
	      echo '<br/>';
		
		$i++;
?> 

	</div><!--/span-->
	<?php
		}
	
?>



		