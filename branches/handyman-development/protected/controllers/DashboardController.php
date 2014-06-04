<?php

class DashboardController extends Controller
{
 
    public $layout='/layouts/home';
    public $cities = "";

    public function missingAction($action)
    {
        $action=str_replace('-','_',$action);
        $action='action'.ucfirst(strtolower($action));
        if(method_exists($this,$action))
            $this->$action();
        else
            $this->actionIndex();
    }
    
    
    
    
    public function actionContractor()
    {
    	
    	 if (!Yii::app()->user->isGuest){
			if(Yii::app()->user->role == 'contractor'){
				$this->pageTitle = 'Handyman.com - Contractor Dashboard';
				$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
				$contractor_id = Yii::app()->user->getId();
				
				$model = Contractors::model()->findByPk($contractor_id);
				$param['page'] = "dashboard";
				$param['model'] = $model;
				
				$criteria=new CDbCriteria();
    		    $criteria->condition = "to_id=$contractor_id and to_user_type='contractor'";
		        $param['message_count'] = Messages::model()->count($criteria); 
				
				$criteria2 = new CdbCriteria();
				$criteria2->condition = "contractor_id = $contractor_id";
				$param['views_count'] = ContractorViews::model()->count($criteria2);
				 
				
				
				$oneWeekAgo =	date("Y-m-d H:i:s", strtotime("-1 months"));
				$criteria3 = new CdbCriteria();
				$criteria3->addBetweenCondition('date_added', $oneWeekAgo, date("Y-m-d H:i:s"));
				$param['latest_project_count'] = Projects::model()->count($criteria3);
				$param['from'] = $oneWeekAgo;
				$param['to'] = date("Y-m-d H:i:s");
				
				
				$this->render('contractor', $param);
				
			}else{
				$this->redirect(Yii::app()->homeUrl);
			}
    	 }else {
    	 	$this->redirect(Yii::app()->homeUrl);
    	 }
    }
	
	public function actionRefer_home_owner(){
		if (!Yii::app()->user->isGuest){
			if(Yii::app()->user->role == 'homeowner'){
			$this->pageTitle = 'Handyman.com - Refer Home Owner';
	    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
			$param['page'] = "dashboard";
	        $this->render('refer-home-owner', $param);
			}else{
				$this->redirect(Yii::app()->homeUrl);
			}
		}else {
			$this->redirect(Yii::app()->homeUrl);
		}
	}
	
	public function actionAsk_contractor(){
		if (!Yii::app()->user->isGuest){
			if(Yii::app()->user->role == 'homeowner'){
			$this->pageTitle = 'Handyman.com - My Questions';
	    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
			$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
			$param['page'] = "askContractor";
	        $this->render('ask-contractor', $param);
			}else{
				$this->redirect(Yii::app()->homeUrl);
			}
		}else {
			$this->redirect(Yii::app()->homeUrl);
		}
	
	}
	
	public function actionProjects()
	{
		if (!Yii::app()->user->isGuest){
			$this->pageTitle = 'Handyman.com - My Projects';
	    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
			$param['page'] = "projects";
	        $this->render('projects', $param);
		}else {
			$this->redirect(Yii::app()->homeUrl);
		}
	
	}
	
	public function actionHomeowner_account(){
	
		if (!Yii::app()->user->isGuest){
		if(Yii::app()->user->role == 'homeowner'){
			$this->pageTitle = 'Handyman.com - Home Owner Account';
	    	$param['hmodel'] = Homeowners::model()->findByPk(Yii::app()->user->getId());
			$param['state'] = States::model()->findAll(array('order' => 'Name ASC'));
			$param['page'] = "homeOwnerAccount";
	        $this->render('homeowner-account', $param);
		}else{
			$this->redirect(Yii::app()->homeUrl);
		}
		}else {
			$this->redirect(Yii::app()->homeUrl);
		}
	
	}
	
