<?php

class FileuploadController extends Controller
{
 
    public $layout='/layouts/home';
    public $cities = "";

	
	public function actionTest(){
		$this->pageTitle = 'Handyman.com - My Profile';
		$contractor_id = Yii::app()->user->getId();
		$profile_details = Contractors::model()->findByAttributes(array('ContractorId'=>$contractor_id));
		$this->render('test',array());
	}
	
	/*public function actionIndex(){
		$method = Yii::app()->Ini->v('t');
        if(method_exists(__CLASS__, Yii::app()->Ini->aN($method)))
            return $this->{Yii::app()->Ini->aN($method)}($_POST);
        else
			$this->redirect(Yii::app()->homeUrl);
		
	}*/
	
	public function processupload(){
		header('Access-Control-Allow-Origin: *');
		 //$this->load->library('uploadhandler');
		$options = array( 'upload_dir' => './uploads/profile/',
            'upload_url' =>base_url().'/uploads/profile/',
      'accept_file_types'=>'/\.(gif|jpeg|jpg|png)$/i');
         //$this->load->library('uploadhandler',$options);
	
		UploadHandler::model($options);
	}
}	
?>