<?php

/**
 * This is the model base class for the table "igu_voucher_management".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "IguVoucherManagement".
 *
 * Columns in table "igu_voucher_management" available as properties of the model,
 * followed by relations of table "igu_voucher_management" available as properties of the model.
 *
 * @property integer $id
 * @property integer $idagent
 * @property integer $idvoucher
 * @property string $useddate
 * @property string $givendate
 *
 * @property IguVoucher $idvoucher0
 * @property IguAgents $idagent0
 */
abstract class BaseIguVoucherManagement extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'igu_voucher_management';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'IguVoucherManagement|IguVoucherManagements', $n);
	}

	public static function representingColumn() {
		return 'givendate';
	}

	public function rules() {
		return array(
			array('idagent, idvoucher, givendate', 'required'),
			array('idagent, idvoucher', 'numerical', 'integerOnly'=>true),
			array('useddate', 'safe'),
			array('useddate', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, idagent, idvoucher, useddate, givendate', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idvoucher0' => array(self::BELONGS_TO, 'IguVoucher', 'idvoucher'),
			'idagent0' => array(self::BELONGS_TO, 'IguAgents', 'idagent'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'idagent' => null,
			'idvoucher' => null,
			'useddate' => Yii::t('app', 'Useddate'),
			'givendate' => Yii::t('app', 'Givendate'),
			'idvoucher0' => null,
			'idagent0' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('idagent', $this->idagent);
		$criteria->compare('idvoucher', $this->idvoucher);
		$criteria->compare('useddate', $this->useddate, true);
		$criteria->compare('givendate', $this->givendate, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	/*public function voucherByAgent() {
		$criteria = new CDbCriteria;
        $idagent = Yii::app()->db->createCommand('SELECT id FROM igu_agents where iduser='.Yii::app()->session['iduser'].')')->queryScalar();
		$criteria->addCondition('id='.$idagent);
		$criteria->compare('id', $this->id);
		$criteria->compare('idagent', $this->idagent);
		$criteria->compare('idvoucher', $this->idvoucher);
		$criteria->compare('useddate', $this->useddate, true);
		$criteria->compare('givendate', $this->givendate, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	*/
}