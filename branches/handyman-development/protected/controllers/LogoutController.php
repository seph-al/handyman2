<?php

class LogoutController extends Controller
{
 
   public function actionIndex()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
