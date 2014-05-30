<?php

class FileuploadajaxController extends Controller
{
    public function filters()
    {
        return array(array('application.filters.DefaultFilter', 'actions'=>'*'));
    }
	
    public function actionIndex()
    {
		
		
		 //$this->load->library('uploadhandler');
		$options = array( 'upload_dir' => './uploads/profile/',
            'upload_url' =>'/uploads/profile/',
      'accept_file_types'=>'/\.(gif|jpeg|jpg|png)$/i');
         //$this->load->library('uploadhandler',$options);
	
		//UploadHandler::model($options);
		//require('./UploadHandler.php');
		$upload_handler = new UploadHandler($options);
		
	}
	
	
	public function actionSavelogo(){
		$options = array( 'upload_dir' => './uploads/profile/',
            'upload_url' =>'/uploads/profile/',
      'accept_file_types'=>'/\.(gif|jpeg|jpg|png)$/i');

		$upload_handler = new UploadHandler($options);
	}
	
	public function actionUploadmultiple(){
		$options = array( 'upload_dir' => './uploads/gallery/',
            'upload_url' =>'/uploads/gallery/',
      'accept_file_types'=>'/\.(gif|jpeg|jpg|png)$/i');

		$upload_handler = new UploadHandler($options);
	}
	
	public function actionSaveworkgallery(){
		$filename = $_POST['filename'];
		$contractor_id = Yii::app()->user->getId();
		
				$contractor_photos = new Contractorphotos();
				$contractor_photos->contractor_id = $contractor_id;
				$contractor_photos->filename = $filename;
				$contractor_photos->is_profile = 0;
				
				$contractor_photos->insert();
		
	}
	
	
	public function actionSavehomeownerphoto(){
		$options = array( 'upload_dir' => './uploads/homeowner/',
            'upload_url' =>'/uploads/homeowner/',
      'accept_file_types'=>'/\.(gif|jpeg|jpg|png)$/i');

		$upload_handler = new UploadHandler($options);
	}
	
}?>