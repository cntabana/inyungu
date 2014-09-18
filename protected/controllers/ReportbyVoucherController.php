<?php

class ReportbyVoucherController extends Controller
{
	public function actionIndex()
	{
        $sql = "select count(*) num,idcredit credit from igu_voucher where status=2 group by credit";
		$command = Yii::app()->db->createCommand($sql);         
	    $results = $command->queryAll();      
       
        $lcv = 0;
        $sex = array();
        $counts = array();
        foreach ($results as $result)
        {
            $sex[$lcv] = 'Credit '.$result['credit'];
            $counts[] = (int)$result['num'];
            $lcv++;
        }
        
        $this->render('index', array('data'=>$sex, 'num'=>$counts, 'title'=>'Voucher used'));    
	}
	public function actionNoUsed()
	{
        $sql = "select count(*) num,idcredit credit from igu_voucher where status=1 group by credit";
		$command = Yii::app()->db->createCommand($sql);         
	    $results = $command->queryAll();      
       
        $lcv = 0;
        $sex = array();
        $counts = array();
        foreach ($results as $result)
        {
            $sex[$lcv] = 'Credit '.$result['credit'];
            $counts[] = (int)$result['num'];
            $lcv++;
        }
        
        $this->render('index', array('data'=>$sex, 'num'=>$counts, 'title'=>'Voucher no used'));    
	}
	
	public function actionNew()
	{
        $sql = "select count(*) num,idcredit credit from igu_voucher where status=0 group by credit";
		$command = Yii::app()->db->createCommand($sql);         
	    $results = $command->queryAll();      
       
        $lcv = 0;
        $sex = array();
        $counts = array();
        foreach ($results as $result)
        {
            $sex[$lcv] = 'Credit '.$result['credit'];
            $counts[] = (int)$result['num'];
            $lcv++;
        }
        
        $this->render('index', array('data'=>$sex, 'num'=>$counts, 'title'=>'New'));    
	}
	
	public function actionVoucherbyStatus()
	{
        $sql = "select count(*) num,status status from igu_voucher  group by status";
		$command = Yii::app()->db->createCommand($sql);         
	    $results = $command->queryAll();      
       
        $lcv = 0;
        $status = array();
        $counts = array();
        foreach ($results as $result)
        {
		    if($result['status'] == 2)
            $status[$lcv] = "Used";
			else if($result['status'] == 1)
			 $status[$lcv] = "No Used";
			 else
			 $status[$lcv] = "New";
            $counts[] = (int)$result['num'];
            $lcv++;
        }
        
        $this->render('index', array('data'=>$status, 'num'=>$counts, 'title'=>'Voucher by status'));    
	}
	}