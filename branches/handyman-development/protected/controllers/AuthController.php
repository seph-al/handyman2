<?php
class AuthController extends Controller
{
	public $layout='/layouts/auth';
    public function filters()
    {
        return array(array('application.filters.DefaultFilter', 'actions'=>'*'));
    }
    public function actionIndex()
    {
		if(Yii::app()->user->isGuest){
			$method = Yii::app()->Ini->v('t');
			if(method_exists(__CLASS__, Yii::app()->Ini->aN($method))){
				return $this->{Yii::app()->Ini->aN($method)}($_POST);
			}
			$this->pageTitle = 'Handyman - Login';
			$this->render('index',array('redirect'=>$_GET['redirect']));
		}else{
			$redirect = $_GET['redirect'];
			
			if(Yii::app()->user->getState('role')=='homeowner'){
				$user = Homeowners::model()->findByPk(Yii::app()->user->id);
				$code=$this->encrypt_decrypt('encrypt',json_encode(array(
					'firstname'=>$user->firstname,
					'lastname'=>$user->lastname,
					'username'=>$user->username,
					'password'=>$user->password,
					'email'=>$user->email,
				)));
			}else{
				$user = Contractors::model()->findByPk(Yii::app()->user->id);
				$code=$this->encrypt_decrypt('encrypt',json_encode(array(
					'name'=>$user->Name,
					'contact_name'=>$user->ContactName,
					'username'=>$user->Username,
					'password'=>$user->Password,
					'email'=>$user->Email,
				)));
			}
			header('Location: '.rawurldecode($redirect).'/?code='.rawurlencode($code));
		}
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
	
	
	public function loginhomeowner($post)
    {
		$identity=new UserIdentity($post['homeowner_email'],$post['homeowner_password'],'homeowner');
		if($identity->authenticate()){
		   Yii::app()->user->login($identity);
		   $owner_id = Yii::app()->user->getId();
		   $status = true;
		   $user = Homeowners::model()->findByPk($owner_id);
		   $return['code']=$this->encrypt_decrypt('encrypt',json_encode(array(
			'firstname'=>$user->firstname,
			'lastname'=>$user->lastname,
			'username'=>$user->username,
			'password'=>$user->password,
			'email'=>$user->email,
			)));
		}else{
			$status = false; 
			$return['message'] = $identity->errorMessage;
		}
		$return['status'] = $status;
		$this->renderJSON($return, $status);
    }
    
   public function logincontractor($post)
    {
		$identity=new UserIdentity($post['contractor_email'],$post['contractor_password'],'contractor');
		if($identity->authenticate()){
		   Yii::app()->user->login($identity);
		   $owner_id = Yii::app()->user->getId();
		   $user = Contractors::model()->findByPk($owner_id);
		   $status = true;
		   $return['code']=$this->encrypt_decrypt('encrypt',json_encode(array(
			'name'=>$user->firstname,
			'contact_name'=>$user->lastname,
			'username'=>$user->Username,
			'password'=>$user->Password,
			'email'=>$user->Email,
			)));
		}else{
			$status = false; 
			$return['message'] = $identity->errorMessage;
		}
		$return['status'] = $status;
		$this->renderJSON($return, $status);
			
   }
    
	function encrypt_decrypt($action, $string) {
		$output = false;

		$encrypt_method = "AES-256-CBC";
		$secret_key = 'Thisismysecretkey';
		$secret_iv = 'Thisismysecretiv';

		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		if( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		}
		else if( $action == 'decrypt' ){
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}
		return $output;
	}
	
	private function renderJSON($array = array(), $status = true)
    {
        header('Content-Type: application/json');
        if(!is_array($array))
            $array = array('r'=>$array);
        if($status)
            echo CJSON::encode(array_merge(array('s'=>1), $array));
        else
            echo CJSON::encode(array_merge(array('s'=>0), $array));
        Yii::app()->Ini->end();
    }
}