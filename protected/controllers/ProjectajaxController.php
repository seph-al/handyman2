<?php

class ProjectajaxController extends Controller
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
    
   public function getselectcities($post)
	{
	
		$return = $htmlParams     = array();
        $state_id = $post['state_id'];
        $criteria=new CDbCriteria();
    	$criteria->condition = "StateId = '$state_id'";
	    $htmlParams['cities']         = Cities::model()->findAll($criteria);
        $return['html']           = $this->renderPartial('cities', $htmlParams, true);
        $this->renderJSON($return, true);
	}
	
	public function saveproject($post){
		$indicator = $post['indicator'];
		$status = true;
        $return['indicator'] = $indicator;
        if ($indicator==2){
        	if (Homeowners::model()->countByAttributes(array('email'=>$post['homeown_email']))==0){
        		if (Homeowners::model()->countByAttributes(array('username'=>$post['howeown_pname']))==0){
        			 $password = Yii::app()->Ini->generate_password();
        			 $huser = new Homeowners();
        		     $huser->firstname       = $post['homeown_fname'];
		             $huser->lastname        = $post['homeown_lname'];
		             $huser->email  = $post['homeown_email'];
		             $huser->phone_number = $post['homeown_phone'];
		             $huser->username  = $post['howeown_pname'];
		             $huser->password = $password;
		             
		             if ($huser->save()){
		             	 Yii::app()->Ini-> savetovnoc($post['homeown_email']);
			             $owner_id = Yii::app()->db->getLastInsertId();
			             Yii::app()->Ini->savetoaffiliate($owner_id,'homeowner');   
			             $this->SendMailAfterSignUp($owner_id);
		             }else {
		             	 $status = false; 
        			     $return['message'] = $huser->getErrors();
		             }
		      }else {
        			$status = false; 
        			$return['message'] = "Username already exists.";
        		}
        	}else {
        		$status = false;
        		$return['message'] = "Email already exists.";
        	}
        }elseif($indicator==3){
			$status = true;
			$owner_id = Yii::app()->user->getId();
		}else {
        	
        	$identity=new UserIdentity($post['home_loginEmail'],$post['home_loginPassword'],'homeowner');
        	if($identity->authenticate()){
			   Yii::app()->user->login($identity);
               $owner_id = Yii::app()->user->getId();    			
			}else{
			    $status = false; 
        	    $return['message'] = $identity->errorMessage;
			}
        	
        }		
        
        if ($status){
           //saving to project
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
			   if($indicator==3){
				 $return['message'] = $this->renderPartial('successpost', array(), true);
			   }else if($indicator==2){
			   
				//echo $password;
				//echo $post['homeown_email'];
				//$return['message'] = $this->renderPartial('success', array(), true);
				$return['projectid'] = $proj_id;
				$identity=new UserIdentity($post['homeown_email'],$password,'homeowner');
				if($identity->authenticate()){
				   Yii::app()->user->login($identity);
				   $owner_id = Yii::app()->user->getId();
				   $return['message'] = $this->renderPartial('success', array(), true);
				}else{
					$status = false; 
					$return['message'] = $identity->errorMessage;
				}
				 
			   }else{
					$return['message'] = $this->renderPartial('success', array(), true);
			   }
           }else {
           	   $status = false; 
        	   $return['message'] = $proj->getErrors();
           }
        }    
           
        $return['status'] = $status;
        $this->renderJSON($return, $status);
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
    
	
	

	
public function editproject($post){
		$indicator = $post['indicator'];
		$project_id = $post['project_id'];
		$status = true;
       
		if($project_id != 0){
			Projects::model()->updateByPk($project_id, array(
				'project_type_id' => $post['projecttype'],
				'description' => $post['projectdesc'],
				'start_date' =>  $post['projectstart'],
				'status_for_project' => $post['projectstatus'],
				'time_frame' => $post['projecttimeframe'],
				'owned_property' => $post['won_pro'],
				'address' => $post['projectaddress'],
				'state_id' => $post['projectstate'],
				'city' => $post['city'],
				'zipcode' => $post['zip_code'],
				'budget' => $post['projectbudget']
			));
		}
        
        if ($status){
           //saving to project
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
	           $return['message'] = 'success';
           }else {
           	   $status = false; 
        	   $return['message'] = $proj->getErrors();
           }
        }    
           
        $return['status'] = $status;
        $this->renderJSON($return, $status);
	}
	
