<?php
$model = new IguClientProduct;
$quesionsDataProvider=new CActiveDataProvider('IguClientProduct', array(
            'criteria'=>array(
                'with'=>array('IguImageProduct'=>array( 
                        'on'=>'IguImageProduct.idclientproduct=IguClientProduct.id', 
                        'together'=>true,
                        'joinType'=>'INNER JOIN', 
                )),
            ),
            'pagination'=>array(
                'pageSize'=>10,
            ),
        ));
$this->widget('ext.isotope.Isotope',array(
    'dataProvider'=>$quesionsDataProvider,
    'itemView'=>'_viewPublicProducts',
    'itemSelectorClass'=>'item',
    'options'=>array(), // options for the isotope jquery
    'infiniteScroll'=>false, // default to true
    'infiniteOptions'=>array(), // javascript options for infinite scroller
    'id'=>'wall',
));
