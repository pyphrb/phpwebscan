<?php
/**
*@网络请求模块
*@author pyphrb
*支持get,post https方式的curl库，php7
*/


class Curl
{

	function __construct()
	{
		if(function_exists(curl_init))
		{
		
		}else{
			echo 'can\'\t find curl function extentions';
			exit(0);
		}	

	}


	

	public function curlGetHttpValue(string $url) : string {
		try {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //30秒超时
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$output=curl_exec($ch);
			curl_close($ch);
		} catch (Exception $e) {
		
			$data = null;
		}
		
		return $output;

		



	}



/**
*@function curlGetHttpValue
*@param $url 
*@return $output string or null
*如果访问页面出现异常,返回为null值
*
**/

	public function curlGetHttpsValue(string $url) : string
	{

		try {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //30秒超时
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
			$output=curl_exec($ch);
			curl_close($ch);
		} catch (Exception $e) {
		
			$data = null;
		}
		
		return $output;
		


	
	}

	public function curlPostHttpValue(string $url, array $data) : string {

		try {
	 		$ch = curl_init();	
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //30秒超时
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$curlPost = is_array(data) ? http_build_query($data) : $data;
			curl_setopt($ch, CURLOPT_POST, 1); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost); 
			$output = curl_exec($ch);  
			curl_close($ch);
		} catch (Exception $e) {
			
			$output = null;  

		}	
			
		return $output;



	}


	public function curlPostHttpsValue(string $url, array $data) : string {

		try {
	 		$ch = curl_init();	
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //30秒超时
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$curlPost = is_array(data) ? http_build_query($data) : $data;
			curl_setopt($ch, CURLOPT_POST, 1); 
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
			curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost); 
			$output = curl_exec($ch);  
			curl_close($ch);
		} catch (Exception $e) {
			
			$output = null;  

		}	
			
		return $output;



	}
}

$curl = new Curl();

$data = array('username' => 'pyphrb');
echo $curl->curlPostHttpValue('http://127.0.0.1', $data);

?>
