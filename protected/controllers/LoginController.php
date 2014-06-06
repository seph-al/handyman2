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
        $info = json_decode($loginData,true);
        $email = $info['email'];
        $fb_id = $info['id'];
        $firstname = $info['first_name'];
        $lastname = $info['last_name'];
        $link = $info['link'];

        $details = Homeowners::model()->findByAttributes(array('email'=>$email));
        if (count($details)>0){
            $identity=new UserIdentity($email,$details->password,'homeowner');
        	if($identity->authenticate()){
			   Yii::app()->user->login($identity);
               $owner_id = Yii::app()->user->getId();    		
               $this->redirect(Yii::app()->homeUrl.'dashboard/home-owner');
               exit;	
			}
        }else {
        	  $password = Yii::app()->Ini->generate_password();
        	  $details = new Homeowners();
        	  $details->firstname = $firstname;
              $details->lastname = $lastname;
              $details->email = $email;
              $details->username = 'fb-'.$id;
              $details->password = $password;
              if ($details->save()){
	              	 Yii::app()->Ini-> savetovnoc($email);
				     $owner_id = Yii::app()->db->getLastInsertId();
				     Yii::app()->Ini->savetoaffiliate($owner_id,'homeowner');   
				     $this->SendMailAfterSignUp($owner_id);
				     
	               $identity=new UserIdentity($email,$details->password,'homeowner');
	        	   if($identity->authenticate()){
				   Yii::app()->user->login($identity);
	               $owner_id = Yii::app()->user->getId();    		
	               $this->redirect(Yii::app()->homeUrl.'dashboard/home-owner');
	               exit;	
				   }
				     
			     
              } 	
        }
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
    
   private function SendMailAfterSignUp($userid)
    {  
    	$hmodel          = Homeowners::model()->findByPk($userid);
    	$subject    = Yii::app()->name.' Account Details For Home Owner';
    	$content = $this->renderPartial('signup', array('huser' => $hmodel), true);
    	$headers="From: admin <admin@>".Yii::app()->name."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
    	
    	mail($hmodel->email,$subject,$content,$headers);
	       
    }
}
