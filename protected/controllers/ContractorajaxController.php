<?php

class ContractorajaxController extends Controller
{
    public function filters()
    {
        return array(array('application.filters.DefaultFilter', 'actions'=>'*'));
    }
    public function actionIndex()
    {
        $method = Yii::app()->Ini->v('t');
        if(method_exists(__CLASS__, Yii::app()->Ini->aN($method)))
            return $this->{Yii::app()->Ini->aN($method)}($_POST);
        return null;
    }
    
    public function dashboard($post)
    {
        $return = $htmlParams     = array();
        $htmlParams['usersTotal']         = users::totalUsers('active');
        $htmlParams['usersTotalFacebook'] = userSocials::totalByProvider('facebook');
        $htmlParams['usersTotalLinkedIn'] = userSocials::totalByProvider('linkedin');
        $htmlParams['usersNewestUser']    = users::getNewestUser();
        $htmlParams['rfSettings']         = coreSettings::getDetails('rf_settings',true);
        $return['html']           = $this->renderPartial('dashboard', $htmlParams, true);
        $this->renderJSON($return, true);
    }
	
	public function savecontractor(){
		   $cont = new Contractors();
           $cont->Name = $_POST['company_name'];
		   $cont->ContactName = $_POST['your_name'];
			$cont->Phone = $_POST['company_phone'];
			$cont->Fax = $_POST['company_fax'];
			$cont->Address1 = $_POST['company_address'];
			$cont->City = $_POST['city'];
			$cont->State = $_POST['state'];
			$cont->Zip = $_POST['zip_code'];
			$cont->Email = $_POST['email'];
			$cont->Username = $_POST['username'];
			$cont->Password = $_POST['password'];
			$cont->Website = $_POST['website'];
			$cont->AboutBusiness = $_POST['about_business'];
			$cont->ProjectTypeId = $_POST['projecttype'];
			$cont->Services = $_POST['primary_services'];
				
				$cont->insert();
				Yii::app()->Ini-> savetovnoc($_POST['email']);
				
					$identity=new UserIdentity($_POST['email'],$_POST['password'],'contractor');
					//$identity=new UserIdentity('sheinavi@gmail.com','school30','contractors');
					if($identity->authenticate()){
					   Yii::app()->user->login($identity);
					   $owner_id = Yii::app()->user->getId();
					   Yii::app()->Ini->savetoaffiliate($owner_id,'contractor');   
					   $status = array('status' => true);
					}else{
						$status = false; 
						$status = array('status' => false, 'error_message' => $identity->errorMessage);
					}
				
			
			$this->renderJSON($status);
	}
	
