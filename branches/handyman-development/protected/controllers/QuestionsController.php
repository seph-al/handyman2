<?php

class QuestionsController extends Controller
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
    
   public function actionIndex()
    {
    	    $this->pageTitle = 'Handyman.com - Question and Answer';
    	    $param['sidecats'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
				
				$criteria = new CDbCriteria();
				$criteria->order = "question_id DESC";
				$questions = Questions::model()->findAll($criteria); 
				
				$count = Questions::model()->count($criteria);
				$pages = new CPagination($count);
				
						$current_user_id = Yii::app()->user->getId();
						$current_user_role = Yii::app()->user->role;
				
			$param['questions'] = $questions;
	    	$this->render('index',$param);
    	
    }
    
  public function actionPost()
    {
    	if (!Yii::app()->user->isGuest){
    		$q_title =  Yii::app()->Ini->v('q_title');
    		$this->pageTitle = 'Handyman.com - Post Question';
	    	$param['sidecats'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
	    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
	    	$param['q_title'] = $q_title;
	    	$this->render('postquestion',$param);
    	}else {
    		$this->redirect(Yii::app()->homeUrl);
    	}	
    	
    }
    
public function actionDetails()
    {
    	 $can_vote = false;
    	 $q_id =  Yii::app()->Ini->v('id');
    	 $question = Questions::model()->findByPk($q_id);
    	 if (!Yii::app()->user->isGuest){
    	 	$viewed_by = Yii::app()->user->getId();
    	 	$viewed_user_type = Yii::app()->user->role;
    		$vote = QuestionVotes::model()->countByAttributes(array('question_id'=>$q_id,'voted_by'=>$viewed_by,'voted_user_type'=>$viewed_user_type));
    		if (($vote == 0) && ($question->owner_id != $viewed_by && $question->owner_user_type != $viewed_user_type)){
    			$can_vote = true;
    		}
    	 }else {
    	 	$viewed_by = 0;
    	 	$viewed_user_type = 'guest';
    	 }
    	 
    	 
    	 $view = new QuestionViews();
    	 $view->question_id = $q_id;
    	 $view->viewed_by = $viewed_by;
    	 $view->viewed_user_type = $viewed_user_type;
    	 $view->save();
    	 
    	 
    	 $this->pageTitle = 'Handyman.com Answers - '.$question->title;
    	 $param['question'] = $question;
	     $param['sidecats'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
	     $param['can_vote'] = $can_vote;
	     $this->render('details',$param);
    		
    	
    }
    
    
public function actionEdit()
    {
    	if (!Yii::app()->user->isGuest){
    		$id =  Yii::app()->Ini->v('id');
    		$question = Questions::model()->findByPk($id);
    		if (count($question)>0){
		    	$this->pageTitle = 'Handyman.com - Post Question';
		    	$param['sidecats'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
		    	$param['projects'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
		    	$param['question'] = $question;
		    	$this->render('editquestion',$param);
    		}else {
    			$this->redirect(Yii::app()->homeUrl.'home/error');
    		}
    	}else {
    		$this->redirect(Yii::app()->homeUrl);
    	}	
    	
    }
    
public function actionCategory_list()
    {
    	 $this->pageTitle = 'Handyman.com  - Question Categories';
    	 $param['sidecats'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
    	 $this->render('category-list',$param);
    }
    
    
public function actionCategory()
    {
    	$cat_id =  Yii::app()->Ini->v('cat');

    	$category = Projecttypes::model()->findByPk($cat_id);
    	
    	$this->pageTitle = 'Handyman.com - Questions under '.$category->Name;
    	$param['sidecats'] = Projecttypes::model()->findAll(array('order' => 'Name ASC'));
				
				$criteria = new CDbCriteria();
				$criteria->condition = "project_type_id = $cat_id";
				$criteria->order = "question_id DESC";
				
				$questions = Questions::model()->findAll($criteria); 
				
				$count = Questions::model()->count($criteria);
				$pages = new CPagination($count);
				
						$current_user_id = Yii::app()->user->getId();
						$current_user_role = Yii::app()->user->role;
				
			$param['questions'] = $questions;
			$param['type'] = $category;
			$this->render('index-by-category',$param);
    	
    }
    
}