	public function actionMy_profile()
	{
		if (!Yii::app()->user->isGuest){
		if(Yii::app()->user->role == 'contractor'){
			$contractor_id = Yii::app()->user->getId();
			$profile_details = Contractors::model()->findByAttributes(array('ContractorId'=>$contractor_id));
			$criteria=new CDbCriteria();
			$criteria->condition = "contractor_id = '$contractor_id'";
			$feedback = Feedback::model()->findAll($criteria);
			$criteria_social = new CDbCriteria();
			$criteria_social->condition = "contractor_id = '$contractor_id'";
			$social_accounts = ContractorSocials::model()->findAll($criteria_social);
			$contractor_license = ContractorLicense::model()->findByAttributes(array('contractor_id'=>$contractor_id));
			$contractor_bond = ContractorBond::model()->findByAttributes(array('contractor_id'=>$contractor_id));
			$contractor_points = Contractors::model()->updatePoints($contractor_id);
			
			
			
			
			if (count($profile_details)>0){ 
				$company = $profile_details->Name;
				$contact_name = $profile_details->ContactName;
				$phone = $profile_details->Phone;
				$fax = $profile_details->Fax;
				$address1 = $profile_details->Address1;
				$address2 = $profile_details->Address2;
				$city = $profile_details->City;
				$state = $profile_details->State;
				$zipcode = $profile_details->Zip;
				$email = $profile_details->Email;
				$website = $profile_details->Website;
				$about = $profile_details->AboutBusiness;
				$services = $profile_details->Services;
				$date_created = $profile_details->Created;
				$username = $profile_details->Username;
				$project_type = $this->getProjectTypeName($profile_details->ProjectTypeId);
				$profile_pic = $this->getContractorProfilePic($contractor_id);
				$current_userid = $profile_details->ContractorId;
				$photo_cover = $this->getProfileCover($contractor_id);
			}
			
			$this->pageTitle = 'Handyman.com - '.$contact_name.' Profile';
			$is_my_profile = false;
			
			
				if($contractor_id == $current_userid){
					$is_my_profile = true;
				}
			
			

			
			$this->render('my-profile', array('company' => $company,
						   'contact_name' => $contact_name,
						   'phone' => $phone,
						   'address1' => $address1,
						   'address2' => $address2,
						   'city' => $city,
						   'state' => $state,
						   'zipcode' => $zipcode,
						   'email' => $email,
						   'website' => $website,
						   'about' => $about,
						   'services' => $services,
						   'date_created' => date('F j, Y', strtotime($date_created)),
						   'username' => $username,
						   'project_type' => $project_type,
						   'page' => 'profile',
						   'param' => "",
						   'profile_pic' => $profile_pic,
						   'feedback' => $feedback,
						   'is_my_profile' => $is_my_profile,
						   'contractor_license' => $contractor_license,
						   'contractor_bond' => $contractor_bond,
						   'social_accounts' => $social_accounts,
						   'contractor_points' => $contractor_points,
						   'photo_cover' => $photo_cover,
						   'my_gallery' => Contractorphotos::model()->findAllByAttributes(array('contractor_id'=>$contractor_id,'is_profile'=>'0'))
						   ));
						   
		}else{
			$this->redirect(Yii::app()->homeUrl);
		}
		}else {
    	 	$this->redirect(Yii::app()->homeUrl);
    	}
	}
	
	/*public function actionMy_profile2()
	{
		if (!Yii::app()->user->isGuest){
		if(Yii::app()->user->role == 'contractor'){
			$contractor_id = Yii::app()->user->getId();
			$profile_details = Contractors::model()->findByAttributes(array('ContractorId'=>$contractor_id));
			
			if (count($profile_details)>0){ 
				$company = $profile_details->Name;
				$contact_name = $profile_details->ContactName;
				$phone = $profile_details->Phone;
				$fax = $profile_details->Fax;
				$address1 = $profile_details->Address1;
				$address2 = $profile_details->Address2;
				$city = $profile_details->City;
				$state = $profile_details->State;
				$zipcode = $profile_details->Zip;
				$email = $profile_details->Email;
				$website = $profile_details->Website;
				$about = $profile_details->AboutBusiness;
				$services = $profile_details->Services;
				$date_created = $profile_details->Created;
				$username = $profile_details->Username;
				$project_type = $this->getProjectTypeName($profile_details->ProjectTypeId);
				$photo_cover = $this->getProfileCover($contractor_id);
				$profile_pic = $this->getContractorProfilePic($contractor_id);
				
			}
			
			$this->pageTitle = 'Handyman.com - '.$contact_name.' Profile';
			
			

			
			$this->render('my-profile2', array('company' => $company,
						   'contact_name' => $contact_name,
						   'phone' => $phone,
						   'address1' => $address1,
						   'address2' => $address2,
						   'city' => $city,
						   'state' => $state,
						   'zipcode' => $zipcode,
						   'email' => $email,
						   'website' => $website,
						   'about' => $about,
						   'services' => $services,
						   'date_created' => date('F j, Y', strtotime($date_created)),
						   'username' => $username,
						   'project_type' => $project_type,
						   'page' => 'profile',
						   'param' => "",
						   'profile_pic' => $profile_pic,
						   'photo_cover' => $photo_cover,
						   'my_gallery' => Contractorphotos::model()->findAllByAttributes(array('contractor_id'=>$contractor_id,'is_profile'=>'0'))
						   ));
						   
		}else{
			$this->redirect(Yii::app()->homeUrl);
		}
		}else {
    	 	$this->redirect(Yii::app()->homeUrl);
    	}
	}*/
	
	 public function getProjectTypeName($project_type_id){
			$name = "";
			$details = Projecttypes::model()->findByAttributes(array('ProjectTypeId'=>$project_type_id));
    		  if (count($details)>0){ 
	          	$name = $details->Name;
	          }
			  return $name;
	 }
	 
