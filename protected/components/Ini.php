<?php

class Ini extends CApplicationComponent
{
    public function init()
    {
        parent::init();
    }
    public function db()
    {
        return Yii::app()->db;
    }
    public function g($settingName, $unserialize = false)
    {
        return coreSettings::model()->getDetails($settingName, $unserialize);
    }
    public function s($settingName, $settingValue, $onExistsUpdate = false, $serialize = false)
    {
        return coreSettings::model()->createSetting($settingName, $settingValue, $onExistsUpdate, $serialize);
        
    }
    public function v($string, $default='')
    {
        return Yii::app()->request->getParam($string, $default);
    }
    public function d($string)
    {
        return html_entity_decode($string);
    }
    public function url($direct = false)
    {
        return ($direct) ? '/' : Yii::app()->Ini->info('hostUrl');
    }
    public function info($type = 'rootDir')
    {
        return Yii::app()->params->{$type};
    }
    public function load($classname, $args0=null, $args1=null, $args2=null, $args3=null )
    {
        Yii::import('application.components.classes.'.$classname);
        if(class_exists($classname))
            return new $classname($args0, $args1, $args2, $args3);
        return false;
    }
    public function tUrl($direct = true)
    {
        return (($direct) ? '/' : Yii::app()->Ini->info('hostUrl')) . ltrim(Yii::app()->theme->baseUrl,'/');
    }
    public function userId($userSlug = '')
    {
        return Yii::app()->user->userDetails()->userid;
    }
    public function userDetails($userId = -1)
    {
        $userId = $userId == -1 ? self::userId() : $userId;
        return users::model()->findByPk($userId);
    }
    public function userLevel($userId = 0)
    {
        if(!$userId):
            $userId = Yii::app()->user->userDetails()->userid;
        endif;
        $admin = admin::model()->findByAttributes(array('userid'=>$userId));
        return (int) $admin->admin_level;
    }
    public function sSt($stateName, $stateValue)
    {
        Yii::app()->user->setState($stateName, $stateValue);
        return null;
    }
    public function gSt($stateName)
    {
        return Yii::app()->user->getState($stateName);
    }
    public function rip($type='both')
    {
        $return = array();
        if(getenv('HTTP_CLIENT_IP'))
            $return['ip'] = getenv('HTTP_CLIENT_IP');
        elseif (getenv('HTTP_X_FORWARDED_FOR'))
            $return['ip'] = getenv('HTTP_X_FORWARDED_FOR');
        elseif (getenv('HTTP_X_FORWARDED'))
            $return['ip'] = getenv('HTTP_X_FORWARDED');
        elseif (getenv('HTTP_FORWARDED_FOR'))
            $return['ip'] = getenv('HTTP_FORWARDED_FOR');
        elseif (getenv('HTTP_FORWARDED'))
            $return['ip'] = getenv('HTTP_FORWARDED');
        else
            $return['ip'] = $_SERVER['REMOTE_ADDR'];

        $return['long']   = ip2long($return['ip']);

        switch ($type):
            case 'long':
                return $return['long'];
            break;
            case 'ip':
                return $return['ip'];
            break;
            default:
                return $return;
            break;
        endswitch;
    }
    public function isGuest($redirectCode = false, $typeAjax = false, $returnAjaxUrl = false, $returnInt = false)
    {
        $isGuest = Yii::app()->user->isGuest;
        if($returnInt):
            return intval($isGuest);
        endif;
        if($isGuest && $typeAjax):
            header('Content-Type: application/json');
            if($returnAjaxUrl)
                echo CJSON::encode(array('s'=>0,'x'=>Yii::app()->Ini->redirecAuthtUrl($_POST, true)));
            else
                echo CJSON::encode(array('s'=>0,'r'=>'You need to login first.'));
            Yii::app()->Ini->end();
        endif;
        if($isGuest)
            if($redirectCode)
                Yii::app()->Ini->redirecAuthtUrl('http://'.$_SERVER['HTTP_HOST'], $returnRedirectUrl);
        return $isGuest;
    }
    public function aN($string, $whiteSpace = '', $replaceSpace = false, $toLower = false)
    {
        if($toLower)
            $string = strtolower($string);
        if($replaceSpace):
            $string = str_replace(array(' ','_'), '-', $string);
            return preg_replace('/[^a-zA-Z0-9\-' . $whiteSpace . ']/', '', (string) trim($string));
        else:
            return preg_replace('/[^a-zA-Z0-9' . $whiteSpace . ']/', '', (string) trim($string));
        endif;
        
    }
    public function aD($string)
    {
        return preg_replace('/[^0-9]/', '', (string) trim($string));
    }
    public function offset($currentPage, $perPage)
    {
        if(intval($perPage) == 0)
            $perPage = Yii::app()->Ini->info('perPage');
        $result = (($currentPage * $perPage) - $perPage);
        if($result < 1)
            return 0;
        return $result;
    }
    public function randomString($lower=2,$upper=2,$number=2, $special=0)
    {
        $setArray   = array();
        $setArray[] = array('count' => $lower,   'chars' => 'abcdefghijkmnpqrstuvwxyz');
        $setArray[] = array('count' => $upper,   'chars' => 'ABCDEFGHJKLMNPQRSTUVWXYZ');
        $setArray[] = array('count' => $number,  'chars' => '0123456789');
        $setArray[] = array('count' => $special, 'chars' => '!@#$+-*&?:');
        $return = array();
        foreach ($setArray as $set):
            for ($i = 0; $i < $set['count']; $i++)
                $return[] = $set['chars'][ rand(0, strlen($set['chars']) - 1)];
        endforeach;
        shuffle($return);
        return implode('',$return);
    }
    public function paginatorAjax($totalItems, $page, $perpage, $function, $params = array(), $showOptions = true)
    {
        $totalpages = @($totalItems/$perpage);
        $param = '';
        if(count($params))
            foreach ($params as $k => $v)
                $param .= ',\''.$v.'\'';
        $temp = (int)$totalpages;
        if($temp != $totalpages) $totalpages++;
        $totalpages = (int) $totalpages;
        if($totalpages < 2) return '';
        if($page == 0) $page = 1;

        $firstpage = $page - 5;
        if($firstpage < 1)
            $firstpage = 1;
        $lastpage = $page + 5;
        if($lastpage > $totalpages)
            $lastpage = $totalpages;
        $return .= '<div class="pages-link"><div>';
        if($page != 1 && $totalpages > 1)                                                              
            $return .= '<a href="javascript:void(null);" onclick="'.$function.'('.($page-1).$param.');">&laquo; prev</a> ';
        for($i = $firstpage; $i < $page; $i++):
            if($i != 1)
                $return .= '<a href="javascript:void(null);" onclick="'.$function.'('.($i).$param.');">'.$i.'</a> ';
            else
                $return .= '<a href="javascript:void(null);" onclick="'.$function.'(1'.$param.');">'.$i.'</a> ';
        endfor;
        $return .= ' <span class="current">'.$page.'</span> ';
        for($i = ($page+1); $i <= $lastpage; $i++ )
            $return .= '<a href="javascript:void(null);" onclick="'.$function.'('.($i).$param.');">'.$i.'</a> ';
        if($page != $totalpages && $totalpages > 1)
            $return .= '<a href="javascript:void(null);" onclick="'.$function.'('.($page+1).$param.');">next &raquo;</a> ';
        $offset = (($page*$perpage)-$perpage+1);
        $return .= '</div>';
        if($showOptions):
            $return .= '<span style="float:right;">Showing Record '.number_format(($offset>$totalItems)?$totalItems:$offset).
                       ' - '.number_format((($page*$perpage)>$totalItems)?$totalItems:($page*$perpage)).' of '.number_format($totalItems).' '.
                       '(Page <input type="text" class="to-page" value="'.$page.'" size="1" onblur="$(\'input[class=to-page]\').val(this.value)" /> of '.$totalpages.') '.
                       '<input type="button" class="btn success small" value="Go &raquo;" onclick="'.$function.'($(\'input[class=to-page]\').val()'.$param.');"></span>';
        endif;
        $return .= '</div>';
        return $return;
    }
    public function redirecAuthtUrl($url, $returnUrl = false)
    {
        Yii::app()->getRequest()->redirect('http://admin.'.Yii::app()->Ini->info('tld'),true,302);
        Yii::app()->Ini->end();
    }
    public function agent()
    {
        $u_agent  = $_SERVER['HTTP_USER_AGENT'];
        $bname    = 'Unknown';
        $platform = 'Unknown';
        $version = '';

        if (preg_match('/linux/i', $u_agent))
            $platform = 'linux';
        elseif (preg_match('/macintosh|mac os x/i', $u_agent))
            $platform = 'mac';
        elseif (preg_match('/windows|win32/i', $u_agent))
            $platform = 'windows';
       
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)):
            $bname = 'Internet Explorer';
            $ub    = "MSIE";
        elseif(preg_match('/Firefox/i',$u_agent)):
            $bname = 'Mozilla Firefox';
            $ub    = "Firefox";
        elseif(preg_match('/Chrome/i',$u_agent)):
            $bname = 'Google Chrome';
            $ub    = "Chrome";
        elseif(preg_match('/Safari/i',$u_agent)):
            $bname = 'Apple Safari';
            $ub    = "Safari";
        elseif(preg_match('/Opera/i',$u_agent)):
            $bname = 'Opera';
            $ub    = "Opera";
        elseif(preg_match('/Netscape/i',$u_agent)):
            $bname = 'Netscape';
            $ub    = "Netscape";
        endif;

        $known   = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)):
            // we have no matching number just continue
        endif;
       
        $i = count($matches['browser']);
        if ($i != 1):
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub))
                $version= $matches['version'][0];
            else
                $version= $matches['version'][1];
        else:
            $version= $matches['version'][0];
       endif;

        if ($version==null || $version=="")
            $version="?";
       
        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'   => $pattern
        );
    }
    public function createSqlTime($isClear = false, $time = 0)
    {
        if($isClear)
            return '0000-00-00 00:00:00';
        if($time<1)
            return date("Y-m-d H:i:s", mktime());
        return date("Y-m-d H:i:s", intval($time));
    }
    public function end()
    {
        Yii::app()->end();
    }
    
    public function getCities($order='Name ASC',$limit = null){
    	if ($limit){
    	  return Cities::model()->findAll(array('order' => $order,'limit'=>$limit));
    	}else {
    	  return Cities::model()->findAll(array('order' => $order));	
    	}
    }
    
    public function getlocationbyip($ip){
    	$result = @file_get_contents('http://api.ipinfodb.com/v3/ip-city/?key=554fe86aa47fafc59f72559708f3b744ed4627d77d14b205a68f6086276a81f7&ip='.$ip);
    	$vars = explode(';',$result);
    	$location = $vars[6].",".$vars[4];
    	return $location;
    }
    
    public function generate_password( $length = 8 ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@^*";
	$password = substr( str_shuffle( $chars ), 0, $length );
	return $password;
  }
  
  public function createApiCall($url, $method, $headers, $data = array(),$user=null,$pass=null)
{
        if (($method == 'PUT') || ($method=='DELETE'))
        {
            $headers[] = 'X-HTTP-Method-Override: '.$method;
        }

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
              
        if ($user){
         curl_setopt($handle, CURLOPT_USERPWD, $user.':'.$pass);
        } 

        switch($method)
        {
            case 'GET':
                break;
            case 'POST':
                curl_setopt($handle, CURLOPT_POST, true);
                curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'PUT':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'DELETE':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
        }
        $response = curl_exec($handle);
        return $response;
}
  
   public function renovationapi($project_id){
   	 $response = array();
   	 //$url = "http://affiliate.renovationexperts.com/aff_testing/lemond_ping.asp";
   	 //$url2 = "http://affiliate.renovationexperts.com/aff_testing/lemond_addlead_product.asp";

   	 $url = "http://affiliate.renovationexperts.com/pingpost/lemond_ping.asp";
   	 $url2 = "http://affiliate.renovationexperts.com/pingpost/lemond_addlead_product.asp";
   	 
   	 $pmodel = Projects::model()->findByPk($project_id);
   	 //$url = "http://affiliate.renovationexperts.com/pingpost/lemond_ping.asp";
   	 $param = array(
   	   'checksum'=>'B4rM7kq25duX',
   	   'usern'=>'chad@ecorp.com',
   	   'passw'=>'ecorp123',
   	   'sid'=>'485',
   	   'zip'=>$pmodel->zipcode,
   	   'stid'=>$pmodel->type->STID,
   	   'mtid'=>$pmodel->type->MTID
   	 );
   	 
   	 $headers = array(
	        'Accept: application/json'
	    );
	    
	    $result = Yii::app()->Ini->createApiCall($url, 'POST', $headers,$param);
	    $pos = strpos($result, 'SEED:');
	    if ($pos === false) {
	        $response['status'] = false;
	        $response['message'] = 'ping failed';    	
	    }else {
	    	$s = explode('SEED:',strip_tags($result));
	    	$seed = $s[1];
	    	$param = array(
		   	   'checksum'=>'B4rM7kq25duX',
		   	   'usern'=>'chad@ecorp.com',
		   	   'passw'=>'ecorp123',
		   	   'sid'=>'485',
	    	   'seed'=>$seed,
		   	   'ip'=>Yii::app()->Ini->rip('ip'),
		   	   'fname'=>$pmodel->homeowner->firstname,
		   	   'lname'=>$pmodel->homeowner->lastname,
	    	   'phone_ac'=>substr($pmodel->homeowner->phone_number, 0, 3),
	    	   'phone_mid'=>substr($pmodel->homeowner->phone_number, 3, 3),
	    	   'phone_last'=>substr($pmodel->homeowner->phone_number, -4),
	    	   'email'=>$pmodel->homeowner->email,
	    	   'addr1'=>$pmodel->address,
	    	   'city'=>$pmodel->city,
	    	   'state'=>$pmodel->state->Abbreviation,
	    	   'zip'=>$pmodel->zipcode,
	    	   'project_type'=>$pmodel->type->Name,
	    	   'stid'=>$pmodel->type->STID,
   	           'mtid'=>$pmodel->type->MTID,
	    	   'project_details'=>$pmodel->description,
	    	   'budget'=>$pmodel->budget
		   	 );
   	 
	    	 $result = Yii::app()->Ini->createApiCall($url2, 'POST', $headers,$param);
	    	 $pos = strpos($result, 'NEW LEAD ID:');
			    if ($pos === false) {
			        $response['status'] = false;
			        $response['message'] = $result;
			        $pmodel->in_renovation = 0;    	
			        $pmodel->save();
			    }else {
			    	$s = explode('NEW LEAD ID:',strip_tags($result));
	    	        $id = $s[1];
	    	        $response['status'] = true;
			        $response['message'] = $id;
			        $pmodel->in_renovation = 1;
			        $pmodel->save();
			    }
	    }
	    
	    //
	    return $response['status'];
   }
   
   public function slugstring($string){
   	    $result = strtolower($string);
	    $result = preg_replace("/[^A-Za-z0-9\s-._\/]/", "", $result);
	    $result = trim(preg_replace("/[\s-]+/", " ", $result));
	    $result = trim(substr($result, 0, 50));
	    $result = preg_replace("/\s/", "-", $result);
   
    return $result;
   }
   
   public function savetovnoc($email){
   	 $url = "http://www.api.contrib.com/forms/saveleads";
   	 $param = array(
   	   'domain'=>'handyman.com',
   	   'email'=>$email,
   	   'user_ip'=>Yii::app()->Ini->rip('ip')
   	 ); 
   	 
    	$headers = array(
	        'Accept: application/json'
	    ); 
	    
   	   $result = Yii::app()->Ini->createApiCall($url, 'POST', $headers,$param);
   }
   
   public function savetoaffiliate($userid,$user_type){
   	$domain = "handyman.com";
   	$url = "http://www.api.contrib.com/forms/addaffiliate";
   	 
    	$headers = array(
	        'Accept: application/json'
	    ); 
   	
   	if ($user_type == "homeowner"){
   		$model = Homeowners::model()->findByPk($userid);
   		$param = array(
   	   'domain'=>$domain,
   	   'email'=>$model->email,
   	   'username'=>$model->username,
   	   'password'=>$model->password,
   	   'firstname'=>$model->firstname,
   	   'lastname'=>$model->lastname
   	 ); 
   	 
   	}else {
   		$model = Contractors::model()->findByPk($userid);
   		$param = array(
   	   'domain'=>$domain,
   	   'email'=>$model->Email,
   	   'username'=>$model->Username,
   	   'password'=>$model->Password,
   	   'firstname'=>$model->ContactName,
   	   'lastname'=>""
   	 ); 
   	 
   		
   	}
   	    $affiliate_id = Yii::app()->Ini->createApiCall($url, 'POST', $headers,$param);
   	    
   	   if ($affiliate_id != ""){
   	   	   $details = Affiliates::model()->findByAttributes(array('userid'=>$userid,'user_type'=>$user_type));
   	   	   if (count($details)> 0){
   	   	   	  $details->affiliate_id = $affiliate_id;
   	   	   	  $details->save();
   	   	   }else {
   	   	   	  $details = new Affiliates();
   	   	   	  $details->userid = $userid;
   	   	   	  $details->user_type = $user_type;
   	   	   	  $details->affiliate_id = $affiliate_id;
   	   	   	  $details->save();
   	   	   }
   	   	   
   	   	  
   	   }
   }
   
   public function searchhomeadvisor($zipcode,$catid){
   	 $username = 'ecorpxm';
   	 $accesskey = 'vsvtwkf7';
   	 $url = 'https://api.homeadvisor.com/resource/serviceprovider/search/'.$zipcode.'/-'.$catid.'?';
   	 $url .= 'r_username='.$username.'&r_accesskey='.$accesskey.'&r_version=1&showHowMany=3';
   	 //$url = 'http://www.homeadvisor.com/servlet/XMDirectoryPartnerAPI?zip='.$zipcode.'&catOID=-'.$catid.'&m=ecorpxm&numRecords=10';
   	 //echo $url;
   	 
   	 $headers = array();
   	 $param = array();
     $result = @file_get_contents($url);
     $xml = simplexml_load_string($result);
	 $json = json_encode($xml);
	 $array = json_decode($json,TRUE);
	 return $array;
   }
   
  public function getmaplocation($address){
		$url = "http://maps.google.com/maps/api/geocode/json?address=".$address."&sensor=false";
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
          if(curl_exec($ch) === false)
		{
		    echo 'Curl error: ' . curl_error($ch);
		}
        
		curl_close($ch);
        $response_a = json_decode($response);
        if (count($response_a->results)>0){
	        $lat = $response_a->results[0]->geometry->location->lat;
	        $long = $response_a->results[0]->geometry->location->lng;
	        $location = "$lat,$long";
        }else {
        	 $location = "-33.92, 151.25";
        }
        return $location;
		
	}
	
	public function getaffiliatelogin($role,$userid){
		Yii::app()->Ini->savetoaffiliate($userid,$role);
		$aff = Affiliates::model()->findByAttributes(array('user_type'=>$role,'userid'=>$userid));
		if (count($aff)>0){
			$url = 'http://api2.contrib.com/request/getaffiliateloginurl?affiliate_id='.$aff->affiliate_id;
		}else {
			$url = 'http://api2.contrib.com/request/getaffiliateloginurl?affiliate_id=394';
		}
		   $response = @file_get_contents($url);
		   $res = json_decode($response);
		   $url = $res->data->url;
		   return $url;
	}
	
	public function getaffiliateloginbyemail($email){
		$url = 'http://api2.contrib.com/request/getaffiliateloginurl?email='.$email;
			$response = @file_get_contents($url);
		   $res = json_decode($response);
		   $url = $res->data->url;
		   return $url;
	}
   
   public function savetocampaign($email,$name){
	$campaign_id = "uesF";
   	 $url = "http://www.manage.vnoc.com/campaignresponse/addContact";
   	 $param = array(
   	   'campaign_id'=>$campaign_id,
   	   'email'=>$email,
   	   'name'=>$name
   	 ); 
   	 
    	$headers = array(
	        'Accept: application/json'
	    ); 
	    
   	   $result = Yii::app()->Ini->createApiCall($url, 'POST', $headers,$param);
   }
   
}
