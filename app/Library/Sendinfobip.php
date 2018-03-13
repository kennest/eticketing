<?php

 class Sendinfobip {
	/**
	 * Chart API URL
	 */
	 private static $instance;

	/**
	 * Code credential
	 *
	 * @var string $_data
	 */
	
	 	public $apiUsername;

	    public $apiPassword;

	    public $apiToken;

	    public $apiTypeAction;


	    public $smsto;


	    public $smsta;

	    public $smsfrom;
	    /*
	     message (+ or %20 for spaces, urlencode for non ascii chars)
	     */
	    public $smsmessage;
	    /*
	    : message type (flash or text)
	    */
	   
	
		const API_URL = "https://api.infobip.com/sms/1/text/single";

		
	/**
	 * Send SMS
	 *
	 * @param int $size
	 * @param string $filename
	 * @return bool
	 */
	private function init(){
        
  	 $this->apiUsername ='ipwav';
	 $this->apiPassword ='ks1234';

     }
    
    public static function getInstance() {
        if(self::$instance === null){
            self::$instance = new Sendinfobip();
            self::$instance->init();
        }

        return self::$instance;
    }
		
     private function __construct(){ 
        
    }


  

    public function SendSms($smsInfo=array()){     

		$API_UserName = $this->apiUsername;
    	$API_Password = $this->apiPassword;

    	$smsTO=$smsInfo['Sms']['to'];
        $smsMSG=$smsInfo['Sms']['msg'];

			$paramsend = array(
					"from" =>"E-TICKETING",
					"to" =>$smsTO,
					"text" =>$smsMSG							
			);

			$header = array("Authorization: Basic aXB3YXY6a3MxMjM0",
							"Content-Type:application/json", 
							"Accept:application/json");

        $data_string = json_encode($paramsend);

 $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, self::API_URL);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  $data_string);

// response of the POST request
$response = curl_exec($ch);
//echo "<strong>HTTP Status:</strong> <br>".curl_getinfo($ch, CURLINFO_HTTP_CODE)."<br><br>";
curl_close($ch);
//$json = json_decode($response);
//$json = json_encode($json, JSON_PRETTY_PRINT);
//printf("<pre>%s</pre>", $json);
//exit();
    	} 
	
	}
?>