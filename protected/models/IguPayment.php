<?php

Yii::import('application.models._base.BaseIguPayment');

class IguPayment extends BaseIguPayment
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}