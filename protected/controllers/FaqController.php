<?php

class FaqController extends Controller
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
	
	public function actionIndex(){
		$this->pageTitle = 'Handyman.com - FAQ';
		$this->render('faq');
	}
}
?>