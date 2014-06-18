<?php

class ReferralController extends Controller
{
 
    public $layout='/layouts/home';
    

		public function actionIndex(){
			//Yii::app()->name
			
			if (Yii::app()->user->isGuest){
				$domain_name = 'handyman.com';
				$domainid = 10231;
				$banner_redirect = "http://handyman.com";
				$banners = array('http://referrals.contrib.com/banners/badge-handyman-1.png','http://referrals.contrib.com/banners/handyman-badge-1.png',
				'http://referrals.contrib.com/banners/handyman-badge-3.png','http://referrals.contrib.com/banners/handyman-badge-9.png','http://referrals.contrib.com/banners/handyman-badge-12.png');
				
				$data = array('domain' => 'handyman.com',
								'logo' => 'http://d2qcctj8epnr7y.cloudfront.net/images/2013/logo-handyman-1.png',
								'domain_affiliate_link' => 'http://referrals.contrib.com/idevaffiliate.php?id='.$domainid.'&url=http://www.contrib.com/signup/firststep?domain='.$domain_name,
								'title' => 'Handyman',
								'domainid' => $domainid,
								'banners' => $banners,
								'redirect' => $banner_redirect);
				$this->render('referral',$data);
			}else {
				
				$data['url'] = Yii::app()->Ini->getaffiliatelogin(Yii::app()->user->role,Yii::app()->user->getId());
				$this->render('referral_login',$data);
			}
		}
}
?>