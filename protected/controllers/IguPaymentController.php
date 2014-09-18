<?php

class IguPaymentController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('index', 'view', 'create', 'admin'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'update', 'delete'),
				'expression'=>'$user->status == 2',
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'IguPayment'),
		));
	}

	public function actionCreate() {
		$model = new IguPayment;
                $transaction = Yii::app()->db->beginTransaction();
				$ok = null;
        try{
		
		if (isset($_POST['IguPayment'])) {
			$model->setAttributes($_POST['IguPayment']);
            $voucher = $_POST['IguPayment']['vouchernumber'];
			$check = Yii::app()->db->createCommand('SELECT count(*) FROM igu_registration where  iduser='.Yii::app()->session['iduser'])->queryScalar();
			
			if($voucher != ""){
			$checkExistance=Yii::app()->db->createCommand('SELECT count(*) count FROM igu_voucher where vouchernumber ='.$voucher)->queryScalar();
			$checkUsed=Yii::app()->db->createCommand('SELECT count(*) count FROM igu_payment where vouchernumber ='.$voucher)->queryScalar();
			$checkUsed2=Yii::app()->db->createCommand('SELECT count(*) count FROM igu_voucher where status=2 and vouchernumber ='.$voucher)->queryScalar();
			
			
             if($checkExistance == 1){
			    if( $checkUsed == 0 || $checkUsed2 == 0){
				    if($check != 0){
					    $idclient = Yii::app()->db->createCommand('SELECT id FROM igu_registration where  iduser='.Yii::app()->session['iduser'])->queryRow();
			            $checkclient=Yii::app()->db->createCommand('SELECT count(*) count FROM igu_payment where idclient ='.$idclient['id'])->queryScalar();
			
						if ($model->save()) {
						   try
							 { 
								  $updateSql = 'update igu_voucher set status=2 where vouchernumber ='.$voucher;
								 
								  $editSql = Yii::app()->db->createCommand($updateSql);
								  $ok = $editSql->execute();
								  if($ok){
								  if($checkclient >0){
								   $updatePaymentTable = 'update igu_payment set validity=1 where idclient='.$idclient['id'].' and vouchernumber !='.$voucher;
								   $editPaymentTable = Yii::app()->db->createCommand($updatePaymentTable);
								   $ok = $editPaymentTable->execute();
								  }
								}  
								  if($ok){
								  $transaction->commit();
								if (Yii::app()->getRequest()->getIsAjaxRequest())
									Yii::app()->end();
								else
									$this->redirect(array('iguClientProduct/create'));
									}
								}
								Catch(CDbException $ce)
								 {
									   $transaction->rollback();
									   $model->addError('', $ce);
								 }
							
						}
						}//check
						else{
						   $model->addError('', '<h4>Banza wuzuze umwirondoro,mbere yo kwishyura.</h4>');
						}
				}else{
				   $model->addError('vouchernumber', '<h4>Iyi numero yarakoreshejwe.Ongera ugerageze</h4>');
				}
			}else{
			   $model->addError('vouchernumber', '<h4>Iyi numero ntibaho</h4>');
			}
		}
		else{
			   $model->addError('vouchernumber', '<h4>Shyiramo nimero yawe</h4>');
			}
     }
	 }catch(Exception $e){
	     $model->addError('', '<h4>numero igomba kuba igizwe n imibare gusa.</h4>');
	 }
		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'IguPayment');


		if (isset($_POST['IguPayment'])) {
			$model->setAttributes($_POST['IguPayment']);

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
			$this->loadModel($id, 'IguPayment')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('IguPayment');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new IguPayment('search');
		$model->unsetAttributes();

		if (isset($_GET['IguPayment']))
			$model->setAttributes($_GET['IguPayment']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}