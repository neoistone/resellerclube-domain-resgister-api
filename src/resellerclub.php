<?php
namespace neoistone\Resellerclub;
/**
 * @package neoistone
 * @author Neoistone Technologies
 * @contact support@eoistone.com
 */
class domainapi
{
	private $api = "https://httpapi.com/api/domains/";
	private $api_key = null;
	private $api_secure = null;
	private $error = null;

	private $response = "json";
    
    function __construct($user_id,$api_key,$response="json",$environment=true)
	{
		$this->api = (!$environment) ? "https://test.httpapi.com/api/domains/" : "https://httpapi.com/api/domains/";
	        $this->api_key = $api_key;
	        $this->api_secure = $user_id;
	        $this->response = $response;
	}
    
    public function command()
    {
       if(!func_num_args() == 2){ $this->error ='params not empty'; } else {
		$x = func_get_args();
		//decting params corret way
		if(is_array($x['0'])){ $params = $x['0'];  $cmd = $x['1']; }else{ $params = $x['1']; $cmd = $x['0']; }
		if(is_array($x['1'])){ $params = $x['1'];  $cmd = $x['0']; }else{ $params = $x['0']; $cmd = $x['1']; }
           $this->api .= strtolower($cmd).".".strtolower($this->response);
           $this->api .= "?auth-userid=".$this->api_key;
	       $this->api .= "&api-key=".$this->api_secure;
	   foreach($params as $key => $value) {
           $this->api .= '&'.urlencode($key).'='.urlencode($value);
       }}
    }

    public static function run(){
      if(!empty($this->error)){ return $this->error; } else{
    	 $ch = curl_init();
         curl_setopt($ch,CURLOPT_URL, $this->api);
         curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
         curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
         curl_setopt($ch, CURLOPT_TIMEOUT, 5);
         return curl_exec($ch);
         curl_close($ch);}
    }
}

?>
