<?php

/**
 * This is the model base class for the table "imirenge".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Imirenge".
 *
 * Columns in table "imirenge" available as properties of the model,
 * followed by relations of table "imirenge" available as properties of the model.
 *
 * @property integer $id
 * @property string $umurenge
 * @property integer $iddistrict
 *
 * @property IguDistrict $iddistrict0
 */
abstract class BaseImirenge extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'imirenge';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Imirenge|Imirenges', $n);
	}

	public static function representingColumn() {
		return 'umurenge';
	}

	public function rules() {
		return array(
			array('umurenge, iddistrict', 'required'),
			array('iddistrict', 'numerical', 'integerOnly'=>true),
			array('umurenge', 'length', 'max'=>30),
			array('id, umurenge, iddistrict', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'iddistrict0' => array(self::BELONGS_TO, 'IguDistrict', 'iddistrict'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'umurenge' => Yii::t('app', 'Umurenge'),
			'iddistrict' => null,
			'iddistrict0' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('umurenge', $this->umurenge, true);
		$criteria->compare('iddistrict', $this->iddistrict);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}