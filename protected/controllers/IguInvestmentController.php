<?php

class IguInvestmentController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'IguInvestment'),
		));
	}

	public function actionCreate() {
		$model = new IguInvestment;

		$this->performAjaxValidation($model, 'igu-investment-form');

		if (isset($_POST['IguInvestment'])) {
			$model->setAttributes($_POST['IguInvestment']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'IguInvestment');

		$this->performAjaxValidation($model, 'igu-investment-form');

		if (isset($_POST['IguInvestment'])) {
			$model->setAttributes($_POST['IguInvestment']);

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
			$this->loadModel($id, 'IguInvestment')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('IguInvestment');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new IguInvestment('search');
		$model->unsetAttributes();

		if (isset($_GET['IguInvestment']))
			$model->setAttributes($_GET['IguInvestment']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}