	public function checkUsernameEmail(){

		$record=Contractors::model()->find(array(
		  'select'=>'Email',
		  'condition'=>'Email=:Email',
		  'params'=>array(':Email'=>$_POST['email'])));
		  
		  $record_username=Contractors::model()->find(array(
		  'select'=>'Username',
		  'condition'=>'Username=:Username',
		  'params'=>array(':Username'=>$_POST['username'])));

		if($record===null && $record_username ===null) {
			$status = false; 
			$status = array('exist' => false);
		}else{
			if($record!== null){
				$error_message = "Email already registered.<br>";
			}
			if($record_username !== null){
				$error_message .= "Username already used. Please enter another username.";
			}
			$status = array('exist' => true, 'error_message' => $error_message);
		}
		
		$this->renderJSON($status);
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
	
	public function saveEditContractor(){
		$column = $_POST['column'];
		$value = $_POST['value'];
		$contractor_id = Yii::app()->user->getId();
		
		$contractor=Contractors::model()->findByPk($contractor_id);
		
			switch($column)
			{
				case 'AboutBusiness':
					$contractor->AboutBusiness=$value;
					break;
				case 'Services':
					$contractor->Services=$value;
					break;
				default:
					$contractor->AboutBusiness=$value;
			}
		
		$contractor->save(); // save the change to database
		$status = array('success' => true);
		$this->renderJSON($status);
	}
	
	public function saveProfilePic(){
		$profile_pic = $_POST['filename'];
		$contractor_id = Yii::app()->user->getId();
		$contractorphotos=Contractorphotos::model()->findByAttributes(array('contractor_id' => $contractor_id,'is_profile' => '1'));
		
			if (count($contractorphotos)>0){
				$contractorphotos->filename=$profile_pic;
				$contractorphotos->save();
			}
			else{
				//insert as new row
				$contractor_photos = new Contractorphotos();
				$contractor_photos->contractor_id = $contractor_id;
				$contractor_photos->filename = $profile_pic;
				$contractor_photos->is_profile = 1;
				
				$contractor_photos->insert();
			}
		
		$status = array('success' => true);
		$this->renderJSON($status);
	}
	
	public function savemessage(){
		
		$subject = Yii::app()->Ini->v('subject');
		$message = Yii::app()->Ini->v('message');
		$from_id = Yii::app()->user->getId();
		$from_user_type = Yii::app()->user->role;
		$to_id = Yii::app()->Ini->v('receiver_id');
		$sent_date = date("Y-m-d H:i:s");
		
		$messages = new Messages();
		$messages->subject = $subject;
		$messages->message = $message;
		$messages->from_id = $from_id;
		$messages->to_id = $to_id;
		$messages->to_user_type = 'contractor';
		$messages->from_user_type = $from_user_type;
		$messages->date_sent = $sent_date;
		
		$this->sendEmailNotification($subject,$message,$to_id,Yii::app()->name);
		
		if($messages->save())
		{
			$status = array('success' => true);
		}else{
			$status = array('success' => false,'error_message'=>print_r($messages->getErrors()));
		}
		
		$this->renderJSON($status);
	}
	
	public function deletefeedback($post){
	
		$feedback_id = $post['id'];
		if($feedback_id != 0){
			Feedback::model()->deleteByPk($feedback_id);
			$criteria=new CDbCriteria();
			$criteria->condition = "feedback_id = '$feedback_id'";
			Feedback::model()->deleteAll($criteria);
			$status = array('success' => true);
			$this->renderJSON($status);	
		}
	
	}
	
	public function editfeedaback($post){
		
		
		$feedback_id = $post['id'];
		$contractor_id = $post['contractor_id'];
		$message = $post['feedbackmessage2'];
		
		if($feedback_id != 0){
		
			Feedback::model()->updateByPk($feedback_id, array(
				'message' => $message
			));
		
		
		}
		
		$return = $htmlParams     = array();
		$criteria=new CDbCriteria();
		$criteria->condition = "contractor_id = '$contractor_id'";
		$htmlParams['feedback'] = Feedback::model()->findAll($criteria);
        $return['html']           = $this->renderPartial('feedbacksupdate', $htmlParams, true);
        $this->renderJSON($return, true);
	
	}
	
	public function feedbacks($post){
	
		
		$message = $post['feedbackmessage'];
		$contractor_id = $post['contractor_id'];
		$homeowner_id = $post['homeowner_id'];
		$date_posted = date("Y-m-d H:i:s");
		
		$feedback = new Feedback();
		$feedback->contractor_id = $contractor_id;
		$feedback->homeowner_id = $homeowner_id;
		$feedback->date_posted = $date_posted;
		$feedback->message = $message;
		
		$feedback->save();
		
		$return = $htmlParams     = array();
		$criteria=new CDbCriteria();
		$criteria->condition = "contractor_id = '$contractor_id'";
		$htmlParams['feedback'] = Feedback::model()->findAll($criteria);
        $return['html']           = $this->renderPartial('feedbacksupdate', $htmlParams, true);
        $this->renderJSON($return, true);
	
	
	
	}
	
	private function sendEmailNotification($subject,$message,$contractor_id,$domain_name){
		$receiver_details = Contractors::model()->findByPk($contractor_id);
		$receiver_name = $receiver_details->Name;
		$receiver_email = $receiver_details->Email;
		 
		
    	$subject = Yii::app()->name." - ".$subject;
    	$content = $this->renderPartial('message_notif_template', array('domain_name'=>$domain_name,'message' => $message,'receiver_name' =>$receiver_name), true);
    	$headers="From: admin <admin@>".Yii::app()->name."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
    	
    	mail($receiver_email,$subject,$content,$headers);
		
	}
    
}