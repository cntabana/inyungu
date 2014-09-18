<?php
Yii::import('ext.*');

class Document extends CComponent
{
  public function Document(){
  echo NJSON::encode(IguProvince::model()->findAll());  
  }
}
?>