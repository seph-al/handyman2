<?php
	class WidgetsController extends Controller
{

	 public $layout='/layouts/empty';
	 
	 public function missingAction($action)
    {
        $action=str_replace('-','_',$action);
        $action='action'.ucfirst(strtolower($action));
        if(method_exists($this,$action))
            $this->$action();
        else
            $this->actionIndex();
    }
	
	/*widget for search contractor*/
	public function actionIndex(){
		$zipcode =  Yii::app()->Ini->v('zipcode');
		$projecttype = Yii::app()->Ini->v('projecttype');
		$limit = 5;
		
		$projects = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
		
		$criteria=new CDbCriteria();
		$criteria->limit = $limit;
		$criteria->order = "ContractorId DESC";
		
		if($zipcode!== ""  && $projecttype !== "" ){			
    		$criteria->condition = "Zip = $zipcode AND ProjectTypeId = $projecttype";
		}else if($zipcode=== ""  && $projecttype !== "" ){
    		$criteria->condition = "ProjectTypeId = $projecttype";
		}else if($zipcode!== ""  && $projecttype === "" ){
			$criteria->condition = "Zip = $zipcode";
		}else{
			/* initially load latest contractors */
		}
		
		$contractors = Contractors::model()->findAll($criteria);
		
		$data['contractors'] = $contractors;
		$data['projects'] = $projects;
		
		$this->render('search-contractors',$data);
		
	}
	
	public function actionSearchbyzip(){
		$username = Yii::app()->Ini->v('username');
		$aff_id = Yii::app()->Ini->v('aff_id');
		
			if(!empty($aff_id)){
			
				//get username based on affiliate id
				$affiliate = Affiliates::model()->findByAttributes(array('affiliate_id' => $aff_id));
				if(count($affiliate) > 0){
					$role = $affiliate->user_type;
					$userid = $affiliate->userid;
					if($role == 'contractor'){
						$contractor = Contractors::model()->findbyPk($userid);
						$username = $contractor->Username;
					}else{
						$homeowners = Homeowners::model()->findbyPk($userid);
						$username = $homeowners->username;
					}
					
				}else{
					$username = 'guest';
				}
			}else if($username != ""){
				//get contractor's affiliate id
				$contractors = Contractors::model()->findByAttributes(array('Username' => $username));
				if(count($contractors) > 0){
					$userid = $contractors->ContractorId;
						
					$affiliates = Affiliates::model()->findByAttributes(array('userid' => $userid,'user_type' => 'contractor'));
					if(count($affiliates)>0)
					$aff_id = $affiliates->affiliate_id;
					else
					$aff_id = 10231; //handyman affiliate id
				}else{
					$username = 'guest';
					$aff_id = 10231;
				}
			}
		$data['username'] = $username;
		$data['aff_id'] = $aff_id;
		$this->render('searchbyzip',$data);
	}
	
	public function actionSearchhorizontal(){
		$data['username'] = $_GET['username'];
		$this->render('horizontal-search',$data);
	}
	
	 public function actionSearchcontractor(){
		$zipcode = Yii::app()->Ini->v('zipcode');
		$projecttype = Yii::app()->Ini->v('projecttype');
		$home_advisor_results = false;
			
			if(!empty($projecttype)){
				 $details = Projecttypes::model()->findByAttributes(array('ProjectTypeId'=>$projecttype));
				  if (count($details)>0){ 
					
					$oid =  $details->OID;
					$city_name = $details->Name;
						
						$home_advisor = Yii::app()->Ini->searchhomeadvisor($zipcode,$oid);
						  if($home_advisor == false){
								$home_advisor_results = false;
							}else{
								$home_advisor_results = $home_advisor['serviceProvider'];
							}
					
				  }
			 }
					$criteria=new CDbCriteria();
					
					if($zipcode > 0 && empty($projecttype)){ //no project type
						$criteria->condition = "Zip=".$zipcode;
						$title = "In zipcode ".$zipcode;
					
					}if(empty($zipcode) && !empty($projecttype)){ //no zipcode
						$criteria->condition = "ProjectTypeId=".$projecttype;
						$title = $this->getProjectTypeName($projecttype);
					
					}else if($zipcode > 0 && !empty($projecttype)){ //both are provided
						$criteria->condition = "ProjectTypeId=".$projecttype." AND Zip=".$zipcode;
						$title = $this->getProjectTypeName($projecttype)." In zipcode ".$zipcode;
					
					}else if(empty($zipcode) && empty($projecttype)){ //both are missing
						$criteria->order = 'RAND()';
						$title = "";
					}
					
					
					$criteria->limit = 10;
					$criteria->order = 'ContractorId DESC';
					$models=Contractors::model()->findAll($criteria);
			
			$param = array();
			$param['home_advisor_results'] = $home_advisor_results;
			
			$param['contractors'] = $models;
			$param['title'] = $title;
			
		$this->render('/refer/refer-find-result',$param);
	}
	
	private function getProjectTypeName($project_type_id){
			$name = "";
			$details = Projecttypes::model()->findByAttributes(array('ProjectTypeId'=>$project_type_id));
    		  if (count($details)>0){ 
	          	$name = $details->Name;
	          }
			  return $name;
	 }
	
}
?>