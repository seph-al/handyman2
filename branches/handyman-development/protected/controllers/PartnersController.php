<?php

class PartnersController extends Controller
{
 
    public $layout='/layouts/home';
    public $cities = "";
		
			private function createApiCall($url, $method, $headers, $data = array(),$user=null,$pass=null)
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
		
		
		public function actionIndex(){
			$domain_name = 'handyman.com';
			$domainid = 10231;
			$key = md5('vnoc.com');
			$headers = array('Accept: application/json');
			
				//$api_url2 = "http://api2.contrib.com/request/";
				$api_url2 = "http://api.contrib.com/request/";
				$url = $api_url2.'getpartners?domain='.$domain_name.'&key='.$key;
				$result = $this->createApiCall($url, 'GET', $headers, array());
				$partners_result = json_decode($result,true);
				$approved_partner = "";
				
				//if ($partners_result['success']){
					//$data['partners'] = $partners_result['data'];
				//}
			$data['partners'] = $partners_result;
			$this->render('partners',$data);
		}
		
		public function actionGetsearchedpartner(){
			$search_key = $_POST['search_key'];
			$domain_name = 'handyman.com';
			$domainid = 10231;
			$key = md5('vnoc.com');
			$headers = array('Accept: application/json');
			
				
				$api_url2 = "http://api.contrib.com/request/";
				$url = $api_url2.'getsearchedpartner?domain='.$domain_name.'&key='.$key.'&search_key='.$search_key;
				$result = $this->createApiCall($url, 'GET', $headers, array());
				$partners_result = json_decode($result,true);
				$approved_partner = "";
			
			$data['partners'] = $partners_result;
			$this->renderPartial('partners-find',$data);
		}
}
?>