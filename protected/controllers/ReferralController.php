<?php

class ReferralController extends Controller
{
 
    public $layout='/layouts/home';
    public $cities = "";

		public function actionIndex(){
			//Yii::app()->name
			$domain_name = 'handyman.com';
			$domainid = 10231;
			
			$data = array('domain' => 'handyman.com',
							'logo' => 'http://handyman.com/images/logo.gif',
							'domain_affiliate_link' => 'http://referrals.contrib.com/idevaffiliate.php?id='.$domainid.'&url=http://www.contrib.com/signup/firststep?domain='.$domain_name,
							'title' => 'Handyman',
							'domainid' => $domainid);
			$this->render('referral',$data);
		}
}
?>