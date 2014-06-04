<?php

class QuestionsajaxController extends Controller
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
	
	

	
public function addquestion($post){
		$status = true;
		 if (!Yii::app()->user->isGuest){
	          $role = Yii::app()->user->role;
	          $userid = Yii::app()->user->getId();
		 }else {
		 	$role = $post['q_role'];
		 	if ($role == 'homeowner'){
		       $email = $post['q_hemail'];
		       $count_email = Homeowners::model()->countByAttributes(array('email'=>$email));
		       if ($count_email > 0){
		       	  $details = Homeowners::model()->findByAttributes(array('email'=>$email));
		       	  $userid = $details->homeowner_id;
		       }else {
		       	     $password = Yii::app()->Ini->generate_password();
		       	     $huser = new Homeowners();
        		     $huser->firstname       = $post['q_firstname'];
		             $huser->lastname        = $post['q_lastname'];
		             $huser->email  = $post['q_hemail'];
		             $huser->username  = $post['q_husername'];
		             $huser->password = $password;
		             if ($huser->save()){
		             	 Yii::app()->Ini-> savetovnoc($email);
			             $userid = Yii::app()->db->getLastInsertId();
			             Yii::app()->Ini->savetoaffiliate($userid,'homeowner');   
			             $this->SendMailAfterSignUp($userid);
		             }else {
		             	 $status = false; 
        			     $return['message'] = $huser->getErrors();
		             }
		             
		       }	
		       	
		 	}else{
		 		$email = $post['q_cemail'];
		 		$password  = $post['q_password'];
		        $count_email = Contractors::model()->countByAttributes(array('Email'=>$email));
		        if ($count_email > 0){
		        	$details = Contractors::model()->findByAttributes(array('Email'=>$email));
		       	    $userid = $details->ContractorId;
		        }else {
		        	
		        	 $cont = new Contractors();
                     $cont->Name = $post['q_company'];
                     $cont->ContactName = $post['q_contactname'];
                     $cont->Email = $post['q_cemail'];
                     $cont->Username = $post['q_cusername'];
                     $cont->Password = $post['q_password'];
                     if ($cont->save()){
                     	Yii::app()->Ini->savetovnoc($email);
                     	$userid = Yii::app()->db->getLastInsertId();
                     	 
                     }else {
                        $status = false; 
        			    $return['message'] = $cont->getErrors();	
                     }
                     
                     
		        }
		 	} 
		 	
		 }
         
		   if ($status){
		   
		   	if (Yii::app()->user->isGuest){
		   	   $identity=new UserIdentity($email,$password,$role);
		   	    if($identity->authenticate()){
		   	    	   Yii::app()->user->login($identity);
					   $owner_id = Yii::app()->user->getId();
					   Yii::app()->Ini->savetoaffiliate($owner_id,$role);  
		   	    }
		   	}	
			  
					    
				   	
			           $q = new Questions();
			           $q->title = $post['q_title'];
			           $q->content = $post['q_content'];
			           $q->owner_id = $userid;
			           $q->owner_user_type = $role;
			           $q->project_type_id = $post['q_category'];
			           
			           if ($q->save()){
				           $return['url'] = 'questions/details/id/'.Yii::app()->db->getLastInsertId().'/n/'.Yii::app()->Ini->slugstring($q->title);
			           }else {
			           	   $status = false; 
			        	   $return['message'] = $q->getErrors();
			           }
	           
		   }   
          
		   
        $return['status'] = $status;
        $this->renderJSON($return, $status);
	}
	
	public function updatequestion($post){
		$status = true;
        $role = Yii::app()->user->role;
        $userid = Yii::app()->user->getId();
         
           $q = Questions::model()->findByPk($post['question_id']);
           $q->title = $post['q_title'];
           $q->content = $post['q_content'];
           $q->project_type_id = $post['q_category'];
           
           if ($q->save()){
           		   $status = true;
	       }else {
           	   $status = false; 
        	   $return['message'] = $q->getErrors();
           }
        $return['status'] = $status;
        $this->renderJSON($return, $status);
	}
	
	public function loadanswers($post){
	$page = $post['page'];
	$q_id = $post['id'];
	$per_page = 10;
	$pagination = "";
	$login = false;
	if (!Yii::app()->user->isGuest){
		$login = true;
		$userid = Yii::app()->user->getId();
   	    $role = Yii::app()->user->role;
    
	}else {
		$userid = 0;
		$role = 'guest';
	}
	
	
	
   	$cur_page = $page;
   	
   	 $criteria=new CDbCriteria();
   	 $criteria2=new CDbCriteria();

   	 $criteria->condition = "question_id = $q_id";
     $criteria2->condition = "question_id = $q_id";
	    
   	  
   	  $criteria->order = 'answer_id ASC';

   	  $num_rows = Answers::model()->count($criteria);
   	  
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
   	 $criteria2->order =  'answer_id ASC';
     
	  
     for($i=0;$i<$num_pages;$i++){
        $pagination .= '<li class="active"><a href="javascript:void(0)"   onclick="loadanswers(\''.$i.'\')">'.($i+1).'</a></li>';
    }
	  
      $htmlParams['answers'] = Answers::model()->findAll($criteria2);
      $htmlParams['login'] = $login;
      $htmlParams['userid'] = $userid;
      $htmlParams['role'] = $role;
	  $return['pagination'] = $pagination;
	  $return['count'] = $num_rows;
	  $return['html']  = $this->renderPartial('answers-list', $htmlParams, true);
      $this->renderJSON($return, true);
	}
	
