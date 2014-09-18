<?php

class IguRegistrationController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update','registration','GeneratePdf','GenerateExcel'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				'expression'=>'$user->status == 2',
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'IguRegistration'),
		));
	}
   public function actionRegistration($id) {
	            
	  
       $this->render('registration', array(
			'model' => IguRegistration::model()->find("iduser=".Yii::app()->session['iduser']),
		));
	}
	public function actionCreate() {
		$model = new IguRegistration;


		if (isset($_POST['IguRegistration'])) {
			$model->setAttributes($_POST['IguRegistration']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('iguPayment/create', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
	   
	    $row = Yii::app()->db->createCommand('SELECT id FROM igu_registration where iduser='.Yii::app()->session['iduser'])->queryRow();
		if($row['id'] == $id)
		$idedit =$id;
		else
		$idedit = $row['id'];
		
		$model = $this->loadModel($idedit, 'IguRegistration');


		if (isset($_POST['IguRegistration'])) {
			$model->setAttributes($_POST['IguRegistration']);

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
			$this->loadModel($id, 'IguRegistration')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('IguRegistration');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new IguRegistration('search');
		$model->unsetAttributes();

		if (isset($_GET['IguRegistration']))
			$model->setAttributes($_GET['IguRegistration']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}