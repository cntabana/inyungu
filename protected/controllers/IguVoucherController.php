<?php

class IguVoucherController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('delete'),
				'users'=>array('inyunguperson'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create', 'update', 'admin','index', 'view'),
				'users'=>array('administrator','admin'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'IguVoucher'),
		));
	}

	public function actionCreate() {
		
		    $model = new IguVoucher; 
		
            
				$executeQuery = null;
				if (isset($_POST['IguVoucher'])) {
				$n = $_POST['number'];				
				for($i=0;$i<$n;$i++){
					 
					$a=mt_rand(100000000,999999999);
					$mod1= substr($a,0,3)%10;
					$mod2= substr($a,3,3)%10;
					$mod3= substr($a,6,3)%10;
					$voucher = $a.$mod2.$mod3.$mod1;
								
					 
					 $check=Yii::app()->db->createCommand('SELECT count(*) count FROM igu_voucher where vouchernumber='.$voucher)->queryScalar();
                     if($check == 0){
					 $sql = 'insert into igu_voucher(vouchernumber,idcredit) values('.$voucher.','.$_POST['IguVoucher']['idcredit'].')';
					 $createSql = Yii::app()->db->createCommand($sql);
					 $executeQuery = $createSql->execute();
					 }
				 
					
			}
		}
        if ($executeQuery) {
						if (Yii::app()->getRequest()->getIsAjaxRequest())
							Yii::app()->end();
						else
							$this->redirect(array('admin'));
					}
		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'IguVoucher');


		if (isset($_POST['IguVoucher'])) {
			$model->setAttributes($_POST['IguVoucher']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'IguVoucher')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('IguVoucher');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new IguVoucher('search');
		$model->unsetAttributes();

		if (isset($_GET['IguVoucher']))
			$model->setAttributes($_GET['IguVoucher']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}