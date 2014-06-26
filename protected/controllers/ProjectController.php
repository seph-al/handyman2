<?php

class ProjectController extends Controller
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
	
	if (!Yii::app()->user->isGuest){
    	$location = Yii::app()->Ini->getlocationbyip(Yii::app()->Ini->rip('ip'));
    	$projects = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
    	$states = States::model()->findAll(array('order' => 'Name ASC'));
    	$criteria = new CDbCriteria();
		$criteria->order = "question_id DESC";
		$criteria->limit = 5;
		$questions = Questions::model()->findAll($criteria); 
    	
        $city =  Yii::app()->Ini->v('city');
        $project =  Yii::app()->Ini->v('project');
        $zipcode =  Yii::app()->Ini->v('zipcode');
        
        $pie = new SimplePie();
		$pie->set_feed_url('http://media.handyman.com/feed/');
		$pie->init();
		$pie->handle_content_type();
        
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
		        'questions'=>$questions,
		        'feed'=>$pie
             ));
             
    	}else if ($project){
		
		 $zipcodevalue = Yii::app()->Ini->v('zipcode');
    	 $details = Projecttypes::model()->findByAttributes(array('ProjectTypeId'=>$project));
    		  if (count($details)>0){ 
	          	$search_name = $details->Name;
	          }
			  
		$add_cond = "";
		if($zipcodevalue != ""){
			$add_cond = "and zipcode=".$zipcodevalue;
			$search_name = $search_name." in zipcode ".$zipcodevalue;
		}
		$criteria = new CDbCriteria();
		$criteria->condition = "project_type_id=".$project." ".$add_cond;
		$count=Projects::model()->count($criteria);
		$pages=new CPagination($count);
		
    		
    		
		    // results per page
		    $pages->pageSize=5;
		    $pages->applyLimit($criteria);
		    $models=Projects::model()->findAll($criteria);
    		
		     $this->render('find_result', array(
	            'models' => $models,
	            'pages' => $pages,
		        'projects'=>$projects,
		        'records'=>$count,
		        'search_name'=>$search_name,
				 'location'=>"Albuquerque, New Mexico,USA",
		        'questions'=>$questions,
		       'feed'=>$pie
             ));
    	}else if ($zipcode){
    		
			$zipcodevalue = Yii::app()->Ini->v('zipcode');
			$project_id = Yii::app()->Ini->v('project_id');
    		$criteria=new CDbCriteria();
    		$criteria->condition = "zipcode='$zipcodevalue' AND project_type_id = '$project_id'";
		    $count=Projects::model()->count($criteria);
		    $pages=new CPagination($count);

		    // results per page
		    $pages->pageSize=5;
		    $pages->applyLimit($criteria);
		    $models=Projects::model()->findAll($criteria);
    		
		    $this->render('find_result', array(
	            'models' => $models,
	            'pages' => $pages,
		        'projects'=>$projects,
		        'records'=>$count,
		        'search_name'=>"Zipcode ".$zipcode,
				'location'=>"Albuquerque, New Mexico,USA",
		        'questions'=>$questions,
		        'feed'=>$pie
             ));
    	}
    	else {
    		$this->render('find_form', array('projects'=>$projects,'states'=>$states,'location'=>$location,'questions'=>$questions,'feed'=>$pie));
    	}
	}else{
	
		$this->redirect(Yii::app()->homeUrl.'login');
	
	}
    	
    	/*$this->pageTitle = 'Welcome to Handyman.com';
    	$this->render('index', $param);
        */
    }
    
    
     public function actionPost(){
		$project_type_id = Yii::app()->Ini->v('project');
		$zipcode = Yii::app()->Ini->v('zipcode');
		$refer = Yii::app()->Ini->v('refer');
		$from_index = false;
		
		if($project_type_id && $zipcode){
			$from_index = true;
		}
		
     	$project_id = Yii::app()->Ini->v('pid');
     	$this->pageTitle = 'Handyman.com - Post Project';
    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
    	$param['state'] = States::model()->findAll(array('order' => 'Name ASC'));
    	$param['default_project'] = $project_id;
		
		$param['from_index'] = $from_index;
		$param['project_type_id'] = $project_type_id;
		$param['zipcode'] = $zipcode;
		
       if ($refer != ''){
			$details = Contractors::model()->findByAttributes(array('Username'=>$refer));
			if (count($details) >0){
				$refer_id = $details->ContractorId;
			}else {
				$refer_id = '';
			}
		}else {
				$refer_id = '';
		}
		
		$param['refer_id'] = $refer_id;
    	$this->render('postproject', $param);
     }
   
     public function actionJobdetails(){
     	if (!Yii::app()->user->isGuest){
			$this->pageTitle = 'Handyman.com - Job Details';
			$project_id = Yii::app()->Ini->v('pj_id');
			//$criteria=new CDbCriteria();
			//$criteria->condition = "project_id = '$project_id'";
			$criteria=new CDbCriteria();
			$criteria->condition = "project_id = '$project_id'";
			
			$details = Projects::model()->findByAttributes(array('project_id'=>$project_id));
			if (count($details) > 0){
			
				$projectphotos = Projectphotos::model()->findAll($criteria);
				$main_photo = Projectphotos::model()->findByAttributes(array('project_id' => $project_id,'is_main' => '1'));
				//$projectphotos = Projectphotos::model()->findByAttributes(array('project_id'=>$project_id));
			
				
				if($main_photo){
					
					
					
					$main_photo = Yii::app()->request->baseUrl.'/uploads/projectphotos/'.$main_photo->filename;
				
				}else{
					
					$main_photo = "http://www.justmail.in/platinum/images/work_noimage.jpg";
				}
				
				
				 $this->render('project_details', array(
			            'project_id' => $details->project_id,
						'homeowner_id' => $details->homeowner_id,
						'project_type_name' => $this->getProjectTypeName($details->project_type_id),
						'description' => $details->description,
						'owner_name' => $this->getOwnerName($details->homeowner_id),
						'start_date' => $details->start_date,
						'status_for_project' => $details->status_for_project,
						'time_frame' => $details->time_frame,
						'owned_property' => $details->owned_property,
						'date_added' => $details->date_added,
						'state2' => $this->getStateByName($details->state_id),
						'status_for_project' => $details->status_for_project,
						'city' => $details->city,
						'zipcode' => $details->zipcode,
						'projectphotos' => $projectphotos,
						'username' => $this->getOwnerUname($details->homeowner_id),
						'main_photo' => $main_photo,
		             ));
			}else {
				$this->redirect(Yii::app()->homeUrl.'home/error');
			}    
     	}else {
     		$this->redirect(Yii::app()->homeUrl);
     	}
	 }
     
	 
	  public function actionEdit(){
	 
		if(!Yii::app()->user->isGuest){
			$this->pageTitle = 'Handyman.com - Edit Project';
			$project_id = Yii::app()->Ini->v('pj_id');
			$details = Projects::model()->findByAttributes(array('project_id'=>$project_id));
			$projects = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
			$state = States::model()->findAll(array('order' => 'Name ASC'));
			$default_project = $project_id;
			
			 $this->render('projectedit', array(
		            'project_id' => $details->project_id,
					'project_type_name' => $this->getProjectTypeName($details->project_type_id),
					'description' => $details->description,
					'start_date' => $details->start_date,
					'status_for_project' => $details->status_for_project,
					'time_frame' => $details->time_frame,
					'owned_property' => $details->owned_property,
					'city' => $details->city,
					'state2' => $this->getStateByName($details->state_id),
					'state' => $state,
					'projects' => $projects,
					'address' => $details->address,
					'zipcode' => $details->zipcode,
					'budget' => $details->budget,
					'project_type_id' => $details->project_type_id,
					'state_id' => $details->state_id,
          'default_project'=>$default_project
	             ));
		}else {
     		$this->redirect(Yii::app()->homeUrl);
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
	 
	 public function getStateByName($state_id){
		$name = "";
		$details = States::model()->findByAttributes(array('StateId'=>$state_id));
		if(count($details)>0){
			$name = $details->Name;
		}
		return $name;
	 
	 }
	 
	 public function getCitiesByName($city_id){
		$name = "";
		$details = Cities::model()->findByAttributes(array('StateId'=>$state_id));
		if(count($details)>0){
			$name = $details->Name;
		}
		return $name;
	 
	}
	
	public function getOwnerName($homeowner_id){
		$name = "";
		$details = Homeowners::model()->findByAttributes(array('homeowner_id'=>$homeowner_id));
		if(count($details)>0){
			$name = $details->firstname." ".$details->lastname;
		}
		return $name;
	
	}
	
	public function getOwnerUname($homeowner_id2){
	
		$name = "";
		$details = Homeowners::model()->findByAttributes(array('homeowner_id'=>$homeowner_id2));
		if(count($details)>0){
			$name = $details->username;
		}
		return $name;
	
	
	
	}
    
}
