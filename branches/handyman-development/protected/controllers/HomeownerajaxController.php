<?php

class HomeownerajaxController extends Controller
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
	
	public function savemessage(){
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
	
	private function sendEmailNotification($subject,$message,$homeowener_id,$domain_name){
		$receiver_details = Homeowners::model()->findByPk($homeowener_id);
		$receiver_name = $receiver_details->firstname." ".$receiver_details->lastname;
		$receiver_email = $receiver_details->email;
		 
		
    	$subject = Yii::app()->name." - ".$subject;
    	$content = $this->renderPartial('message_notif_template', array('domain_name'=>$domain_name,'message' => $message,'receiver_name' =>$receiver_name), true);
    	$headers="From: admin <admin@>".Yii::app()->name."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
    	
    	//$receiver_email = "sheinavi@gmail.com";
		mail($receiver_email,$subject,$content,$headers);
		
	}
	
	
	public function test(){
		echo "hi";
	}
	
	
	
}
?>