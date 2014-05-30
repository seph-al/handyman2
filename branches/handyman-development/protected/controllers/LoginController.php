<?php

class LoginController extends Controller
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
    	$this->pageTitle = 'Handyman - Login';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
        $this->render('login', $param);
    }
}
