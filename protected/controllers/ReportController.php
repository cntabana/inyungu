<?php

class ReportController extends Controller
{

	public function actionIndex()
	{
        $sql = "select count(*) num,c.cash cash from igu_payment p,igu_voucher v,igu_credit c where p.vouchernumber = v.vouchernumber and c.id = v.idcredit and validity = 0  group by c.cash";
		$command = Yii::app()->db->createCommand($sql);         
	    $results = $command->queryAll();      
       
        $lcv = 0;
        $sex = array();
        $counts = array();
        foreach ($results as $result)
        {
            $sex[$lcv] = $result['cash'];
            $counts[] = (int)$result['num'];
            $lcv++;
        }
        
        $this->render('index', array('data'=>$sex, 'num'=>$counts, 'title'=>'Active Payment'));    
	}
	
	public function actionPaymentbyDistrict()
	{
        $sql = "select count(*) num,d.district district from igu_payment p,igu_registration r,igu_district d where d.id = r.iddistrict and  p.idclient= r.id and p.validity=0  group by r.iddistrict";
		$command = Yii::app()->db->createCommand($sql);         
	    $results = $command->queryAll();      
       
        $lcv = 0;
        $district = array();
        $counts = array();
        foreach ($results as $result)
        {
            $district[$lcv] = $result['district'];
            $counts[] = (int)$result['num'];
            $lcv++;
        }
        
        $this->render('index', array('data'=>$district, 'num'=>$counts, 'title'=>'Payment by District'));    
	}
	}