<?php
$this->widget('zii.widgets.grid.CGridView', array(
			/*'type'=>'striped bordered condensed',*/
			'htmlOptions'=>array('class'=>'table table-striped table-bordered table-condensed'),
			'dataProvider'=>$dataProvider,
			'template'=>"{items}",
			'columns'=>array(
				array('class'=>'IndexColumn', 'header'=>'#'),
				array('name'=>'district', 'header'=>'Akarere', 'type'=>'raw'),
				array('name'=>'productname', 'header'=>'Ibicuruzwa'),
				array('name'=>'quantity', 'header'=>'Ingano'),
				array('name'=>'mesure', 'header'=>'igipimo', 'type'=>'raw'),
				
							),
		)); 

?>