public function addanswer($post){
		$role = Yii::app()->user->role;
        $userid = Yii::app()->user->getId();
        $question_id =  $post['question_id'];
        
           $a = new Answers();
           $a->question_id = $question_id;
           $a->answer = $post['answer'];
           $a->owner_id = $userid;
           $a->owner_user_type = $role;
           
           if ($a->save()){
	        $status = true;
	        $answer_id = Yii::app()->db->getLastInsertId();
	        $this->SendMailAfterAnswer($question_id,$answer_id);
           }else {
           	   $status = false; 
        	   $return['message'] = $q->getErrors();
           }

        $question = Questions::model()->findByPk($question_id);
        $return['status'] = $status;
        $return['answercount'] = $question->answerCount;
        $this->renderJSON($return, $status);
	}
	

	private function SendMailAfterAnswer($question_id,$answer_id)
    {  
    	
    	$question          = Questions::model()->findByPk($question_id);
    	$answer = Answers::model()->findByPk($answer_id);
    	if ($answer->owner_user_type == 'homeowner'){
    		$euser = Homeowners::model()->findByPk($answer->owner_id);
    		$answered_by = $euser->firstname ." ".$euser->lastname;
    	}else {
    		$euser = Contractors::model()->findByPk($answer->owner_id);
    		$answered_by = $euser->Name;
    	}
    	
    	if ($question->owner_user_type=='homeowner'){
    		$euser = Homeowners::model()->findByPk($question->owner_id);
    		$to_email = $euser->email;
    		$receiver_name = $euser->firstname;
    	}else {
    		$euser = Contractors::model()->findByPk($question->owner_id);
    		$to_email = $euser->Email;
    		$receiver_name = $euser->Name;
    	}
    	
    	$subject    = Yii::app()->name.' Question & Answer';
    	$content = $this->renderPartial('email-answer', array('question' => $question,'answer'=>$answer,'answered_by'=>$answered_by,'receiver_name'=>$receiver_name), true);
    	$headers="From: admin <admin@>".Yii::app()->name."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
    	
    	mail($to_email,$subject,$content,$headers);
	       
    }
	
	public function getunsanswered(){
		$result = Questions::model()->findAll(array(
                        'select'=>'*',
                        'condition'=>'question_id NOT IN( SELECT question_id FROM answers)'
                    ));
		
		$title = "Unanswered Questions";
		$this->renderPartial('questions-list',array('questions' => $result,'title' => $title));
	}

public function getallactivity(){
		$criteria=new CDbCriteria();
		$criteria->distinct = true;
		$criteria->alias = 'Q';
		$criteria->join = 'LEFT JOIN answers ON Q.question_id = answers.question_id';
    	$criteria->order = 'answers.answer_id DESC';
			
		$result = Questions::model()->findAll($criteria);
		
		$title = "All activities";
		$this->renderPartial('questions-list',array('questions' => $result,'title' => $title));
	}
    
	
