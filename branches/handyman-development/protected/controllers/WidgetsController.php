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
		$data['username'] = $_GET['username'];
		//$this->render('search-zipcode',$data);
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