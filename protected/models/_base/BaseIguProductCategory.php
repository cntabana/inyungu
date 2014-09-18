<?php

/**
 * This is the model base class for the table "igu_product_category".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "IguProductCategory".
 *
 * Columns in table "igu_product_category" available as properties of the model,
 * followed by relations of table "igu_product_category" available as properties of the model.
 *
 * @property integer $id
 * @property string $category
 *
 * @property IguProducts[] $iguProducts
 * @property IguSousCategory[] $iguSousCategories
 */
abstract class BaseIguProductCategory extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'igu_product_category';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Product Category|Product Categories', $n);
	}

	public static function representingColumn() {
		return 'category';
	}

	public function rules() {
		return array(
			array('category', 'required'),
			array('category', 'length', 'max'=>30),
			array('id, category', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'iguProducts' => array(self::HAS_MANY, 'IguProducts', 'idcategory'),
			'iguSousCategories' => array(self::HAS_MANY, 'IguSousCategory', 'idcategory'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'category' => Yii::t('app', 'Category'),
			'iguProducts' => null,
			'iguSousCategories' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('category', $this->category, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}