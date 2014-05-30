<?php

class LoginajaxController extends Controller
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
    
    public function loginhomeowner($post)
    {
            $identity=new UserIdentity($post['homeowner_email'],$post['homeowner_password'],'homeowner');
        	if($identity->authenticate()){
			   Yii::app()->user->login($identity);
               $owner_id = Yii::app()->user->getId();    
               $status = true; 			
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
               $status = true; 			
			}else{
			    $status = false; 
        	    $return['message'] = $identity->errorMessage;
			}
			$return['status'] = $status;
            $this->renderJSON($return, $status);
			
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