<?php

class ConprofileController extends Controller
{
 
    public $layout='/layouts/home';
    public $cities = "";

    public function missingAction($action)
    {
        $action=str_replace('-','_',$action);
        $action='action'.ucfirst(strtolower($action));
        if(method_exists($this,$action))
            $this->$action();
        else
            $this->actionIndex();
    }
    
    public function actionProfile()
    {
    	$this->pageTitle = 'Handyman.com - User Profile';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
		$criteria=new CDbCriteria();
		$criteria->condition = "IsTop = '1'";
		$param['top'] = Projecttypes::model()->findAll($criteria);
        $this->render('profile', $param);
    }
    
   
}
