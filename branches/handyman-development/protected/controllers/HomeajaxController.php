<?php

class HomeajaxController extends Controller
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
    
    public function getsearchcties($post)
    {
        $return = $htmlParams     = array();
        $keyword = $post['keyword'];
        $criteria=new CDbCriteria();
    	$criteria->condition = "Name like '%$keyword%'";
	    $htmlParams['cities']         = Cities::model()->findAll($criteria);
        $return['html']           = $this->renderPartial('search_cities', $htmlParams, true);
        $this->renderJSON($return, true);
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
	
	public function getselectcities($post)
	{
	
		$return = $htmlParams     = array();
        $state_id = $post['state_id'];
        $criteria=new CDbCriteria();
    	$criteria->condition = "StateId = '$state_id'";
	    $htmlParams['cities']         = Cities::model()->findAll($criteria);
        $return['html']           = $this->renderPartial('cities', $htmlParams, true);
        $this->renderJSONcities($return, true);
	
	}
	
	private function renderJSONcities($array = array(), $status = true)
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
	
	public function contactus($post)
	{
		 Yii::import ('ext.recaptchalib',true);
		 $return = array();
		  $privatekey = '6LdOg_MSAAAAAD6GK1RDTPeC_-rY9-eqBC0y9YgJ';
		  
		  $recaptcha_challenge = $post['recaptcha_challenge'];
		  $recaptcha_response = $post['recaptcha_response'];
		  
		  $resp = recaptcha_check_answer($privatekey,$_SERVER["REMOTE_ADDR"],$recaptcha_challenge ,$recaptcha_response );
		  
		   if($resp->is_valid)
			{
			 echo "1";
			}
			else
			{
			 echo "2";
			}
		
	
	}
	
	public function sendmessage($post)
	{	
		$cus_name = $post['cus_name'];
		$cus_email = $post['cus_email'];
		$cus_phone = $post['cus_phone'];
		$cus_msg = $post['cus_msg'];
	
    	$subject    = 'Handyman.com Contact Us';
    	$content = $this->renderPartial('contactmail', array('name' => $cus_name,'message' => $cus_msg,'phone' => $cus_phone), true);
    	$headers="From: ".$cus_email."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
    	
    	mail("sephjavier@gmail.com",$subject,$content,$headers);
		echo "1";

	}
	

    
}