public function votequestion($post){
			$role = Yii::app()->user->role;
	        $userid = Yii::app()->user->getId();
	        $question_id =  $post['question_id'];
	        
           $v = new QuestionVotes();
           $v->question_id = $question_id;
           $v->voted_by = $userid;
           $v->voted_user_type = $role;
           
           if ($v->save()){
	        $status = true;
	       
	        
           }else {
           	   $status = false; 
        	   $return['message'] = $q->getErrors();
           }

        $question = Questions::model()->findByPk($question_id);
        $return['status'] = $status;
        $return['votecount'] = $question->voteCount;
        $return['id'] = $question_id;
        $this->renderJSON($return, $status);
	}
	
	public function checkifCanVote(){
	 $can_vote = 0;
	 $q_id =  Yii::app()->Ini->v('question_id');
	 
	 $question = Questions::model()->findByPk($q_id);
    	 if (!Yii::app()->user->isGuest){
    	 	$viewed_by = Yii::app()->user->getId();
    	 	$viewed_user_type = Yii::app()->user->role;
    		$vote = QuestionVotes::model()->countByAttributes(array('question_id'=>$q_id,'voted_by'=>$viewed_by,'voted_user_type'=>$viewed_user_type));
    		if (($vote == 0) && ($question->owner_id != $viewed_by && $question->owner_user_type != $viewed_user_type)){
    			$can_vote = 1;
    		}
    	 }
	
		$return = array('can_vote' => $can_vote);
	 $this->renderJSON($can_vote);
}

 public function voteanswer($post){
			$role = Yii::app()->user->role;
	        $userid = Yii::app()->user->getId();
	        $answer_id =  $post['answer_id'];
	        
           $v = new AnswerVotes();
           $v->answer_id = $answer_id;
           $v->voted_by = $userid;
           $v->voted_user_type = $role;
           
           if ($v->save()){
	        $status = true;
	       
	        
           }else {
           	   $status = false; 
        	   $return['message'] = $q->getErrors();
           }

        $answer = Answers::model()->findByPk($answer_id);
        $return['status'] = $status;
        $return['votecount'] = $answer->voteCount;
        $return['id'] = $answer_id;
        $this->renderJSON($return, $status);
	}
	
	
   public function bestanswer($post){
	 	 $role = Yii::app()->user->role;
	     $userid = Yii::app()->user->getId();
	     $answer_id =  $post['answer_id'];
	        
           $v = Answers::model()->findByPk($answer_id);
           
           $question_id = $v->question->question_id;
           
           $past = Answers::model()->findByAttributes(array('question_id'=>$question_id,'is_best'=>1));
           if (count($past)>0){
             $old_answer = $past->answer_id;	
           }else {
           	  $old_answer =0;
           }
            
           
           Answers::model()->updateAll(array( 'is_best' => 0 ), "question_id = $question_id AND is_best = 1 " );
           
           $v->is_best = 1;
           
           if ($v->save()){
	        $status = true;
	       }else {
           	   $status = false; 
        	   $return['message'] = $q->getErrors();
           }

        $return['status'] = $status;
        $return['id'] = $answer_id;
        $return['old'] = $old_answer;
        
        $this->renderJSON($return, $status);
	}
	
	public function deleteanswer($post){
		$answer_id = $post['id'];
		$details = Answers::model()->findByPk($answer_id);
		
		if ($details->delete()){
	        $status = true;
	       }else {
           	   $status = false; 
        	   $return['message'] = $q->getErrors();
           }

        $return['status'] = $status;
        $return['id'] = $answer_id;
        $this->renderJSON($return, $status);
	}
	
	public function showupdateform($post){
		$answer_id = $post['id'];
		$details = Answers::model()->findByPk($answer_id);
		$htmlParams['answer'] = $details;
        $return['html']  = $this->renderPartial('answers-update', $htmlParams, true);
        $this->renderJSON($return, true);
	}
	
	public function updateanswer($post){
		$answer_id = $post['answer_id'];
		$answer = $post['answer'];
		$v = Answers::model()->findByPk($answer_id);
		$v->answer = $answer;
		if ($v->save()){
			$return['status']= true;
		}else {
			$return['status']= false;
		}
		$return['id'] = $answer_id;
		$return['ans'] = $answer;
		$this->renderJSON($return, true);
	}
	
	
   private function SendMailAfterSignUp($userid)
    {  
    	$hmodel          = Homeowners::model()->findByPk($userid);
    	$subject    = Yii::app()->name.' Account Details For Home Owner';
    	$content = $this->renderPartial('../projectajax/signup', array('huser' => $hmodel), true);
    	$headers="From: admin <admin@>".Yii::app()->name."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
    	
    	mail($hmodel->email,$subject,$content,$headers);
	       
    }
    
}//end class


