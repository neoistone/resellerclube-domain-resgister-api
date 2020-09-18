<?php

/**
 * ResellerclubDomain api neoistone version 
 * version 1.0.0
 * website www.neoistone.com
 * API Documentation : freeaccount.myorderbox.com/kb/answer/750
 **/
 namespace neoistone\Resellerclub;

class domainapi
{
	private $api = null;
	private $api_key = null;
	private $api_secure = null;
	private $response = null;
    
    function __construct($user_id,$api_key,$response="json",$environment=true)
	{
		if ($environment) {
		  self::api = "https://httpapi.com/api/domains/";
		  self::api_key = $api_key;
		  self::api_secure = $user_id;
		  self::response = $response;
		}else{
		  self::api = "https://test.httpapi.com/api/domains/";
		  self::api_key = $api_key;
		  self::api_secure = $user_id;
		  self::response = $response;
		}
	}
    
    public static function command()
    {
       if(!func_num_args() == 2){ self::error ='params not empty'; } else {
		$x = func_get_args();
		//decting params corret way
		if(is_array($x['0'])){ $params = $x['0'];  $cmd = $x['1']; }else{ $params = $x['1']; $cmd = $x['0']; }
		if(is_array($x['1'])){ $params = $x['1'];  $cmd = $x['0']; }else{ $params = $x['0']; $cmd = $x['1']; }
           self::api .= strtolower($cmd).".".strtolower(self::response);
           self::api .= "?auth-userid=".self::api_key;
	   self::api .= "&api-key=".self::api_secure;
	   foreach($params as $key => $value) {
           self::api .= '&'.urlencode($key).'='.urlencode($value);
       }}
    }

    public static function run(){
      if(!empty(self::error)){ return self::error; } else{
    	 $ch = curl_init();
         curl_setopt($ch,CURLOPT_URL, self::api);
         curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
         curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
         curl_setopt($ch, CURLOPT_TIMEOUT, 5);
         return curl_exec($ch);
         curl_close($ch);}
    }
}

?>
