<?php

class ContractorController extends Controller
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
    
    public function actionFind()
    {
    	$location = Yii::app()->Ini->getlocationbyip(Yii::app()->Ini->rip('ip'));
    	$projects = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
    	$criteria = new CDbCriteria();
		$criteria->order = "question_id DESC";
		$criteria->limit = 5;
		$questions = Questions::model()->findAll($criteria); 
				
    	$states = States::model()->findAll(array('order' => 'Name ASC'));
        $city =  Yii::app()->Ini->v('city');
        $project =  Yii::app()->Ini->v('project');
        $zipcode =  Yii::app()->Ini->v('zipcode');
		$match = Yii::app()->Ini->v('match');
		
    	if ($city){
    		
    		 $details = Cities::model()->findByAttributes(array('RewriteUrl'=>$city."/"));
    		  if (count($details)>0){ 
	          	$city_name = $details->Name;
	          }
    		$criteria=new CDbCriteria();
    		$criteria->condition = "City like '%$city_name%'";
		    $count=Contractors::model()->count($criteria);
		    $pages=new CPagination($count);

		    // results per page
		    $pages->pageSize=5;
		    $pages->applyLimit($criteria);
		    $models=Contractors::model()->findAll($criteria);
    		
		     $this->render('find_result', array(
	            'models' => $models,
	            'pages' => $pages,
		        'projects'=>$projects,
		        'records'=>$count,
		        'city_name'=>$city_name,
		        'location'=>$city_name.",USA",
		        'questions'=>$questions
             ));
             
    	}else if($project && $zipcode){
			 $details = Projecttypes::model()->findByAttributes(array('ProjectTypeId'=>$project));
    		  if (count($details)>0){ 
	          	
				$oid =  $details->OID;
				$city_name = $details->Name;
					
					$home_advisor = Yii::app()->Ini->searchhomeadvisor($zipcode,$oid);
					  //$home_advisor = Yii::app()->Ini->searchhomeadvisor('11741','12005');
					  if($home_advisor == false){
							$home_advisor_results = false;
						}else{
							$home_advisor_results = $home_advisor['serviceProvider'];
						}
				
			  }
			  

					$criteria=new CDbCriteria();
					$criteria->condition = "ProjectTypeId=".$project." AND Zip=".$zipcode;
					$count=Contractors::model()->count($criteria);
					$pages=new CPagination($count);

					// results per page
					$pages->pageSize=5;
					$pages->applyLimit($criteria);
					$models=Contractors::model()->findAll($criteria);
				
				$this->render('match-result',array('pages' => $pages,'result' => $models,'home_advisors' => $home_advisor_results,'projects'=>$projects,'states'=>$states,'location'=>$location
				,'city_name'=>$city_name.' In Zipcode '.$zipcode,'questions'=>$questions));
			  
			  
			  
			  
		}else if ($project){
    		 
    	 $details = Projecttypes::model()->findByAttributes(array('ProjectTypeId'=>$project));
    		  if (count($details)>0){ 
	          	$city_name = $details->Name;
	          }
    		
    		$criteria=new CDbCriteria();
    		$criteria->condition = "ProjectTypeId=".$project;
		    $count=Contractors::model()->count($criteria);
		    $pages=new CPagination($count);

		    // results per page
		    $pages->pageSize=5;
		    $pages->applyLimit($criteria);
		    $models=Contractors::model()->findAll($criteria);
    		
		     $this->render('find_result', array(
	            'models' => $models,
	            'pages' => $pages,
		        'projects'=>$projects,
		        'records'=>$count,
		        'city_name'=>$city_name,
		        'location'=>$location,
		        'questions'=>$questions
             ));
    	}else if ($zipcode){
    		 
    		$criteria=new CDbCriteria();
    		$criteria->condition = "Zip='$zipcode'";
		    $count=Contractors::model()->count($criteria);
		    $pages=new CPagination($count);

		    // results per page
		    $pages->pageSize=5;
		    $pages->applyLimit($criteria);
		    $models=Contractors::model()->findAll($criteria);
    		
		     $this->render('find_result', array(
	            'models' => $models,
	            'pages' => $pages,
		        'projects'=>$projects,
		        'records'=>$count,
		        'city_name'=>$zipcode,
		        'questions'=>$questions
             ));
    	}else if($match){
			$proj = Projects::model()->findByPk($match);
			if (count($proj)>0){ 
	          	$proj_zipcode = $proj->zipcode;
	          	$project_type_id = $proj->project_type_id;
				
					$criteria=new CDbCriteria();
					$criteria->condition = "ProjectTypeId='$project_type_id' AND Zip = '$proj_zipcode'";
					$count = Contractors::model()->count($criteria);
					$pages = new CPagination($count);
					$result=Contractors::model()->findAll($criteria);
					
					$projecttypes = ProjectTypes::model()->findByPK($project_type_id);
					$proj_oid = $projecttypes->OID;
					//$proj_zipcode = '11741';
					//$proj_oid = '12070';
					$home_advisor = Yii::app()->Ini->searchhomeadvisor($proj_zipcode,$proj_oid);
						if($home_advisor == false){
							$home_advisor_results = false;
						}else{
							$home_advisor_results = $home_advisor['serviceProvider'];
						}
					
					
					$this->render('match-result',array('pages' => $pages,'result' => $result,'home_advisors' => $home_advisor_results,'projects'=>$projects,'states'=>$states,'location'=>$location,'city_name'=>$this->getProjectTypeName($project_type_id).' In Zipcode '.$proj_zipcode,'questions'=>$questions));
			}else{
				$this->render('find_form', array('projects'=>$projects,'states'=>$states,'location'=>$location,'questions'=>$questions));
			}
		}
    	else {
    		
    		$this->render('find_form', array('projects'=>$projects,'states'=>$states,'location'=>$location,'questions'=>$questions));
    	}
    	
    	
    }
	
	public function getProjectTypeName($project_type_id){
			$name = "";
			$details = Projecttypes::model()->findByAttributes(array('ProjectTypeId'=>$project_type_id));
    		  if (count($details)>0){ 
	          	$name = $details->Name;
	          }
			  return $name;
	 }
	 
	 
	 
	 
	 
	 
	public function actionProfile(){
		$username = Yii::app()->Ini->v('user');
		$profile_details = Contractors::model()->findByAttributes(array('Username'=>$username));
		$current_userid = Yii::app()->user->getId();
		$con_id = $profile_details->ContractorId;
		$criteria=new CDbCriteria();
		$criteria->condition = "contractor_id = '$con_id'";
		$feedback = Feedback::model()->findAll($criteria);
		$criteria_social = new CDbCriteria();
		$criteria_social->condition = "contractor_id = '$con_id'";
		$social_accounts = ContractorSocials::model()->findAll($criteria_social);
		$contractor_license = ContractorLicense::model()->findByAttributes(array('contractor_id'=>$con_id));
		$contractor_bond = ContractorBond::model()->findByAttributes(array('contractor_id'=>$con_id));
		$contractor_points = Contractors::model()->updatePoints($con_id);
		
			if(count($profile_details)>0){
		        $profile_details->updatePoints($profile_details->ContractorId);
		        $contractor_id = $con_id;
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
				$photo_cover = $this->getProfileCover($profile_details->ContractorId);
				
					
					
					$is_my_profile = false;
					$homeowner_projects = array();
					if (!Yii::app()->user->isGuest){
						if($contractor_id == $current_userid){
							$is_my_profile = true;
						}else{
							
							/*
								if homeowner
								can send message and attach project
							*/
							
							 if(Yii::app()->user->role == 'homeowner'){
									$criteria=new CDbCriteria();
									$criteria->condition = "homeowner_id = ".$current_userid;
									$homeowner_projects = Projects::model()->findAll($criteria);
									
							 }
							
							
						}
					}
					
					//get map location
					$address = urlencode($address1.','.$city.','.$state.",".$zipcode.",USA");
					$l = explode(",",Yii::app()->Ini->GetMapLocation($address));
					$point = array($address1.','.$city.','.$state,floatval($l[0]),floatval($l[1]),0); 
					
				
					$this->pageTitle = 'Handyman.com - Contractor - '.$company.' Profile';
					$this->render('contractor-profile', array( 'profile_exists' => true,
									'contractor_id' =>$contractor_id,
									'company' => $company,
								   'contact_name' => $contact_name,
								   'phone' => $phone,
								   'fax' => $fax,
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
								   'logo' => $this->getContractorProfilePic($profile_details->ContractorId),
								   'is_my_profile' => $is_my_profile,
								   'contractor_license' => $contractor_license,
								   'contractor_bond' => $contractor_bond,
								   'social_accounts' => $social_accounts,
								   'contractor_points' => $contractor_points,
								   'feedback' => $feedback,
								   'photo_cover' => $photo_cover,
								   'my_gallery' => Contractorphotos::model()->findAllByAttributes(array('contractor_id'=>$contractor_id,'is_profile'=>'0'))
								   ,'homeowner_projects'=>$homeowner_projects,
								   'point'=>$point,
								   'map_location'=>$l
								   ));
								   
                //update views
			    if (!Yii::app()->user->isGuest){
			    	$userid = Yii::app()->user->getId();
			    	$role = Yii::app()->user->role;
                  $views = ContractorViews::model()->findByAttributes(array('viewed_by'=>$userid,'contractor_id'=>$contractor_id,'viewed_user_type'=>$role));
                  if (count($views)> 0){
                  }else {
                     $views = new ContractorViews();
                     $views->contractor_id = $contractor_id;
                     $views->viewed_by = $userid;
                     $views->viewed_user_type = $role;
                     $views->save();	
                  }
               }
				
              
					
			}else{
				$this->redirect(Yii::app()->homeUrl.'home/error');
			}
			
			
		
	}
    
	public function actionSignup(){
		$projects = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
		$refer = Yii::app()->Ini->v('refer');
		$refer_id = '';
		if ($refer != ''){
			$details = Contractors::model()->findByAttributes(array('Username'=>$refer));
			if (count($details >0)){
				$refer_id = $details->ContractorId;
			}
		}
		$this->render('signup',array('title'=>'Sign Up as contractor','projects'=>$projects,'refer_id'=>$refer_id));
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
	 
	public function actionHomeadvisercall(){
		/*test run HA API*/
		$result = Yii::app()->Ini->searchhomeadvisor('11741','12070');
		var_dump($result);
		exit();
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
	
	public function actionInvite(){
		if (!Yii::app()->user->isGuest){
			 $userid = Yii::app()->user->getId();
			 $role = Yii::app()->user->role;
			 
			 if ($role == 'contractor'){
			 	$details = Contractors::model()->findByPk($userid);
			 	$this->render('contractor-invite', array('details'=>$details));
			 }else {
			 	$this->redirect(Yii::app()->homeUrl.'dashboard/home-owner');
			 } 	
			    	
		}else {
			$this->redirect(Yii::app()->homeUrl);
		}		    	
	}
	
	
public function actionInvite_To_Team2(){
		if (!Yii::app()->user->isGuest){
			 $userid = Yii::app()->user->getId();
			 $role = Yii::app()->user->role;
			 $keyword =  Yii::app()->Ini->v('keyword');
			 
			 if ($role == 'contractor'){
			 	$details = Contractors::model()->findByPk($userid);
			 	$criteria = new CDbCriteria();
			 	
			 	/*if ($keyword !=""){
			 		$criteria->condition = "ContractorId!=$userid and (`Name` LIKE '%$keyword%' OR ContactName LIKE '%$keyword%' OR Address1 LIKE '%$keyword%' OR City like '%$keyword%' OR State like '%$keyword%')";
			 	}else {
			 		$criteria->condition = "ContractorId!=$userid";
			 	}*/
				$criteria->order = "ContractorId DESC";
			
				
				$count = Contractors::model()->count($criteria);
				$pages = new CPagination($count);
				// results per page
				$pages->pageSize=10;
				$pages->applyLimit($criteria);
				
				$result = Contractors::model()->findAll($criteria);
				$param['details'] = $details;
				$param['result'] = $result;
				$param['pages'] = $pages;
				
				
			 	$this->render('contractor-invite-team', $param);
			 }else {
			 	$this->redirect(Yii::app()->homeUrl.'dashboard/home-owner');
			 } 	
			    	
		}else {
			$this->redirect(Yii::app()->homeUrl);
		}		    	
	}
    
	
	public function actionInviteTeam(){
		if (!Yii::app()->user->isGuest){
		
			$keyword =  Yii::app()->Ini->v('keyword');
			$userid = Yii::app()->user->getId();
			$limit = 6;
			
			$criteria = new CDbCriteria();
				if ($keyword !=""){
					$criteria->condition = "ContractorId!=$userid and (`Name` LIKE '%$keyword%' OR ContactName LIKE '%$keyword%' OR Address1 LIKE '%$keyword%' OR City like '%$keyword%' OR State like '%$keyword%') AND ContractorId NOT IN(SELECT invited_id FROM `contractor_team` WHERE contractor_id = $userid)";
				}else {
						$criteria->condition = "ContractorId!=$userid AND ContractorId NOT IN(SELECT invited_id FROM `contractor_team` WHERE contractor_id = $userid)";
				}
				
			$criteria->order = "ContractorId DESC";
			$count = Contractors::model()->count($criteria);
			$pages = new CPagination($count);
			$pages->pageSize=$limit;
			$pages->applyLimit($criteria);
			$result = Contractors::model()->findAll($criteria);
					
					$param['result'] = $result;
					$param['pages'] = $pages;
				
					
			$this->render('contractor-invite-team', $param);
		
		}else {
			$this->redirect(Yii::app()->homeUrl);
		}	
	}
	
	public function actionRefer(){
		if (!Yii::app()->user->isGuest){
		
			
			$userid = Yii::app()->user->getId();
			$details = Contractors::model()->findbyPk($userid);
			
			$param['username'] = $details->Username;	
					
			$this->render('get-refer-link', $param);
		
		}else {
			$this->redirect(Yii::app()->homeUrl);
		}	
	}
	
public function actionTeamRequests(){
		if (!Yii::app()->user->isGuest){
		
			$keyword =  Yii::app()->Ini->v('keyword');
			$userid = Yii::app()->user->getId();
			$limit = 6;
			
			$criteria = new CDbCriteria();
		    $criteria->condition = "invited_id = $userid AND confirmed = 0";
			$criteria->order = "member_id ASC";
			
			$count = ContractorTeam::model()->count($criteria);
			$pages = new CPagination($count);
			$pages->pageSize=$limit;
			$pages->applyLimit($criteria);
			$result = ContractorTeam::model()->findAll($criteria);
					
					$param['result'] = $result;
					$param['pages'] = $pages;
				
					
			$this->render('contractor-invite-requests', $param);
		
		}else {
			$this->redirect(Yii::app()->homeUrl);
		}	
	}
	
}
