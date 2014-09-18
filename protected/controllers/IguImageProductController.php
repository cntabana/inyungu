<?php

class IguImageProductController extends GxController {

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
				'actions'=>array('minicreate', 'create','update'),
				'users'=>array('@'),
				),
			array('allow',
				'actions'=>array('index','view','admin','delete'),
				'expression'=>'$user->status == 2',
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'IguImageProduct'),
		));
	}

	public function actionCreate()
    {
        $model=new IguImageProduct;  // this is my model related to table
        if(isset($_POST['IguImageProduct']))
        {
            $rnd = rand(0,999999999);  // generate random number between 0-9999
            $model->attributes=$_POST['IguImageProduct'];
 
            $uploadedFile=CUploadedFile::getInstance($model,'image');
			if(empty($uploadedFile)){
			$fileName = 'default.jpg';
			$model->image = $fileName;
			}
			else{
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->image = $fileName;
            }
            if($model->save())
            {
			    if($fileName != 'default.jpg')
                $uploadedFile->saveAs(Yii::app()->basePath.'/../products/'.$fileName);  // image will uplode to rootDirectory/banner/
                $this->redirect(array('iguClientProduct/view', 'id' => $_GET['id']));
            }
        }
        $this->render('create',array(
            'model'=>$model,
        ));
    }

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'IguImageProduct');
        $get = Yii::app()->db->createCommand('SELECT idclientproduct FROM igu_image_product where id='.$id)->queryAll();
		foreach($get as $row);
		$idproductclient = $row['idclientproduct'];
        if(isset($_POST['IguImageProduct']))
        {
            $_POST['IguImageProduct']['image'] = $model->image;
            $model->attributes=$_POST['IguImageProduct'];
 
            $uploadedFile=CUploadedFile::getInstance($model,'image');
 
            if($model->save())
            {
                if(!empty($uploadedFile))  // check if uploaded file is set or not
                {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../products/'.$model->image);
                }
                $this->redirect(array('iguClientProduct/view', 'id' => $idproductclient));
            }
 
        }
 
        $this->render('update',array(
            'model'=>$model,
        ));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'IguImageProduct')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('IguImageProduct');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new IguImageProduct('search');
		$model->unsetAttributes();

		if (isset($_GET['IguImageProduct']))
			$model->setAttributes($_GET['IguImageProduct']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}