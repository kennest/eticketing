<?php

 class Sendsms {
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
	    public $smstype;
	    /*
	     whether message unicode or not (1=unicode, 0=not unicode)
	     */
	    public $smsunicode;
	    /*
	    	: SMS footer (for ta=pv pr ta=bc)
	    	*/
	    public $smsfooter;
	    /*
	    : remove SMS footer
		*/
		public $smsnofooter;
		 /*
	 	: schedule message delivery, insert date and time with format
		  YYYY-MM-DD hh:mm:ss, for example: 2013-11-19 15:20:00
		  */
		public $smsschedule;
		/*: queue code
		*/
		public $smsqueue;	
		/*
		: sender number or ID
		*/	
		public $smssrc;	
		/*
		: destination number (single number)
		*/	
		public $smsdst;	
		/*
		: send SMS date/time
		*/	
		public $smsdt;
		/*
		: SMS Log ID
		*/	
		public $smssmslog_id;
		/*
		: last SMS log ID (this number not included on result)
		*/	
		public $smslast;
		/*
		: number of delivery status that will be retrieved
		*/
		public $smsc;	
		/*
		: keyword
		*/	
		public $smskwd	;

		public $outputfomrmat;	

		const API_URL = "http://smscpanel.ipwav.com/index.php?app=webservices";

		
	/**
	 * Send SMS
	 *
	 * @param int $size
	 * @param string $filename
	 * @return bool
	 */
	private function init(){
      /*  $config = new Phalcon\Config\Adapter\Ini(__DIR__ . '/../../app/config/config.ini');*/
        
      $this->apiUsername  = 'technicalteam';  
      $this->apiPassword ='ipwav2016';           
      $this->apiToken	= 'a93e4f3c1407030967c5fe6d3992dd5f';

     }
    
    public static function getInstance() {
        if(self::$instance === null){
            self::$instance = new Sendsms();
            self::$instance->init();
        }

        return self::$instance;
    }
		
     private function __construct(){ 
        
    }


    public function sms_call($methodName,$smsStr){
    	$API_UserName = $this->apiUsername;
    	$API_Password = $this->apiPassword;
        $API_Token 	= $this->apiToken;
        //setting the curl parameters. 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, self::API_URL); 
        curl_setopt($ch, CURLOPT_VERBOSE, 0); 
     
        //turning off the server and peer verification(TrustManager Concept). 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
     
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($ch, CURLOPT_POST, 1); 
            
        //APIRequest for submitting to server 
        
   		 $apiaccess="&u=".urlencode($API_UserName)."&p=".urlencode($API_Password)."&h=".urlencode($API_Token).$smsStr;
        //setting the nvpreq as POST FIELD to curl 
        curl_setopt($ch,CURLOPT_POSTFIELDS,$apiaccess); 
     
        //getting response from server 
        $response = curl_exec($ch); 
     
        //convrting NVPResponse to an Associative Array 
        $smsResArray=$this->deformatNVP($response); 
        $smsReqArray=$this->deformatNVP($apiaccess); 
     
		        if (curl_errno($ch)){ 
		            $smsResArray = $this->APIError(curl_errno($ch),curl_error($ch),$smsResArray); 
		        }else{  
		            curl_close($ch); 
		        }
     
        return $smsResArray; 
    } 




     /** This function will take SMSString and convert it to an Associative Array and it will decode the response.
      * It is usefull to search for a particular key and displaying arrays. 
      * @smsstr is smsString. 
      * @smsArray is Associative Array. 
      */    
    public function deformatNVP($smsstr){ 
     
         $intial=0; 
         $smsArray = array(); 
     
     
        while(strlen($smsstr)){ 
            //postion of Key 
            $keypos= strpos($smsstr,'='); 
            //position of value 
            $valuepos = strpos($smsstr,'&') ? strpos($smsstr,'&'): strlen($smsstr); 
     
            /*getting the Key and Value values and storing in a Associative Array*/ 
            $keyval=substr($smsstr,$intial,$keypos); 
            $valval=substr($smsstr,$keypos+1,$valuepos-$keypos-1); 
            //decoding the respose 
            $smsArray[urldecode($keyval)] =urldecode( $valval); 
            $smsstr=substr($smsstr,$valuepos+1,strlen($smsstr)); 
         } 
        return $smsArray; 
    }

 public function APIError($errorNo,$errorMsg,$resArray){ 
        $resArray['Error']['Number']=$errorNo; 
        $resArray['Error']['Number']=$errorMsg; 
        return $resArray; 
    }


    /*
    Send SMS
    ta		: pv
    parameters	: u, h, to, msg, type, unicode, from, footer, nofooter, format
    returns	: error returns
    notes	: to parameter is a valid international formatted mobile number
    */
    public function SendSms($smsInfo=array()){ 

    	$smsTO=$smsInfo['Sms']['to'];

        $smsMSG=$smsInfo['Sms']['msg'];

        $smsta='pv'; 
      
        $outputformat = 'json'; 

        $smsstr='&ta='.urlencode($smsta).'&to='.urlencode($smsTO).'&msg='.urlencode($smsMSG).'&from=E-TICKETING&format='.urlencode($outputformat); 

        $resArray=$this->sms_call("SendSms",$smsstr); 
        return $resArray; 
    	} 
	
	}
?>