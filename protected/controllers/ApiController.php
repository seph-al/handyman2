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
   
   public function actionSaveproject($post){
   	   header('Access-Control-Allow-Origin: *');
   	   $rows = array();
   	   if (Homeowners::model()->countByAttributes(array('email'=>$post['email']))==0){
        		if (Homeowners::model()->countByAttributes(array('username'=>$post['username']))==0){
        			 $password = Yii::app()->Ini->generate_password();
        			 $huser = new Homeowners();
        		     $huser->firstname       = $post['firstname'];
		             $huser->lastname        = $post['lastname'];
		             $huser->email  = $post['email'];
		             $huser->phone_number = $post['phone_number'];
		             $huser->username  = $post['username'];
		             $huser->password = $password;
		             
		             if ($huser->save()){
		             	 Yii::app()->Ini->savetovnoc($post['email']);
			             $owner_id = Yii::app()->db->getLastInsertId();
			             Yii::app()->Ini->savetoaffiliate($owner_id,'homeowner');   
			             $this->SendMailAfterSignUp($owner_id);
			             
			               $proj = new Projects();
				           $proj->project_type_id = $post['projecttype'];
				           $proj->description = $post['projectdesc'];
				           $proj->start_date = $post['projectstart'];
				           $proj->status_for_project = $post['projectstatus'];
				           $proj->time_frame = $post['projecttimeframe'];
				           $proj->owned_property = $post['won_pro'];
				           $proj->address = $post['projectaddress'];
				           $proj->state_id = $post['projectstate'];
				           $proj->city = $post['city'];
				           $proj->zipcode = $post['zip_code'];
				           $proj->budget = $post['projectbudget'];
				           $proj->homeowner_id = $owner_id;
				           if ($proj->save()){
					           $proj_id = Yii::app()->db->getLastInsertId();	
					           $this->SendMailAfterProject($proj_id);
					           Yii::app()->Ini->renovationapi($proj_id);
					           $rows['project_id'] = $proj_id;
					           $this->renderRequest($rows);
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
   
 private function SendMailAfterSignUp($userid)
    {  
    	$hmodel          = Homeowners::model()->findByPk($userid);
    	$subject    = Yii::app()->name.' Account Details For Home Owner';
    	$content = $this->renderPartial('../projectajax/signup', array('huser' => $hmodel), true);
    	$headers="From: admin <admin@>".Yii::app()->name."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
    	
    	mail($hmodel->email,$subject,$content,$headers);
	       
    }
    
private function SendMailAfterProject($projectid)
    {  
    	$pmodel          = Projects::model()->findByPk($projectid);
    	$subject    = Yii::app()->name.' Project Details';
    	$content = $this->renderPartial('../projectajax/postproject', array('proj' => $pmodel), true);
    	$headers="From: admin <admin@>".Yii::app()->name."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
    	
    	mail($pmodel->homeowner->email,$subject,$content,$headers);
	       
    }
    
}