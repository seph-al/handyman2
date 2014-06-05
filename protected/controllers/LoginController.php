<?php

class LoginController extends Controller
{
 
    public $layout='/layouts/home';
    public $cities = "";

     public function actions()
    {
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            'page'=>array(
                'class'=>'CViewAction',
            ),
            // ADD THIS:
            'crugeconnector'=>array('class'=>'CrugeConnectorAction'),
        );
    }
    
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
    
     public function actionFbSuccess($key){

        $loginData = Yii::app()->crugeconnector->getStoredData();
        // loginData: remote user information in JSON format.

        $info = json_decode($loginData,true);
        $email = $info['email'];
        $firstname = $info['first_name'];
        $lastname = $info['last_name'];
        $link = $info['link'];
        
        
        $this->renderText('<h1>Welcome!</h1><p>'.var_dump($info).'</p> key='.$key);
    }

    public function actionFbError($key, $message=''){
        $this->renderText('<h1>Login Error</h1><p>'.$message.'</p> key='.$key);
    }
    
    public function actionFbCallback(){
    	 //$url = "/login/fbcallback?";
    	 $url = "crugeconnector/crugekey/facebook/crugemode/callback?"; 
    	
    	 
    	 foreach($_GET as $key=>$val)
         $url .= "&".$key."=".urlencode($val);
         header("Location: ".$url);
    	     }
}
