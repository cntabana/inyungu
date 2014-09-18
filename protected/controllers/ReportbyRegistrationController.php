<?php

class ReportbyRegistrationController extends Controller
{
	public function actionIndex()
	{
       $sql = "select count(*) num,d.district district from igu_registration r,igu_district d where d.id = r.iddistrict group by r.iddistrict";
		$command = Yii::app()->db->createCommand($sql);         
	    $results = $command->queryAll();      
       
        $lcv = 0;
        $sex = array();
        $counts = array();
        foreach ($results as $result)
        {
            $sex[$lcv] = $result['district'];
            $counts[] = (int)$result['num'];
            $lcv++;
        }
        
        $this->render('index', array('data'=>$sex, 'num'=>$counts, 'title'=>'Registration by district'));    
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}