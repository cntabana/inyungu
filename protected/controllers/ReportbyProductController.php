<?php

class ReportbyProductController extends Controller
{

	public function actionIndex()
	{
		$sql = "select count(*) num,subcategory from igu_products p,igu_sous_category s where s.id=p.idsouscategory group by idsouscategory order by subcategory";
		$command = Yii::app()->db->createCommand($sql);         
	    $results = $command->queryAll();      
       
        $lcv = 0;
        $sex = array();
        $counts = array();
        foreach ($results as $result)
        {
            $sex[$lcv] = $result['subcategory'];
            $counts[] = (int)$result['num'];
            $lcv++;
        }
        
        $this->render('index', array('data'=>$sex, 'num'=>$counts, 'title'=>'Report by product'));    
	}

	public function actionProductInMarket()
	{
		$sql = "select count(*) num,productname from igu_client_product cp ,igu_products p where cp.idproduct = p.id group by p.id";
		$command = Yii::app()->db->createCommand($sql);         
	    $results = $command->queryAll();      
       
        $lcv = 0;
        $sex = array();
        $counts = array();
        foreach ($results as $result)
        {
            $sex[$lcv] = $result['productname'];
            $counts[] = (int)$result['num'];
            $lcv++;
        }
        
        $this->render('index', array('data'=>$sex, 'num'=>$counts, 'title'=>'Product in market'));    
	}
	public function actionProductbyDistrict(){
	
	    $sql = "SELECT  cp.id id,sum(quantity) quantity,mesure,district,productname  FROM igu_client_product cp,igu_registration r ,igu_district d ,igu_products p where cp.idclient = r.id and r.iddistrict = d.id and p.id=cp.idproduct group by iddistrict,mesure";
		$command = Yii::app()->db->createCommand($sql); 
		$result = $command->queryAll(); 
      	
		
		$gridDataProvider=new CArrayDataProvider($result, array(
			'id'=>'cooperative',
			'sort'=>array(
				'attributes'=>array(
					 'id','productname','district','mesure','quantity'

				),
			),
			'pagination'=>array(
				'pageSize'=>10,
			),
		));     
      
	 
	  $this->render('productreport', array(
			'dataProvider' => $gridDataProvider,
		));
	}
	
}