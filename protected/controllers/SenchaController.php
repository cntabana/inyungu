<?php

class SenchaController extends GxController
{
	public function actionIndex()
	{
	   $sql = "SELECT cp.id as id,pr.productname as productname, m.umurenge,r.firstname, totalamount,dis.district,r.lastname, currentprice, quantity,mesure, creationdate,province,district,umudugudu,akagali,detail,telephone,image
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
					and SUBSTRING(now(),1,10)  <= DATE_ADD( datepaiement, INTERVAL days DAY ) and validity = 0 order by id desc";

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
		
		$record=Yii::app()->db->createCommand($count)->queryScalar();
		
		$dataProvider=new CSqlDataProvider($sql, array(
					   	'totalItemCount'=>$record,
						  'sort' => array(
						'attributes' => array(
									'productname'=>array(
                                    'asc'=>'igu_products.productname',
                                    'desc'=>'igu_products.productname DESC',
                                ),
                              ),
				            ),
						'pagination'=>array(
							'pageSize'=>25,
						),
					));
		$data =  $dataProvider->getData();
		$this->renderPartial('index',array('data'=>$data));
	}
    
	public function actionProvince()
	{
	   $sql = "SELECT id,province from igu_province";

		$ex=Yii::app()->db->createCommand($sql);
		$executequery = $ex->queryAll();
		$this->renderPartial('index',array('data'=>$executequery));
	}
	public function actionDistrict()
	{
	   $sql = "SELECT id,district,idprovince from igu_district";

		$ex=Yii::app()->db->createCommand($sql);
		$executequery = $ex->queryAll();
		$this->renderPartial('index',array('data'=>$executequery));
	}
	
}