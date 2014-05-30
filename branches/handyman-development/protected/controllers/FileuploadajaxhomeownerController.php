<?php

class FileuploadajaxhomeownerController extends Controller
{
    public function filters()
    {
        return array(array('application.filters.DefaultFilter', 'actions'=>'*'));
    }
	
    public function actionIndex()
    {
		
		
		 //$this->load->library('uploadhandler');
		$options = array( 'upload_dir' => './uploads/projectphotos/',
            'upload_url' =>'/uploads/projectphotos/',
      'accept_file_types'=>'/\.(gif|jpeg|jpg|png)$/i');
         //$this->load->library('uploadhandler',$options);
	
		//UploadHandler::model($options);
		//require('./UploadHandler.php');
		$upload_handler = new UploadHandler($options);
		
	}
	
	
}?>