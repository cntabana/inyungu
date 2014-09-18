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
	
	 $sql = "SELECT cp.id as id,idproduct,pr.productname as productname, m.umurenge,cp.idclient, totalamount, currentprice, quantity,mesure, creationdate,province,district
					FROM igu_payment p, igu_voucher v, igu_credit c, igu_products pr, igu_client_product cp,igu_registration r,imirenge m,igu_district dis,igu_province pro
					WHERE c.id = v.idcredit
					AND v.vouchernumber = p.vouchernumber
					AND pr.id = cp.idproduct
					and r.id = cp.idclient
					and m.id = r.idumurenge
					and m.iddistrict = dis.id
					and r.id = p.idclient
					and pro.id = dis.idprovince
					and dis.id = r.iddistrict
					and SUBSTRING(now(),1,10)  <= DATE_ADD( datepaiement, INTERVAL days DAY ) and validity = 0";
	$count = "SELECT count(*)
					FROM igu_payment p, igu_voucher v, igu_credit c, igu_products pr, igu_client_product cp,igu_registration r,imirenge m,igu_district dis,igu_province pro
					WHERE c.id = v.idcredit
					AND v.vouchernumber = p.vouchernumber
					AND pr.id = cp.idproduct
					and r.id = cp.idclient
					and m.id = r.idumurenge
					and m.iddistrict = dis.id
					and r.id = p.idclient
					and pro.id = dis.idprovince
					and dis.id = r.iddistrict
					and SUBSTRING(now(),1,10)  <= DATE_ADD( datepaiement, INTERVAL days DAY ) and validity = 0";
					
         if(!isset($_REQUEST['productname'])){
 
				 if($_REQUEST['search'] == 2){
				 
				
					if(isset($_GET['idsub']) && !isset($_GET['idprod'])){
						$sql.= " and  idproduct in (SELECT id FROM igu_products WHERE idsouscategory=:id)";		
						$count.=" and idproduct in (SELECT id FROM igu_products WHERE idsouscategory=:id2)";
						$count1=Yii::app()->db->createCommand($count);
						$count1->bindParam(":id2",$_GET['idsub'],PDO::PARAM_STR);
						$record = $count1->queryScalar();
						$id = $_GET['idsub'];
		            }
					else if(isset($_GET['idprod'])){
						$sql.=" and idproduct =:id";		
						$count.=" and idproduct=:id2";
						$count1=Yii::app()->db->createCommand($count);
						$count1->bindParam(":id2",$_GET['idprod'],PDO::PARAM_STR);
						$record = $count1->queryScalar();
						$id = $_GET['idprod'];
		            }
					else if(isset($_GET['id'])){
						$sql.= " and idsouscategory IN (SELECT id FROM igu_sous_category WHERE idcategory =:id)";		
						$count.=" and idsouscategory IN (SELECT id FROM igu_sous_category WHERE idcategory =:id2)";
						$count1=Yii::app()->db->createCommand($count);
						$count1->bindParam(":id2",$_GET['id'],PDO::PARAM_STR);
						$record = $count1->queryScalar();
						$id = $_GET['id'];
				    }else{
					 $record=Yii::app()->db->createCommand($count)->queryScalar();
					 $id = '';
					}
				 }else{
				     if(isset($_GET['idprovince']) && !isset($_GET['iddistrict']) && !isset($_GET['idprod'])){
				        $sql.=" and cp.idclient IN (SELECT id FROM igu_registration WHERE iddistrict in(select id from igu_district where idprovince =:id))"; 
					    $count.=" and cp.idclient IN (SELECT id FROM igu_registration WHERE iddistrict in(select id from igu_district where idprovince =:id2))"; 
					    $count1=Yii::app()->db->createCommand($count);
						$count1->bindParam(":id2",$_GET['idprovince'],PDO::PARAM_STR);
						$record = $count1->queryScalar();
						$id = $_GET['idprovince'];
					}
					else if(isset($_GET['iddistrict']) && !isset($_GET['idumurenge']) && !isset($_GET['idprod'])){
				        $sql.=" and cp.idclient IN (SELECT id FROM igu_registration WHERE iddistrict =:id)"; 
					    $count.=" and cp.idclient IN (SELECT id FROM igu_registration WHERE iddistrict =:id2)"; 
					    $count1=Yii::app()->db->createCommand($count);
						$count1->bindParam(":id2",$_GET['iddistrict'],PDO::PARAM_STR);
						$record = $count1->queryScalar();
						$id = $_GET['iddistrict'];
					}
					else if(isset($_GET['idumurenge']) && !isset($_GET['idprod'])){
				        $sql.=" and cp.idclient IN (SELECT id FROM igu_registration WHERE idumurenge =:id)"; 
					    $count.=" and cp.idclient IN (SELECT id FROM igu_registration WHERE idumurenge =:id2)"; 
					    $count1=Yii::app()->db->createCommand($count);
						$count1->bindParam(":id2",$_GET['idumurenge'],PDO::PARAM_STR);
						$record = $count1->queryScalar();
						$id = $_GET['idumurenge'];
					}
					else if(isset($_GET['idprod'])){
						$sql.=" and idproduct =:id";		
						$count.=" and idproduct=:id2";
						$count1=Yii::app()->db->createCommand($count);
						$count1->bindParam(":id2",$_GET['idprod'],PDO::PARAM_STR);
						$record = $count1->queryScalar();
						$id = $_GET['idprod'];
		            }
					else{
					   $record=Yii::app()->db->createCommand($count)->queryScalar();
					   $id = '';
					}	
				 }	
		}else{
		   $sql.=" AND cp.idproduct = (SELECT id FROM igu_products WHERE productname =:id )";
		   $count.= " AND cp.idproduct = (SELECT id FROM igu_products WHERE productname =:id2 )";
		   $count1=Yii::app()->db->createCommand($count);
		   $count1->bindParam(":id2",$_REQUEST['productname'],PDO::PARAM_STR);
		   $record = $count1->queryScalar();
		   $id = $_REQUEST['productname'];
		   
		}	
		$dataProvider=new CSqlDataProvider($sql, array(
					   	'totalItemCount'=>$record,
						 'params'=>array(
                          ':id'=>$id,
                         ),
					    'sort' => array(
						'attributes' => array(
									'productname'=>array(
                                    'asc'=>'igu_products.productname',
                                    'desc'=>'igu_products.productname DESC',
                                ),
                              ),
				            ),
						'pagination'=>array(
							'pageSize'=>10,
						),
					));
		
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}
	
}