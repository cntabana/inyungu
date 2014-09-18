<?php

class UserController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
	        array('allow', 
				'actions'=>array('create','subscription'),
				'users'=>array('*'),
		   ),
			array('allow', 
				'actions'=>array('index', 'view','changepswd'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'createAdmin','update', 'admin', 'delete'),
				'expression'=>'$user->status == 2',
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'User'),
		));
	}
     
	 public function actionSubscription() {
	       $model = new User;
		$this->render('subscription');
	}

	public function actionCreate() {
		$model = new User;
        

		if (isset($_POST['User'])) {
			$model->setAttributes($_POST['User']);
            
			$obj = Yii::app()->db->createCommand('SELECT count(*) FROM user where  username=:iduser');
		    $obj->bindParam(":iduser",$_POST['User']['username'],PDO::PARAM_STR);
            $check = $obj->queryScalar();
			
			if($check == 0){
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('subscription','create' =>2));
			}
		}else{
			      $model->addError('', '<h4>Iri zina <u>'.$_POST['User']['username'].'</u> ryarafashwe.Mushobora gukoresha irindi.</h4>');
			}
		}
        
		$this->render('create', array( 'model' => $model));
	}
	public function actionCreateAdmin() {
		$model = new User;
        

		if (isset($_POST['User'])) {
			$model->setAttributes($_POST['User']);

			
				if ($model->save()) {
					if (Yii::app()->getRequest()->getIsAjaxRequest()){
						Yii::app()->end();
						}
					else{
						if($model->status==3)
						$this->redirect(array('iguAgents/create', 'iduser' => $model->id));
						else if($model->status==1)
						$this->redirect(array('iguRegistration/create', 'iduser' => $model->id));
						else
						$this->redirect(array('view', 'id' => $model->id));
					}
				}
			
		}
       
		$this->render('createUser', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'User');


		if (isset($_POST['User'])) {
			$model->setAttributes($_POST['User']);

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
			$this->loadModel($id, 'User')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('User');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new User('search');
		$model->unsetAttributes();

		if (isset($_GET['User']))
			$model->setAttributes($_GET['User']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	public function actionGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
             if(isset($session['User_records']))
               {
                $model=$session['User_records'];
               }
               else
                 $model = User::model()->findAll();

		
		Yii::app()->request->sendFile(date('YmdHis').'.xls',
			$this->renderPartial('excelReport', array(
				'model'=>$model
			), true)
		);
	}
 public function actionGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.modules.admin.extensions.giiplus.bootstrap.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');

             if(isset($session['User_records']))
               {
                $model=$session['User_records'];
               }
               else
                 $model = User::model()->findAll();



		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('User Report');
		$pdf->SetSubject('User Report');
		//$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Report", '');
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 0);
		$pdf->SetFont('dejavusans', '', 7);
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output("User_002.pdf", "I");
	}
	                      
	public function actionChangepswd($id) {
	   
		$model = $this->loadModel($id, 'User');
        $obj = Yii::app()->db->createCommand('SELECT password FROM user where  id=:iduser');
		$obj->bindParam(":iduser",$id,PDO::PARAM_STR);
        $pswd = $obj->queryRow();
       
		if (isset($_POST['User'])) {
		 if($pswd['password'] != $_POST['User']['password'] ){
			$model->setAttributes($_POST['User']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
		else{
	        $this->redirect(array('view', 'id' => $model->id));
	    }
    }
		$this->render('changepswd', array(
				'model' => $model,
				));
	}
}