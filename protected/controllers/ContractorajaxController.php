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
		   $refer_id = $_POST['refer_id'];
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
					   if ($refer_id != ''){
					   	     $rcont = Contractors::model()->findByPk($refer_id);
					   	     if (count($rcont)>0){
					            $t = ContractorTeam::model()->findByAttributes(array('contractor_id'=>$rcont->ContractorId,'invited_id'=>$owner_id));
					            if (count($t)==0){
					            	$team = new ContractorTeam();
					            	$team->contractor_id = $rcont->ContractorId;
					            	$team->invited_id = $owner_id;
					            	$team->confirmed = 1;
					            	$team->save();
					            }
					   	     }
				       }
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
		$contractor_edit = Contractors::model()->findByPk($contractor_id);
		
			switch($column)
			{
				case 'AboutBusiness':
					$message = $contractor_edit->AboutBusiness;
					break;
				case 'Services':
					$message =  $contractor_edit->Services;
					break;
				default:
					$message = $contractor_edit->AboutBusiness;
			}
		
		$status = array('success' => true,'message' => $message);
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
	
	public function savemessagewithAttachedProject(){
		$subject = Yii::app()->Ini->v('subject');
		$message = Yii::app()->Ini->v('message');
		$project_id = Yii::app()->Ini->v('project_id');
		$receiver_id = Yii::app()->Ini->v('receiver_id');
	
		$from_id = Yii::app()->user->getId();
		$from_user_type = Yii::app()->user->role;
		$to_id = Yii::app()->Ini->v('receiver_id');
		$sent_date = date("Y-m-d H:i:s");
			
		$homeowner_details = Homeowners::model()->findByPk($from_id);
		
		
			/*
				get project info
			*/
			$concat_message = "";
			$proj_info = Projects::model()->findByPk($project_id);
			if(count($proj_info) > 0){
				$concat_message = "<br><br>Project Details:<br>
				<b>Description: </b>".$proj_info->description."<br>
				<b>Project Type: </b>".$this->getProjectTypeName($proj_info->project_type_id)."<br>
				<b>Start Date: </b>".$proj_info->start_date."<br>
				<b>Time Frame: </b>".$proj_info->time_frame."<br>
				<b>Budget: </b>".$proj_info->budget."<br>
				<b>Home Owner: </b> <a href='http://handyman.com/homeowner/profile/user/".$homeowner_details->username."'>".$homeowner_details->firstname." ".$homeowner_details->lastname."</a><br>
				Learn more <a href='http://handyman.com/project/jobdetails/pj_id/".$project_id."'>here</a>.<br>
				";
			}
			
		$messages = new Messages();
		$messages->subject = $subject;
		$messages->message = $message." ".$concat_message;
		$messages->from_id = $from_id;
		$messages->to_id = $to_id;
		$messages->to_user_type = 'contractor';
		$messages->from_user_type = $from_user_type;
		$messages->date_sent = $sent_date;
		
		
		
		
		$this->sendEmailNotification($subject,$message." ".$concat_message,$to_id,Yii::app()->name);
		
		if($messages->save())
		{
			$status = array('success' => true);
		}else{
			$status = array('success' => false,'error_message'=>print_r($messages->getErrors()));
		}
		
		$this->renderJSON($status);
		
	}
	
	private function getProjectTypeName($project_type_id){
			$name = "";
			$details = Projecttypes::model()->findByAttributes(array('ProjectTypeId'=>$project_type_id));
    		  if (count($details)>0){ 
	          	$name = $details->Name;
	          }
			  return $name;
	 }
	
	private function sendEmailNotification($subject,$message,$contractor_id,$domain_name){
		$receiver_details = Contractors::model()->findByPk($contractor_id);
		$receiver_name = $receiver_details->Name;
		$receiver_email = $receiver_details->Email;
		 
		
    	$subject = Yii::app()->name." - ".$subject;
    	$content = $this->renderPartial('message_notif_template', array('domain_name'=>$domain_name,'message' => $message,'receiver_name' =>$receiver_name), true);
    	$headers="From: admin <admin@handymen.com>".Yii::app()->name."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
    	
		/*$headers   = array();
		$headers[] = "MIME-Version: 1.0";
		$headers[] = 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers[] = "From: Handyman.com <admin@handyman.com>";
		$headers[] = "Bcc: Sheina Vi Paclibar <sheinavi@gmail.com>";
		$headers[] = "Subject: ".$subject;
		$headers[] = "X-Mailer: PHP/".phpversion();*/
		
    	mail($receiver_email,$subject,$content,$headers);
		
	}
    
	
     public function actionRatefeedback()
        {                       
                if ( Yii::app()->request->isAjaxRequest )
                {
                
                        $rating = FeedbackRating::model()->findByAttributes(array('feedback_id'=>$_GET['id']));
                        if (count($rating)==0){
                        	$rating = new FeedbackRating();
                        	$rating->vote_count = 1;
                        	$rating->feedback_id = $_GET['id'];
	                        $rating->vote_sum =  $_GET['val'];
	                        $rating->vote_average = round($rating->vote_sum / $rating->vote_count,2);
                        }else { 
	                        $rating->vote_count = $rating->vote_count + 1;
	                        $rating->vote_sum = $rating->vote_sum + $_GET['val'];
	                        $rating->vote_average = round($rating->vote_sum / $rating->vote_count,2);
                        }
                        if ( $rating->save() ) 
                        {
                        echo CJSON::encode( array (
                        'status'=>'success', 
                        'div'=>'Thank you for voting!', 
                        'info'=>"Rating: " . $rating->vote_average ." " . $rating->vote_count . " votes",
                        ) );
                        }
                }
        }
		
	public function assignbg($post){
		
		$photo_id = $post['id'];
		$contractor_id = Yii::app()->user->getId();
		
		
		$contractorphotos=Contractorphotos::model()->findByAttributes(array('contractor_id' => $contractor_id,'is_bg' => '1'));	
		
		if (count($contractorphotos)>0){
				$contractorphotos->is_bg = 0;
				$contractorphotos->save();
				
			Contractorphotos::model()->updateByPk($photo_id, array(
				'is_bg' => 1
			));
				
			}
		else{
			Contractorphotos::model()->updateByPk($photo_id, array(
				'is_bg' => 1
			));
		}
		$status = array('success' => true);
		$this->renderJSON($status);
		
	
	}
	
	public function addtoteam(){
		$invited_id = Yii::app()->Ini->v('contractor_id');
		$contractor_id = Yii::app()->user->getId();
		
		$contractor_team = ContractorTeam::model()->findByAttributes(array('contractor_id' => $contractor_id, 'invited_id' => $invited_id));
		if(count($contractor_team) == 0){
			$contractor_team = new ContractorTeam();
			$contractor_team->contractor_id = $contractor_id;
			$contractor_team->invited_id = $invited_id;
			$contractor_team->invited_date = date("Y-m-d H:i:s");
			if($contractor_team->save() == true){
				$this->sendEmailNotifAddTeam($model->id,$invited_id);
				$return = array('success' => true);
			}else{
				$return = array('success' => false,'error_message'=>print_r($contractor_team->getErrors()));
			}
		}else{
			$return = array('success' => false, 'error_message' => 'Already invited.');
		}
		
		$this->renderJSON($return);
	}
	
	private function sendEmailNotifAddTeam($insert_id,$invited_id){
		$contractor_id = Yii::app()->user->getId();
		
		$contractor_details = Contractors::model()->findbyPk($contractor_id);
		$invited_details = Contractors::model()->findbyPk($invited_id);
		
		$receiver_name = $invited_details->Name;
		$receiver_email = $invited_details->Email;
		//$receiver_email = 'sheinavi@gmail.com';
		
		$message = "
			<a href='http://handyman.com/contractor/profile/user/".$contractor_details->Username."'>".$contractor_details->Name."</a> requested to add you to their handyman team.
			To confirm, login to your account and hit &lsquo;Accept&rsquo; in your dashboard invites page.<br><br>
			Handyman
		";
		
		
		 
		
    	$subject = Yii::app()->name." - You have been added in a contractor team";
		$domain_name = "Handyman.com";
    	$content = $this->renderPartial('message_notif_template', array('domain_name'=>$domain_name,'message' => $message,'receiver_name' =>$receiver_name), true);
    	$headers="From: admin <admin@handymen.com>".Yii::app()->name."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
    	
    	mail($receiver_email,$subject,$content,$headers);
		
	}
	
}