<?php

class HomeownerController extends Controller
{
 
    public $layout='/layouts/home';
    

    public function missingAction($action)
    {
        $action=str_replace('-','_',$action);
        $action='action'.ucfirst(strtolower($action));
        if(method_exists($this,$action))
            $this->$action();
        else
            $this->actionIndex();
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
	
	public function actionSavemessage(){
		$subject = Yii::app()->Ini->v('subject');
		$message = Yii::app()->Ini->v('message');
		$to_usertype = Yii::app()->Ini->v('to_usertype');
		$from_id = Yii::app()->user->getId();
		$from_user_type = Yii::app()->user->role;
		
		$to_id = Yii::app()->Ini->v('receiver_id');
		$sent_date = date("Y-m-d H:i:s");
		
		$messages = new Messages();
		$messages->subject = $subject;
		$messages->message = $message;
		$messages->from_id = $from_id;
		$messages->to_id = $to_id;
		$messages->to_user_type = 'to_usertype';
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
	
	private function sendEmailNotification($subject,$message,$contractor_id,$domain_name){
		$receiver_details = Contractors::model()->findByPk($contractor_id);
		$receiver_name = $receiver_details->Name;
		$receiver_email = $receiver_details->Email;
		 
		
    	$subject = Yii::app()->name." - ".$subject;
    	$content = $this->renderPartial('message_notif_template', array('domain_name'=>$domain_name,'message' => $message,'receiver_name' =>$receiver_name), true);
    	$headers="From: admin <admin@>".Yii::app()->name."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
    	
    	$receiver_email = "sheinavi@gmail.com";
		mail($receiver_email,$subject,$content,$headers);
		
	}
	 
	public function actionProfile(){
		$username = Yii::app()->Ini->v('user');
		$current_user_id = 0;
		$current_user_role = 0;
		
		$model = Homeowners::model()->findByAttributes(array('username'=>$username));
			if(count($model)>0){
			
				if(!Yii::app()->user->isGuest){
					$current_user_id = Yii::app()->user->getId();
					$current_user_role = Yii::app()->user->role;
				}
			
			$criteria=new CDbCriteria();
    		$criteria->condition = "homeowner_id = ".$model->homeowner_id;
    		$criteria->limit = 8;
		    
    		$this->pageTitle = 'Handyman.com - Homeowner - '.$model->firstname.' '.$model->lastname.' Profile';
			$this->render('homeowner-profile', array( 'model' =>$model,
													  'projects'=>Projects::model()->findAll($criteria),
													  'current_user_id'=>$current_user_id,
													  'current_user_role' => $current_user_role
													 ));
													 
			 //update views
			if (!Yii::app()->user->isGuest){
			    	$userid = Yii::app()->user->getId();
			    	$role = Yii::app()->user->role;
                    $views = HomeownerViews::model()->findByAttributes(array('viewed_by'=>$userid,'homeowner_id'=>$model->homeowner_id,'viewed_user_type'=>$role));
                  if (count($views)> 0){
                  }else {
                     $views = new HomeownerViews();
                     $views->homeowner_id = $model->homeowner_id;
                     $views->viewed_by = $userid;
                     $views->viewed_user_type = $role;
                     $views->save();	
                  }
            }
               													 
			}else{
				$this->redirect(Yii::app()->homeUrl.'home/error');
			}
			
			
		
	}
	
	
	
}
