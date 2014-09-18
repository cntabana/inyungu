<?php

class IguProductsController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('index', 'view'),
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
			'model' => $this->loadModel($id, 'IguProducts'),
		));
	}

	public function actionCreate() {
		$model = new IguProducts;

		if (isset($_POST['IguProducts'])) {
		$rnd = rand(0,99999); 
		$model->setAttributes($_POST['IguProducts']);

		    $uploadedFile=CUploadedFile::getInstance($model,'image');
			if(empty($uploadedFile)){
			$fileName = 'default.jpg';
			}
			else{
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->image = $fileName;
            }
			if ($model->save()) {
			
				 $uploadedFile->saveAs(Yii::app()->basePath.'/../images/products/'.$fileName);
					$this->redirect(array('view', 'id' => $model->id));
				
			}	
        }
        $this->render('create',array(
            'model'=>$model,
        ));
   }

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'IguProducts');

		$this->performAjaxValidation($model, 'igu-products-form');

		if (isset($_POST['IguProducts'])) {
		    $_POST['IguProducts']['image'] = $model->image;
			$model->setAttributes($_POST['IguProducts']);
            $uploadedFile=CUploadedFile::getInstance($model,'image');
			if ($model->save()) {
				if(!empty($uploadedFile))  // check if uploaded file is set or not
                {
					$uploadedFile->saveAs(Yii::app()->basePath.'/../images/products/'.$model->image);
                }
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'IguProducts')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('IguProducts');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new IguProducts('search');
		$model->unsetAttributes();

		if (isset($_GET['IguProducts']))
			$model->setAttributes($_GET['IguProducts']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}