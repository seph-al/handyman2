<?php

class ConsignupController extends Controller
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
    
    public function actionConsignup_step1()
    {
    	$this->pageTitle = 'Handyman.com - Sign up step 1';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
        $this->render('consignup-step1', $param);
    }
	
	public function actionConsignup_step2()
    {
    	$this->pageTitle = 'Handyman.com - Sign up step 1';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
        $this->render('consignup-step2', $param);
    }
	
	public function actionConsignup_step3()
    {
    	$this->pageTitle = 'Handyman.com - Sign up step 1';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
        $this->render('consignup-step3', $param);
    }
	
	public function actionConsignup_step4()
    {
    	$this->pageTitle = 'Handyman.com - Sign up step 1';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
        $this->render('consignup-step4', $param);
    }
	
	public function actionConsignup_step5()
    {
    	$this->pageTitle = 'Handyman.com - Sign up step 1';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
        $this->render('consignup-step5', $param);
    }
	
	
	
    
}
