<?php

class ApiController extends Controller
{
	 private function renderRequest($data, $message = '', $type = 'json')
    {
                header('Content-Type: application/json');
                if(!is_array($data)){
                    $data = array('error_message'=> array(((!empty($message)? $message : 'No input data'))));
                    echo CJSON::encode(array_merge(array('success'=>false, 'data'=>$data)));
                }else{
                    echo CJSON::encode(array_merge(array('success'=>true, 'data'=>$data)));
                }
            
        
        Yii::app()->Ini->end();
    }
    
     public function actionGetprojecttypes(){
   	   	$rows = array(); 
   	   	$i=0;
     	$types = Projecttypes::model()->findAll(array(
				    	'order'=>'Name Asc'
				    ));
						
		if (count($types)>0){
			foreach ($types as $key=>$val){
				$rows[$i]['ProjectTypeId'] = $val->ProjectTypeId;
				$rows[$i]['Name'] = $val->Name;
				$i++;
			}
		}				
	    $this->renderRequest($rows);
       
   }
   
   public function actionSaveproject(){
   	   header('Access-Control-Allow-Origin: *');
   	   $rows = array();
   	   if (Homeowners::model()->countByAttributes(array('email'=>$_POST['email']))==0){
        		if (Homeowners::model()->countByAttributes(array('username'=>$_POST['username']))==0){
        			 $password = Yii::app()->Ini->generate_password();
        			 $huser = new Homeowners();
        		     $huser->firstname       = $_POST['firstname'];
		             $huser->lastname        = $_POST['lastname'];
		             $huser->email  = $_POST['email'];
		             $huser->phone_number = $_POST['phone_number'];
		             $huser->username  = $_POST['username'];
		             $huser->password = $password;
		             
		             if ($huser->save()){
		             	 Yii::app()->Ini->savetovnoc($_POST['email']);
			             $owner_id = Yii::app()->db->getLastInsertId();
			             Yii::app()->Ini->savetoaffiliate($owner_id,'homeowner');   
			             $this->SendMailAfterSignUp($owner_id);
			             
			               $proj = new Projects();
				           $proj->project_type_id = $_POST['projecttype'];
				           $proj->description = $_POST['projectdesc'];
				           $proj->start_date = $_POST['projectstart'];
				           $proj->status_for_project = $_POST['projectstatus'];
				           $proj->time_frame = $_POST['projecttimeframe'];
				           $proj->owned_property = $_POST['won_pro'];
				           $proj->address = $_POST['projectaddress'];
				           $proj->state_id = $_POST['projectstate'];
				           $proj->city = $_POST['city'];
				           $proj->zipcode = $_POST['zip_code'];
				           $proj->budget = $_POST['projectbudget'];
				           $proj->homeowner_id = $owner_id;
				           if ($proj->save()){
					           $proj_id = Yii::app()->db->getLastInsertId();	
					           $this->SendMailAfterProject($proj_id);
					           Yii::app()->Ini->renovationapi($proj_id);
					           $this->renderRequest(array('success'=>true));
				           }else {
				           	$this->renderRequest(false, $proj->getErrors());	
				           }
				     }else {
		             	$this->renderRequest(false, $huser->getErrors());	
        			 }
		      }else {
        			$this->renderRequest(false, 'Username already exists');	
        		}
        	
   	   }else {
   	   	   $this->renderRequest(false, 'Email already exists');	
   	   } 
   	   
   }
   
   public function actionCheckexists(){
   	    $rows = array(); 
     	$field    = Yii::app()->Ini->v('field');
     	$value = Yii::app()->Ini->v('value');
     	$count = Homeowners::model()->countByAttributes(array($field=>$value));
     	if ($count >0){
     		$rows['exists'] = true;
     	}else {
     		$rows['exists'] = false;
     	}
     	
     	  $this->renderRequest($rows);
   } 
   
   public function actionAutologin(){
   	    $email = base64_decode(Yii::app()->Ini->v('code'));
   	    $details = Homeowners::model()->findByAttributes(array('email'=>$email));
   	    if (count($details)){
   	    	  $identity=new UserIdentity($details->email,$details->password,'homeowner');
        	  if($identity->authenticate()){
			   Yii::app()->user->login($identity);
               $owner_id = Yii::app()->user->getId();    
               $this->redirect(Yii::app()->homeUrl); 			
			 }else{
			      $this->redirect(Yii::app()->homeUrl);
			 }
	    }else {
   	    	$this->redirect(Yii::app()->homeUrl);
   	    }
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
    
private function SendMailAfterProject($projectid)
    {  
    	$pmodel          = Projects::model()->findByPk($projectid);
    	$subject    = Yii::app()->name.' Project Details';
    	$content = $this->renderPartial('postproject', array('proj' => $pmodel), true);
    	$headers="From: admin <admin@>".Yii::app()->name."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
    	
    	mail($pmodel->homeowner->email,$subject,$content,$headers);
	       
    }
    
    
    
}