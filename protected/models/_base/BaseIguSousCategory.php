<?php

/**
 * This is the model base class for the table "igu_sous_category".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "IguSousCategory".
 *
 * Columns in table "igu_sous_category" available as properties of the model,
 * followed by relations of table "igu_sous_category" available as properties of the model.
 *
 * @property integer $id
 * @property string $subcategory
 * @property integer $idcategory
 *
 * @property IguProductCategory $idcategory0
 */
abstract class BaseIguSousCategory extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'igu_sous_category';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Sub Category|Sub Categories', $n);
	}

	public static function representingColumn() {
		return 'subcategory';
	}

	public function rules() {
		return array(
			array('subcategory, idcategory', 'required'),
			array('idcategory', 'numerical', 'integerOnly'=>true),
			array('subcategory', 'length', 'max'=>30),
			array('id, subcategory, idcategory', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idcategory0' => array(self::BELONGS_TO, 'IguProductCategory', 'idcategory'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'subcategory' => Yii::t('app', 'Sub Category'),
			'idcategory' => null,
			'idcategory0' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('subcategory', $this->subcategory, true);
		$criteria->compare('idcategory', $this->idcategory);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}