<?php

class IguClientProductController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','displayAll'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update','admin','delete','view'),
				'users'=>array('@'),
				),
			
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'IguClientProduct'),
		));
	}

	public function actionCreate() {
		$model = new IguClientProduct;

		$this->performAjaxValidation($model, 'igu-client-product-form');

		if (isset($_POST['IguClientProduct'])) {
			$model->setAttributes($_POST['IguClientProduct']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('iguImageProduct/create', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'IguClientProduct');

		$this->performAjaxValidation($model, 'igu-client-product-form');

		if (isset($_POST['IguClientProduct'])) {
			$model->setAttributes($_POST['IguClientProduct']);

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
			$this->loadModel($id, 'IguClientProduct')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionAdmin() {
		$model = new IguClientProduct('search');
		$model->unsetAttributes();

		if (isset($_GET['IguClientProduct']))
			$model->setAttributes($_GET['IguClientProduct']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
   public function actionDisplayAll($id) {
		$this->render('displayAll', array(
			'model' => $this->loadModel($id, 'IguClientProduct'),
		));
	}
	
	public function actionIndex() {
	    
 if(!isset($_REQUEST['productname'])){
				 if($_REQUEST['search'] == 2){
					if(isset($_GET['idsub']) && !isset($_GET['idprod'])){
						$dataProvider=new CActiveDataProvider('IguClientProduct',array(
							'criteria' => array(
								'select'    => "idproduct,idclient,totalamount,currentprice,quantity,creationdate" , 
								'with'=>array('idproduct0'=>array('joinType'=>'LEFT JOIN')),
								'condition' => "idproduct IN (SELECT id FROM igu_products WHERE idsouscategory=:id) ",
								'params'    => array( ':id' => $_GET['idsub'])  
							)
						));
					
					}
					 else if(isset($_GET['idprod'])){
					
					$dataProvider=new CActiveDataProvider('IguClientProduct',array(
							'criteria' => array(
								'select'    => "idproduct,idclient,totalamount,currentprice,quantity,creationdate" , 
								'with'=>array('idproduct0'=>array('joinType'=>'LEFT JOIN')),
								'condition' => "idproduct =:id",
								'params'    => array( ':id' => $_GET['idprod'] )  
							)
						));
					
					}
					else if(isset($_GET['id'])){
					
					$dataProvider=new CActiveDataProvider('IguClientProduct',array(
							'criteria' => array(
								'select'    => "idproduct,idclient,totalamount,currentprice,quantity,creationdate" , 
								'with'=>array('idproduct0'=>array('joinType'=>'LEFT JOIN'),'idproduct0.idsouscategory0'=>array('joinType'=>'LEFT JOIN')),
								'condition' => "idsouscategory IN (SELECT id FROM igu_sous_category WHERE idcategory =:id)",
								'params'    => array( ':id' => $_GET['id'])  
							)
						));
					}else{
					$dataProvider=new CActiveDataProvider('IguClientProduct',array(
							'criteria' => array(
								'select'    => "idproduct,idclient,totalamount,currentprice,quantity,creationdate" , 
								'with'=>array('idproduct0'=>array('joinType'=>'LEFT JOIN'),'idproduct0.idsouscategory0'=>array('joinType'=>'LEFT JOIN')) 
							)
						));
					}
				 }else{
				     if(isset($_GET['idprovince']) && !isset($_GET['idprod'])){
				        $dataProvider=new CActiveDataProvider('IguClientProduct',array(
							'criteria' => array(
								'select'    => "idproduct,idclient,totalamount,currentprice,quantity,creationdate" , 
								'with'=>array('idproduct0'=>array('joinType'=>'LEFT JOIN')),
								'condition' => "idclient IN (SELECT id FROM igu_registration WHERE iddistrict in(select id from igu_district where idprovince =:id)) ",
								'params'    => array( ':id' => $_GET['idprovince'])  
							)
						));
					}
					else if(isset($_GET['idprod'])){
					
					$dataProvider=new CActiveDataProvider('IguClientProduct',array(
							'criteria' => array(
								'select'    => "idproduct,idclient,totalamount,currentprice,quantity,creationdate" , 
								'with'=>array('idproduct0'=>array('joinType'=>'LEFT JOIN')),
								'condition' => "idproduct =:id",
								'params'    => array( ':id' => $_GET['idprod'] )  
							)
						));
					
					}
					else{
					   $dataProvider=new CActiveDataProvider('IguClientProduct',array(
							'criteria' => array(
								'select'    => "idproduct,idclient,totalamount,currentprice,quantity,creationdate" , 
								'with'=>array('idproduct0'=>array('joinType'=>'LEFT JOIN'),'idproduct0.idsouscategory0'=>array('joinType'=>'LEFT JOIN')) 
							)
						));
					}	
				 }	
		}else{
		    
			$idproduct = Yii::app()->db->createCommand('SELECT id FROM igu_products where productname="'.$_REQUEST['productname'].'" ')->queryAll();
			foreach($idproduct as $row);
		     $dataProvider=new CActiveDataProvider('IguClientProduct',array(
					'criteria' => array(
						'select'    => "idproduct,idclient,totalamount,currentprice,quantity,creationdate" , 
						'with'=>array('idproduct0'=>array('joinType'=>'LEFT JOIN')),
						'condition' => "idproduct =:id",
						'params'    => array( ':id' => $row['id'])  
					)
				)); 
		
		}	
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}
	
}