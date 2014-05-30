<?php

class DashboardajaxController extends Controller
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
    
    
    public function updatehomeowneraccount($post){
  
    	$homeowner_id = Yii::app()->user->getId();
    	$email = $post['cusemail'];
    	$hmodel = Homeowners::model()->findByPk($homeowner_id);
    	$criteria=new CDbCriteria();
    	$criteria->condition = "email = '$email' and homeowner_id != $homeowner_id";
		$count=Homeowners::model()->count($criteria);
		if ($count == 0){
			$hmodel->firstname = $post['cusfname'];
			$hmodel->lastname = $post['cuslname'];
			$hmodel->phone_number = $post['cusphone'];
			$hmodel->email = $post['cusemail']; 
	        if ($hmodel->save()){
	        	  	$status = true;
	        }else {
	        		$status = false;
			        $return['message'] = 'Error in saving homeowner details.';
	        }		
		}else {
			$status = false;
			$return['message'] = 'Email already exists';
		}
		
		$return['status'] = $status;
        $this->renderJSON($return, $status);
    }
   
    public function updatepassword($post){
    	$homeowner_id = Yii::app()->user->getId();
    	$hmodel = Homeowners::model()->findByPk($homeowner_id);
    	$hmodel->password = $post['cuspassword'];
        if ($hmodel->save()){
	        	  	$status = true;
	        }else {
	        		$status = false;
			        $return['message'] = 'Error in saving password.';
	        }
	    $return['status'] = $status;
        $this->renderJSON($return, $status);
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
	
 public function updatecontractoraccount($post){
  
    	$contrator_id = Yii::app()->user->getId();
    	$email = $post['conemail'];
    	$cmodel = Contractors::model()->findByPk($contrator_id);
    	$criteria=new CDbCriteria();
    	$criteria->condition = "Email = '$email' and ContractorId != $contrator_id";
		$count=Contractors::model()->count($criteria);
		if ($count == 0){
			$cmodel->Name = $post['concompany'];
			$cmodel->ContactName = $post['conname'];
			$cmodel->Phone = $post['conphone'];
			$cmodel->Fax = $post['confax'];
			$cmodel->Address1 = $post['conaddress1'];
			$cmodel->Address2 = $post['conaddress2'];
			$cmodel->City = $post['concity'];
			$cmodel->State = $post['constate'];
			$cmodel->Zip = $post['conzip'];
			$cmodel->Email = $post['conemail'];
			$cmodel->Website = $post['conwebsite'];
			$cmodel->AboutBusiness = $post['conaboutbusiness'];
			$cmodel->Services = $post['conprimaryservices'];
			$cmodel->ProjectTypeId = $post['conprojecttype'];
			
	        if ($cmodel->save()){
	        	  	$status = true;
	        }else {
	        		$status = false;
			        $return['message'] = 'Error in saving contractor details.';
	        }		
		}else {
			$status = false;
			$return['message'] = 'Email already exists';
		}
		
		$return['status'] = $status;
        $this->renderJSON($return, $status);
    }
    
 public function updatecontractorpassword($post){
    	$contractor_id = Yii::app()->user->getId();
    	$cmodel = Contractors::model()->findByPk($contractor_id);
    	$cmodel->Password = $post['cuspassword'];
        if ($cmodel->save()){
	        	  	$status = true;
	        }else {
	        		$status = false;
			        $return['message'] = 'Error in saving password.';
	        }
	    $return['status'] = $status;
        $this->renderJSON($return, $status);
    }
    
   public function showinbox($post){
   	 
   	 $limit = 10;
	 $userid = Yii::app()->user->getId();
   	 $role = Yii::app()->user->role;
   	 $criteria=new CDbCriteria();
   	 $criteria2=new CDbCriteria();
   	  
   	  if ( $role == "homeowner"){
   	     $criteria->condition = "to_id = $userid AND to_user_type='homeowner' AND message_id NOT IN (Select message_id from messagedeleted where deleted_by=$userid and user_type='homeowner')";
    	 $criteria2->condition = "from_id = $userid AND from_user_type='homeowner' AND message_id NOT IN (Select message_id from messagedeleted where deleted_by=$userid and user_type='homeowner')";
	    
   	  }else if ($role == "contractor"){
   	  	 $criteria->condition = "to_id = $userid AND to_user_type='contractor' AND message_id NOT IN (Select message_id from messagedeleted where deleted_by=$userid and user_type='contractor')";
   	  	 $criteria2->condition = "from_id = $userid AND from_user_type='contractor' AND message_id NOT IN (Select message_id from messagedeleted where deleted_by=$userid and user_type='contractor')";
   	  }
   	
   	  $criteria->order = 'message_id DESC';
   	  $criteria2->order =  'message_id DESC';
   	  
	  $htmlParams['messages'] = Messages::model()->findAll($criteria);
	  $htmlParams['sent'] = Messages::model()->findAll($criteria2);
	  
	  $htmlParams['limit'] = $limit;
	  
	  $cnt_inbox = Messages::model()->count($criteria);
	  $cnt_sent = Messages::model()->count($criteria2);
	  
	  if ($cnt_inbox < $limit){
	  	$limit_inbox = $cnt_inbox;
	  }else {
	  	$limit_inbox = $limit;
	  }
	  
	  if ($cnt_sent < $limit){
	  	$limit_sent = $cnt_sent;
	  }else {
	  	$limit_sent = $limit;
	  }
	  
	  $htmlParams['cnt_inbox'] = $cnt_inbox;
      $htmlParams['cnt_sent'] = $cnt_sent;
	  $htmlParams['limit_inbox'] = $limit_inbox;
	  $htmlParams['limit_sent'] = $limit_sent;
      
      $htmlParams['curr_page'] = 1;
	  $return['html']  = $this->renderPartial('inbox', $htmlParams, true);
      $this->renderJSON($return, true);
   } 
   
   public function showmessage($post){
   	  $mesage_id = $post['id'];
   	  $from = $post['from'];
   	  $message = Messages::model()->findByPk($mesage_id);
   	  $message->read = 1;
   	  $message->save();
   	  $htmlParams['message'] = $message;
   	  $htmlParams['from'] = $from;
   	  $return['html']  = $this->renderPartial('message-content', $htmlParams, true);
      $this->renderJSON($return, true);
   }
   
   public function showconfirmdelete($post){
   	   $ids = $post['ids'];
   	   $from = $post['from'];
   	   $htmlParams['ids'] = $ids;
   	   $htmlParams['from'] = $from;
   	   $return['html']  = $this->renderPartial('message-delete-confirm', $htmlParams, true);
       $this->renderJSON($return, true);
   }
   
   public function deletemessage($post){
   	   $ids = $post['ids'];
   	   $from = $post['from'];
   	   $userid = Yii::app()->user->getId();
   	   $role = Yii::app()->user->role;
   	   $ids = substr($ids, 0, -1);
   	   $m = explode(',',$ids);
   	   
   	   foreach ($m as $message_id){
   	   $message = Messages::model()->findByPk($message_id);
   	   
	   	   	 $deleted = new Messagedeleted();
	   	   	 $deleted->deleted_by = $userid;
	   	   	 $deleted->message_id = $message_id;
	   	   	 $deleted->user_type = $role;
	   	   	 $deleted->save();
   	   }   	 
	  
   	   
   	   $return['status'] = true;
	   $return['from'] = $from;
   	   $this->renderJSON($return, true);
   }
   
    public function showreplymessage($post){
   	   $mesage_id = $post['id'];
   	   $from = $post['from'];
   	   $htmlParams['message'] =  Messages::model()->findByPk($mesage_id);
   	   $htmlParams['from'] = $from;
   	   $return['html']  = $this->renderPartial('message-reply', $htmlParams, true);
       $this->renderJSON($return, true);
   }
   
   
   public function sendreply($post){
   	  $userid = Yii::app()->user->getId();
   	  $role = Yii::app()->user->role;
   	 
   	  $message = new Messages();
   	  $message->subject = $post['m_subject'];
   	  $message->message = $post['m_message'];
      $message->from_id = $userid;
      $message->from_user_type = $role;
      $message->to_id = $post['reply_to_id'];
      $message->to_user_type = $post['reply_to_user_type'];
      if ($message->save()){
      	$this->SendMailAfterMessage($message->to_id,$message->to_user_type,$message->subject);
      	 $return['status'] = true; 
      }else {
      	 $return['status'] = false;
      }    

      $this->renderJSON($return, true);
   }
   
 private function SendMailAfterMessage($to_id,$to_user_type,$subject)
    {  
    	$userid = Yii::app()->user->getId();
   	    $role = Yii::app()->user->role;
    	
    	if ($to_user_type == 'homeowner'){
    	  $model          = Homeowners::model()->findByPk($to_id);
    	  $to_name = $model->firstname;
    	  $to_email = $model->email;
    	}else {
    	  $model          = Contractors::model()->findByPk($to_id);
    	  $to_name = $model->ContactName;
    	  $to_email = $model->Email;	
    	}
    	
       if ($role == 'homeowner'){
    	  $model          = Homeowners::model()->findByPk($userid);
    	  $from_name = $model->firstname;
    	  $from_email = $model->email;
    	}else {
    	  $model          = Contractors::model()->findByPk($userid);
    	  $from_name = $model->ContactName;
    	  $from_email = $model->Email;	
    	}
    	
    	$subject    = Yii::app()->name.' - '.$subject;
    	$content = $this->renderPartial('message-mail', array('name' => $to_name,'from'=>$from_name), true);
    	$headers="From: admin <admin@>".Yii::app()->name."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
    	
    	mail($to_email,$subject,$content,$headers);
	       
    }
	
	public function deletecontractorphoto(){
		$photo_id = Yii::app()->Ini->v('photo_id');
		//$contractorphotos = Contractorphotos::model()->deleteByPk($photo_id);
		$contractorphotos = Contractorphotos::model()->findByPk($photo_id);
		if(count($contractorphotos) > 0){
			if($contractorphotos->delete()){
				$status = array('success' => true);
			}else{
				$status = array('success' => false,'error_message'=>print_r($contractorphotos->getErrors()));
			}
			
		}else{
			$status = array('success' => false,'error_message'=>"No record found.");
		}
		
		$this->renderJSON($status);
		
	}
	
	
	public function actionSaveworkgallery(){
		$filename = $_POST['filename'];
		$contractor_id = Yii::app()->user->getId();
		
				$contractor_photos = new Contractorphotos();
				$contractor_photos->contractor_id = $contractor_id;
				$contractor_photos->filename = $filename;
				$contractor_photos->is_profile = 0;
				if($contractor_photos->save()){
				//$contractor_photos->insert();
					$the_id = $contractor_photos->photo_id;
					$data = array('success' => true,'photo_id' => $the_id);
				}else{
					$data = array('success' => false,'error_message' => print_r($contractor_photos->getErrors()));
				}
				
			$this->renderJSON($data);
	}
	
	public function actionSavehomeownerphoto(){
		$filename = Yii::app()->Ini->v('filename');
		$homeowner_id = Yii::app()->user->getId();
		$homeowner = Homeowners::model()->findByPk($homeowner_id);
		if(count($homeowner) > 0){
			$homeowner->photo = $filename;
			if($homeowner->save()){
				$result = array('success' => true);
			}else{
				$result = array('success' => false,'error_message' => print_r($homeowner->getErrors()));
			}
		}else{
			$result = array('success' => false,'error_message' => "Session user is not homeowner or not in database.");
		}
		
		$this->renderJSON($result);
	
	}
	
	
	public function loadinbox($post){
	$page = $post['page'];
	$per_page = 10;
	$pagination = "";
	
	$userid = Yii::app()->user->getId();
   	$role = Yii::app()->user->role;
    
   	$cur_page = $page;
   	
   	 
   	 
   	 $criteria=new CDbCriteria();
   	 $criteria2=new CDbCriteria();
   	  
   	  if ( $role == "homeowner"){
   	     $criteria->condition = "to_id = $userid AND to_user_type='homeowner' AND message_id NOT IN (Select message_id from messagedeleted where deleted_by=$userid and user_type='homeowner')";
    	 $criteria2->condition = "to_id = $userid AND to_user_type='homeowner' AND message_id NOT IN (Select message_id from messagedeleted where deleted_by=$userid and user_type='homeowner')";
	    
   	  }else if ($role == "contractor"){
   	  	 $criteria->condition = "to_id = $userid AND to_user_type='contractor' AND message_id NOT IN (Select message_id from messagedeleted where deleted_by=$userid and user_type='contractor')";
   	  	 $criteria2->condition = "to_id = $userid AND to_user_type='contractor' AND message_id NOT IN (Select message_id from messagedeleted where deleted_by=$userid and user_type='contractor')";
   	  }
   	
   	  $criteria->order = 'message_id DESC';

   	

   	  $num_rows = Messages::model()->count($criteria);
   	  
   	  $prev_page = $page-1; // previous page is this page, minus 1 page.
      $next_page = $page+1; 
   	  
      $page_start = (($per_page * $page)-$per_page); //where does our page index start
      if($num_rows<=$per_page){
      $num_pages = 1;
      //we checked to see if the rows we received were less than 15. 
      //if true, then we only have 1 page.
    }else if(($num_rows % $per_page)==0){
      $num_pages = ($num_rows/$per_page);
    }else{
      $num_pages = ($num_rows/$per_page)+1;
      $num_pages = (int)$num_pages;
    } 

    if ($num_rows < $per_page){
    	$per_page = $num_rows;
    }
    
    $criteria2->limit =  $per_page;
    $criteria2->offset = $page_start;
   	$criteria2->order =  'message_id DESC';
    
   	
    //$pagination .= '<span class="pagination-info">'.($page_start+1).'-'.$per_page.' of '.$num_rows.'</span>';
    
	  if($prev_page){
        $pagination .= ' <a class="btn btn-sm blue prev_link" href="javascript:void(0)" id="prev-'.$prev_page.'"> <i class="fa fa-angle-left"></i></a>';
	  }  
        if($page != $num_pages){
         $pagination .= ' <a class="btn btn-sm blue next_link" href="javascript:void(0)" id="next-'.$next_page.'"><i class="fa fa-angle-right"></i></a>';
        }
      
             
  
	  $htmlParams['messages'] = Messages::model()->findAll($criteria2);
	  $return['pagination'] = $pagination;
	  $return['html']  = $this->renderPartial('table-inbox', $htmlParams, true);
      $this->renderJSON($return, true);
	}
	
public function loadsent($post){
	$page = $post['page'];
	$per_page = 10;
	$pagination = "";
	
	$userid = Yii::app()->user->getId();
   	$role = Yii::app()->user->role;
    
   	$cur_page = $page;
   	
   	 
   	 
   	 $criteria=new CDbCriteria();
   	 $criteria2=new CDbCriteria();
   	  
   	  if ( $role == "homeowner"){
   	     $criteria->condition = "from_id = $userid AND from_user_type='homeowner' AND message_id NOT IN (Select message_id from messagedeleted where deleted_by=$userid and user_type='homeowner')";
    	 $criteria2->condition = "from_id = $userid AND from_user_type='homeowner' AND message_id NOT IN (Select message_id from messagedeleted where deleted_by=$userid and user_type='homeowner')";
	    
   	  }else if ($role == "contractor"){
   	  	 $criteria->condition = "from_id = $userid AND from_user_type='contractor' AND message_id NOT IN (Select message_id from messagedeleted where deleted_by=$userid and user_type='contractor')";
   	  	 $criteria2->condition = "from_id = $userid AND from_user_type='contractor' AND message_id NOT IN (Select message_id from messagedeleted where deleted_by=$userid and user_type='contractor')";
   	  }
   	
   	  $criteria->order = 'message_id DESC';

   	

   	  $num_rows = Messages::model()->count($criteria);
   	  
     if ($num_rows < $per_page){
    	$per_page = $num_rows;
    }
   	  
   	  $prev_page = $page-1; // previous page is this page, minus 1 page.
      $next_page = $page+1; 
   	  
      $page_start = (($per_page * $page)-$per_page); //where does our page index start
      if($num_rows<=$per_page){
      $num_pages = 1;
      //we checked to see if the rows we received were less than 15. 
      //if true, then we only have 1 page.
    }else if(($num_rows % $per_page)==0){
      $num_pages = ($num_rows/$per_page);
    }else{
      $num_pages = ($num_rows/$per_page)+1;
      $num_pages = (int)$num_pages;
    } 

    
   
    $criteria2->limit =  $per_page;
    $criteria2->offset = $page_start;
   	$criteria2->order =  'message_id DESC';
    
   	
    //$pagination .= '<span class="pagination-info">'.$page_start.'-'.$per_page.' of '.$num_rows.'</span>';
    
	  if($prev_page){
        $pagination .= ' <a class="btn btn-sm blue prev_link" href="javascript:void(0)" id="prev-'.$prev_page.'"> <i class="fa fa-angle-left"></i></a>';
	  }  
        if($page != $num_pages){
          $pagination .= ' <a class="btn btn-sm blue next_link" href="javascript:void(0)" id="next-'.$next_page.'"><i class="fa fa-angle-right"></i></a>';
        }
      
             
  
	  $htmlParams['sent'] = Messages::model()->findAll($criteria2);
	  $return['pagination'] = $pagination;
	  $return['html']  = $this->renderPartial('table-sent', $htmlParams, true);
      $this->renderJSON($return, true);
	}
	
	public function dashnextpage($post){
	
		$return = $param     = array();
		$curr_page = $post['set_page'];
		$limit = 2;
		$cnt = 0;
		$start = ($curr_page * $limit) - $limit;
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
		$param['curr_page'] = $curr_page;
		$param['display_pages'] = '2'; 
		$return['html']  = $this->renderPartial('loadnextpagedash', $param, true);
		$this->renderJSON($return, true);
		
	}
	
public function loadquestions($post){
	$page = $post['page'];
	$per_page = 10;
	$pagination = "";
	
	$userid = Yii::app()->user->getId();
   	$role = Yii::app()->user->role;
    
   	$cur_page = $page;
   	
   	 $criteria=new CDbCriteria();
   	 $criteria2=new CDbCriteria();
   	  
   	  if ( $role == "homeowner"){
   	     $criteria->condition = "owner_id = $userid AND owner_user_type='homeowner'";
    	 $criteria2->condition = "owner_id = $userid AND owner_user_type='homeowner'";
	    
   	  }else if ($role == "contractor"){
   	  	 $criteria->condition = "owner_id = $userid AND owner_user_type='contractor'";
   	  	 $criteria2->condition = "owner_id = $userid AND owner_user_type='contractor'";
   	  }
   	
   	  $criteria->order = 'question_id ASC';

   	  $num_rows = Questions::model()->count($criteria);
   	  
     if ($num_rows < $per_page){
    	$per_page = $num_rows;
    }
   	  
   	  $prev_page = $page-1; // previous page is this page, minus 1 page.
      $next_page = $page+1; 
   	  
      $page_start = (($per_page * $page)-$per_page); //where does our page index start
      if($num_rows<=$per_page){
      $num_pages = 1;
      //we checked to see if the rows we received were less than 15. 
      //if true, then we only have 1 page.
    }else if(($num_rows % $per_page)==0){
      $num_pages = ($num_rows/$per_page);
    }else{
      $num_pages = ($num_rows/$per_page)+1;
      $num_pages = (int)$num_pages;
    } 

     $criteria2->limit =  $per_page;
    $criteria2->offset = $page_start;
   	$criteria2->order =  'question_id ASC';
     
	  
     for($i=0;$i<$num_pages;$i++){
        $pagination .= '<li class="active"><a href="javascript:void(0)"   onclick="loadquestions(\''.$i.'\')">'.($i+1).'</a></li>';
    }
	  
      $htmlParams['questions'] = Questions::model()->findAll($criteria2);
	  $return['pagination'] = $pagination;
	  $return['count'] = $num_rows;
	  $return['html']  = $this->renderPartial('table-questions', $htmlParams, true);
      $this->renderJSON($return, true);
	}
	
	public function showconfirmquestion($post){
	   $id = $post['id'];
   	   $htmlParams['id'] = $id;
   	   $return['html']  = $this->renderPartial('question-delete-confirm', $htmlParams, true);
       $this->renderJSON($return, true);
	}
	
 public function deletequestion($post){
   	   $id = $post['id'];
   	   $question = Questions::model()->findByPk($id);
   	   $question->delete();  	 
	  
   	   $criteria=new CDbCriteria();
   	   $criteria->condition = 'question_id = '.$id;
   	   Answers::model()->deleteAll($criteria);
   	   QuestionViews::model()->deleteAll($criteria);
   	   QuestionVotes::model()->deleteAll($criteria);
   	   $return['status'] = true;
	   $this->renderJSON($return, true);
   }
}