/*private function renderJSON2($array = array(), $status = true)
    {
        header('Content-Type: application/json');
        if(!is_array($array))
            $array = array('r'=>$array);
        if($status)
            echo CJSON::encode(array_merge(array('s'=>1), $array));
        else
            echo CJSON::encode(array_merge(array('s'=>0), $array));
        Yii::app()->Ini->end();
    }*/
	
public function saveprojectphotos($post){

	$project_id = $post['projectid'];
	$criteria=new CDbCriteria();
    $criteria->condition = "project_id = '$project_id'";
	
	$projectphotos = Projectphotos::model()->findAll($criteria);
	//echo count($projectphotos);
	if(count($projectphotos)>=6){
	
		$status = array('success' => false);
		$this->renderJSON($status);
	
	}else{
	
		$proj = new Projectphotos();
		$proj->project_id = $post['projectid'];
		$proj->filename = $post['filename'];
		$proj->is_main = $post['ismain'];
		$proj->save();
		$status = array('success' => true);
		$this->renderJSON($status);
	}
}

public function assignmain($post)
{
	$project_id = $post['projectid'];
	$photo_id = $post['photo_id'];
	$projectphotos=Projectphotos::model()->findByAttributes(array('project_id' => $project_id,'is_main' => '1'));
	
	if (count($projectphotos)>0){
				$projectphotos->is_main = 0;
				$projectphotos->save();
				
			Projectphotos::model()->updateByPk($photo_id, array(
				'is_main' => 1
			));
				
			}
		else{
			Projectphotos::model()->updateByPk($photo_id, array(
				'is_main' => 1
			));
		}
		$status = array('success' => true);
		$this->renderJSON($status);
}

public function editdescription($post){


	$jobdescdetails = $post['jobdescdetails'];
	$projectid = $post['projectid'];
	
		if($projectid != 0){
			Projects::model()->updateByPk($projectid, array(
				'description' => $post['jobdescdetails']
			));
		$status = array('success' => true);
		$this->renderJSON($status);	
		}

}

public function deleteproject($post){
	
	$project_id = $post['id'];
	if($project_id != 0){
		Projects::model()->deleteByPk($project_id);
		$criteria=new CDbCriteria();
		$criteria->condition = "project_id = '$project_id'";
		Projectphotos::model()->deleteAll($criteria);
		
		$status = array('success' => true);
		$this->renderJSON($status);	
	}
}


public function sendmsgtohomeowner($post){
	   $proj = new Messages();
	   $proj->subject = $post['msg_subject'];
	   $proj->message = $post['msg_content'];
	   $proj->from_id = Yii::app()->user->getId();
	   $proj->from_user_type = Yii::app()->user->role;
	   $proj->to_id = $post['project_owner2'];
	   $proj->to_user_type = 'homeowner';
	   $proj->date_sent = date("Y-m-d H:i:s");
	   if ($proj->save()){
		   	$status = array('success' => true);
			$this->renderJSON($status);
	   }else {
		   print_r($proj->getErrors());
           }	
}

public function emailnotification($post){

	$project_owner_id = $post['project_owner2'];
	$details    = $post['project_details'];
	$message = $post['msg_content'];
	$subject = $post['msg_subject'];
	$project_owner = Homeowners::model()->findByPk($project_owner_id);
	$project_owner_fname = $project_owner->firstname;
	$project_owner_email = $project_owner->email;
	$sender_name = Yii::app()->user->loginname;
	
	
    $content = $this->renderPartial('emailnotificationmessage', array('name' => $project_owner_fname,'message' => $message,'subject'=>$subject,'details'=>$details,'sender_name'=>$sender_name), true);
    $headers="From: admin <admin@>".Yii::app()->name."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
    	
    mail($project_owner_email,$subject,$content,$headers);
	$status = array('success' => true);
	$this->renderJSON($status);







}

public function deletepicture($post){

	$pic_id = $post['pic_id'];
	if($pic_id != 0){
		Projectphotos::model()->deleteByPk($pic_id);
		$status = array('success' => true);
		$this->renderJSON($status);	
	}


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

    
}//end class


