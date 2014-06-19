<?php

class ReferController extends Controller
{
 
    public $layout='/layouts/home';
    public $cities = "";

   
    
     public function actionIndex($id){
    	
    }
    
    
    public function actionProfile($username){
    	$details = Contractors::model()->findByAttributes(array('Username'=>$username));
    	$pic = '';
    	$bg = '';
    	$zipcode =  Yii::app()->Ini->v('zipcode');
		$projecttype = Yii::app()->Ini->v('projecttype');
		$project = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
		
    	if (count($details)>0){
    	  $this->pageTitle = 'Handyman.com - Refer '.$details->Name;
    	  $criteria=new CDbCriteria();
    	  $criteria->condition = "contractor_id = ".$details->ContractorId;
		  $photo = Contractorphotos::model()->findAll($criteria);
		  $socials = ContractorSocials::model()->findAll($criteria);
		  $bonds = ContractorBond::model()->findByAttributes(array('contractor_id'=>$details->ContractorId));
		  $license = ContractorLicense::model()->findByAttributes(array('contractor_id'=>$details->ContractorId));
		  
		  if (count($photo) > 0){
		  	foreach ($photo as $k=>$v){
		  		if ($v->is_profile == 1){
		  			$pic = $v->filename;
		  		}else if ($v->is_bg == 1){
		  			$bg = $v->filename;
		  		}
		  		
		  		
		  	}
		  }
		  
		  $this->render('refer', array( 'profile' => $details,'logo'=>$pic,'bg'=>$bg,'socials'=>$socials,'bonds'=>$bonds,'license'=>$license,
		  'zipcode' => $zipcode,
		  'projecttype' => $projecttype,
		  'project' => $project));
		}else {
    		$this->redirect(Yii::app()->homeUrl.'home/error');
    	}
    }
    
    
    
   
}
