<?php

class IguVoucherManagementController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('index', 'view','adminAgent','saleVoucher'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create', 'update', 'admin', 'delete'),
				'expression'=>'$user->status == 2',
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'IguVoucherManagement'),
		));
	}
	
    public function actionSaleVoucher() {
	
		$model = new IguCredit;


		if (isset($_POST['IguCredit']['id'])) {
					
					$this->redirect(array('saleVoucher', 'id' => $_POST['IguCredit']['id']));
			}

		$this->render('saleVoucher', array( 'model' => $model));
		
	}
	
	public function actionCreate() {
		$model = new IguVoucherManagement;
            $transaction = Yii::app()->db->beginTransaction();
				$ok = null;
				
				if (isset($_POST['IguVoucherManagement'])) {
				
				     $n = $_POST['number'];
				     $idcredit = $_POST['IguCredit']['id'];
                     $numofcarte=Yii::app()->db->createCommand('SELECT count(*) count FROM igu_voucher where idcredit='.$idcredit.' and status=0')->queryScalar();
         			 if($numofcarte >= $n){
					
					 $selectSql = 'SELECT id FROM igu_voucher where idcredit='.$idcredit.' and status=0 limit '.$n; 
					 $data=Yii::app()->db->createCommand($selectSql)->queryAll();
                     try
                     { 
					 foreach($data as $row){
					
					 $insertSql = 'insert into igu_voucher_management(idagent,idvoucher,givendate) values('.$_POST['IguVoucherManagement']['idagent'].','.$row['id'].',now())';
					 $createSql = Yii::app()->db->createCommand($insertSql);
					 $ok = $createSql->execute();
					  if ($ok) {
					  $updateSql = 'update igu_voucher set status=1 where id='.$row['id'];
					  $editSql = Yii::app()->db->createCommand($updateSql);
					  $ok = $editSql->execute();
					  
					  }
					 } 
					 if($ok){
					    $transaction->commit();
						if (Yii::app()->getRequest()->getIsAjaxRequest())
							Yii::app()->end();
						else
							$this->redirect(array('admin'));
					 }
				   }
					catch(CDbException $ce)
				     {
						   $transaction->rollback();
						   $model->addError('', $ce);
					 }
					 }else{
					 
					 $model->addError('idvoucher', 'You resqested more than existe.');
					 
					 }
					
			}
        
	

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'IguVoucherManagement');


		if (isset($_POST['IguVoucherManagement'])) {
			$model->setAttributes($_POST['IguVoucherManagement']);

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
			$this->loadModel($id, 'IguVoucherManagement')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('IguVoucherManagement');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new IguVoucherManagement('search');
		$model->unsetAttributes();

		if (isset($_GET['IguVoucherManagement']))
			$model->setAttributes($_GET['IguVoucherManagement']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
   public function actionAdminAgent() {
		$model = new IguVoucherManagement('voucherByAgent');
		$model->unsetAttributes();

		if (isset($_GET['IguVoucherManagement']))
			$model->setAttributes($_GET['IguVoucherManagement']);

		$this->render('adminAgent', array(
			'model' => $model,
		));
	}
}