<?php

class HomeController extends Controller
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
    
    public function actionIndex()
    {
    	 if (Yii::app()->user->isGuest){
	    	$this->pageTitle = 'Handyman.com The #1 Source to find a Local, Professional, Licensed, Screened Handyman';
	    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
	    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
	        $this->render('index', $param);
    	 }else {
    	 	if ( Yii::app()->user->role=='homeowner'){
    	 		$this->redirect(Yii::app()->homeUrl.'dashboard/home-owner');
    	 	}else {
    	 		$this->redirect(Yii::app()->homeUrl.'dashboard/contractor');
    	 	}
    	 }
    }
    
    public function  actionHow_it_works(){
    	$this->pageTitle = 'Handyman.com - How it Works';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
        $this->render('how-it-works', $param);
    }
	
	public function actionFind_contractor(){
		$this->pageTitle = 'Handyman.com - Find Contractor';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
        $this->render('find-contractor', $param);
	}
	
	public function actionFind_projects(){
		$this->pageTitle = 'Handyman.com - Find Projects';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
        $this->render('find-projects', $param);
	}
	
	public function actionContactus(){
		$this->pageTitle = 'Handyman.com - Contact Us';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
        $this->render('contactus', $param);
	
	}
	
	public function actionPostproject(){
		$this->pageTitle = 'Handyman.com - Post Project';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
		$param['city'] = Cities::model()->findAll(array('order' => 'Name ASC'));
		$param['state'] = States::model()->findAll(array('order' => 'Name ASC'));
        $this->render('postproject', $param);
	}
	
	public function actionAbout(){
		$this->pageTitle = 'Handyman.com - About Us';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
		$param['city'] = Cities::model()->findAll(array('order' => 'Name ASC'));
		$param['state'] = States::model()->findAll(array('order' => 'Name ASC'));
        $this->render('about', $param);
	}
	
	public function actionTerms(){
		$this->pageTitle = 'Handyman.com - Terms and Condition';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
		$param['city'] = Cities::model()->findAll(array('order' => 'Name ASC'));
		$param['state'] = States::model()->findAll(array('order' => 'Name ASC'));
        $this->render('terms', $param);
	}
    
	public function actionPrivacy(){
		$this->pageTitle = 'Handyman.com - Privacy Policy';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
		$param['city'] = Cities::model()->findAll(array('order' => 'Name ASC'));
		$param['state'] = States::model()->findAll(array('order' => 'Name ASC'));
        $this->render('privacy', $param);
	}
	
	public function actionError(){
		    $error = Yii::app()->errorHandler->error;
		    if ($error)
		    $this->render('error', array('error'=>$error));
		    else
		    throw new CHttpException(404, 'Page not found.');
	}
    
}