	 public function getContractorProfilePic($contractor_id){
		$contractorphotos=Contractorphotos::model()->findByAttributes(array('contractor_id' => $contractor_id,'is_profile' => '1'));
		
			if (count($contractorphotos)>0){
				return $contractorphotos->filename;
			}else{
				//return 'http://www.justmail.in/platinum/images/clapper.png'; //default avatar
				return false;
			}
	 }
	
	public function getProfileCover($contractor_id){
		$contractorphotos=Contractorphotos::model()->findByAttributes(array('contractor_id' => $contractor_id,'is_bg' => '1'));
		
			if (count($contractorphotos)>0){
				return $contractorphotos->filename;
			}else{
				//return 'http://www.justmail.in/platinum/images/clapper.png'; //default avatar
				return false;
			}
	
	}
	
	
	public function actionMy_account()
	{
		if (!Yii::app()->user->isGuest){
			if(Yii::app()->user->role == 'contractor'){
			$contractor_id = Yii::app()->user->getId();
			$this->pageTitle = 'Handyman.com - My Account';
			
			
	    	$param['city'] = Cities::model()->findAll(array('order' => 'Name ASC'));
			$param['state'] = States::model()->findAll(array('order' => 'Name ASC'));
			$param['page'] = "account";
			$param['cmodel'] = Contractors::model()->findByPk($contractor_id);
			//$param['csocials'] = ContractorSocials::model()->findbyAttributes(array('contractor_id' => $contractor_id));
			$socials = Socials::model()->findAll(array('order' => 'social ASC'));
			$user_socials = array();
			
				foreach($socials AS $k=>$v){
					$value = ContractorSocials::model()->findbyAttributes(array('contractor_id' => $contractor_id, 'social_id' => $v->social_id));
					$user_socials[$v->social_id] = $value->value;
				}
				
			$param['socials'] = $socials;
			$param['user_socials'] = $user_socials;	
			
			$param['clicense'] = ContractorLicense::model()->findbyAttributes(array('contractor_id' => $contractor_id));
			$param['cbond'] = ContractorBond::model()->findbyAttributes(array('contractor_id' => $contractor_id));
			$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
			$param['logo'] = $this->getContractorProfilePic($contractor_id);
	        $this->render('my-account', $param);
			}else{
				$this->redirect(Yii::app()->homeUrl);
			}
		}else {
			$this->redirect(Yii::app()->homeUrl);
		}
	}
	
	/*public function actionMy_reviews()
	{
		$this->pageTitle = 'Handyman.com - My Reviews';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
        $this->render('my-reviews', $param);
	}
	
	public function actionQuestion_and_answer()
	{
		$this->pageTitle = 'Handyman.com - Question and Answer';
    	$this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
        $this->render('my-reviews', $param);
	}*/
	
    
	public function actionHome_owner(){
 
		  if (!Yii::app()->user->isGuest){
			if(Yii::app()->user->role == 'homeowner'){
				   $this->pageTitle = 'Handyman.com - Home owner Dashboard';
				   $limit = 2;
				   $cnt = 0;
				   $start = 0;
				   $this->cities = Cities::model()->findAll(array('order' => 'RAND()','limit'=>10));
				   $user_id = Yii::app()->user->id;
				   $criteria=new CDbCriteria();
				   $criteria->condition = "homeowner_id = '$user_id' LIMIT $start,$limit";
				   $proj = Projects::model()->findAll($criteria);
				   $criteria2=new CDbCriteria();
				   $criteria2->condition = "homeowner_id = '$user_id'";
				   $proj2 = Projects::model()->findAll($criteria2);
				   $param['projects'] =  $proj;
				   $param['page'] = "homeOwner";
				   $param['total_cnt'] = count($proj2);
				   $param['display_per_page'] = $limit;
				   $param['curr_page'] = 1;
				   $param['display_pages'] = '2'; 
				   
				   
				   $this->render('home-owner', $param);
				   
			}else{
				$this->redirect(Yii::app()->homeUrl);
			}
		  }else {
		   $this->redirect(Yii::app()->homeUrl);
		  }
		 
	}
	
 public function actionMy_inbox()
    {
    	
    	 if (!Yii::app()->user->isGuest){
			
				$this->pageTitle = 'Handyman.com - My Inbox';
				$param['page'] = "homeOwner";
				$this->render('my-inbox',$param);
			
    	 }else {
    	 	$this->redirect(Yii::app()->homeUrl);
    	 }
    }
    
public function actionMy_questions(){
		if (!Yii::app()->user->isGuest){
			$this->pageTitle = 'Handyman.com - My Questions';
	    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
			$param['page'] = "askContractor";
	        $this->render('my-questions', $param);
	   }else {
			$this->redirect(Yii::app()->homeUrl);
		}
	
	}
}