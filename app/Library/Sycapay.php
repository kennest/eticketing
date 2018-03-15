<?php
/**
 * Paypal.php
 * @author Milad Alshomary
 * @package PayPal
 * @version 1.0
 */
    
class Sycapay
{
    private static $instance;
    
  
    public $X_SYCA_MERCHANDID;

    public $montant;
    
    public $X_SYCA_APIKEY;

    public $X_SYCA_REQUEST_DATA_FORMAT = "KVP" ;

    public $X_SYCA_RESPONSE_DATA_FORMAT ="KVP";

    public $curr = 'XOF';
    public $curr2 = 'F CFA';
  
    public $defaultDescription = 'test_init';
   
    

   
    public $apiLive = false;
    
    public $returnUrl;
    public $cancelUrl;

    public $errorUrl;
   
   
    public $sycapayUrlInit;
    public $sycapayUrl;
    
    /**
    # Version: this is the API version in the request.
    # It is a mandatory parameter for each API request.
    # The only supported value at this time is 2.3
    */
 
    
    private function init()
    {
        $this->apiLive      = false;

        $this->returnUrl    = "";
        $this->cancelUrl    ="";
      
        //Whether we are in sandbox or in live environment
        if ((bool)$this->apiLive === true) {
            //live
            $this->X_SYCA_MERCHANDID  = 'C_57359E9C95103';
            $this->X_SYCA_APIKEY='pk_syca_753413334715da0c50e0a6adaf4d12abd9be1aa3';
            $this->sycapayUrlInit = "https://secure.sycapay.com/login";
            $this->sycapayUrl = 'https://secure.sycapay.com/checkresponsive';
        } else {
            //test
            $this->X_SYCA_MERCHANDID = 'C_56713FBF3E6A4';
            $this->X_SYCA_APIKEY='pk_syca_d49497468317152423d42aaff0d1166fc1b9522d';
            $this->sycapayUrlInit = "https://secure.sycapay.net/login";
            $this->sycapayUrl = "https://secure.sycapay.net/checkresponsive";
        }
    }
    
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Sycapay();
            self::$instance->init();
        }

        return self::$instance;
    }

    private function __construct()
    {
    }
    
  
    public function APIError($errorNo, $errorMsg, $resArray)
    {
        $resArray['Error']['Number']=$errorNo;
        $resArray['Error']['Number']=$errorMsg;
        return $resArray;
    }
    
    public function isCallSucceeded($resArray)
    {
        $ack =$resArray["code"];
        //Detect Errors
        if ($ack != 0) {
            return false;
        } else {
            return true;
        }
    }

    public function SycapayInit($paymentInfo=array())
    {
        $montant = urlencode($paymentInfo['Order']['Total']);
        $Sycapay_Curr  =   $this->curr;
          
        $nvpstr="montant=".$montant."&curr=". $Sycapay_Curr;
        //  print_r($nvpstr);
        $resArray=$this->hash_call("SycapayInit", $nvpstr);
        // print_r($resArray);
        return $resArray;
    }


    public function hash_call()
    {
        $Sycapay_Curr  =   $this->curr;
          
        $Sycapay_MerchandId      =   $this->X_SYCA_MERCHANDID;
        $Sycapay_ApiKey          =   $this->X_SYCA_APIKEY;
        $Sycapay_Url             =   $this->sycapayUrlInit;
        $Sycapay_ReqForm         =   $this->X_SYCA_REQUEST_DATA_FORMAT;
        $Sycapay_RespForm        =   $this->X_SYCA_RESPONSE_DATA_FORMAT;

        $headders = "X-SYCA-MERCHANDID=".$Sycapay_MerchandId."&X-SYCA-APIKEY=".$Sycapay_ApiKey."&X-SYCA-REQUEST-DATA-FORMAT=".$Sycapay_ReqForm."&X-SYCA-RESPONSE-DATA-FORMAT=".$Sycapay_RespForm;

        $headers = array(
                        'X-SYCA-MERCHANDID: '.$Sycapay_MerchandId,
                        'X-SYCA-APIKEY: '.$Sycapay_ApiKey,
                        'X-SYCA-REQUEST-DATA-FORMAT:'.$Sycapay_ReqForm,
                        'X-SYCA-RESPONSE-DATA-FORMAT: '.$Sycapay_RespForm
                        );
        //setting the curl parameters.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Sycapay_Url);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        //turning off the server and peer verification(TrustManager Concept).
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        /*
             $nvpreq="X-SYCA-MERCHANDID=".urlencode($Sycapay_MerchandId)."&X-SYCA-APIKEY=".urlencode( $Sycapay_ApiKey )."&X-SYCA-REQUEST-DATA-FORMAT=".urlencode( $Sycapay_ReqForm)."&X-SYCA-RESPONSE-DATA-FORMAT=".urlencode( $Sycapay_RespForm );
         */
        //   $nvpstr="montant=50&curr=". $Sycapay_Curr;
             
        //setting the nvpreq as POST FIELD to curl
        curl_setopt($ch, CURLOPT_POSTFIELDS, "");
      
        $response = curl_exec($ch);
        //convrting NVPResponse to an Associative Array
        $nvpResArray=$this->deformatNVP($response);
        // $nvpReqArray=$this->deformatNVP($nvpreq);
     
        if (curl_errno($ch)) {
            $nvpResArray = $this->APIError(curl_errno($ch), curl_error($ch), $nvpResArray);
        } else {
            curl_close($ch);
        }
       
        return $nvpResArray;
    }

     
     
    /** This function will take NVPString and convert it to an Associative Array and it will decode the response.
      * It is usefull to search for a particular key and displaying arrays.
      * @nvpstr is NVPString.
      * @nvpArray is Associative Array.
      */
    public function deformatNVP($nvpstr)
    {
        $intial=0;
        $nvpArray = array();
     
     
        while (strlen($nvpstr)) {
            //postion of Key
            $keypos= strpos($nvpstr, '=');
            //position of value
            $valuepos = strpos($nvpstr, '&') ? strpos($nvpstr, '&'): strlen($nvpstr);
     
            /*getting the Key and Value values and storing in a Associative Array*/
            $keyval=substr($nvpstr, $intial, $keypos);
            $valval=substr($nvpstr, $keypos+1, $valuepos-$keypos-1);
            //decoding the respose
            $nvpArray[urldecode($keyval)] =urldecode($valval);
            $nvpstr=substr($nvpstr, $valuepos+1, strlen($nvpstr));
        }
        return $nvpArray;
    }

    /*
    public function SycapayPaiement($payInfo=array()){

                $token            =  urlencode($payInfo['Order']['token']);
            $amount           =  urlencode($payInfo['Order']['amount'])   ;
            $currency         =     $this->curr2;
            $urls             =     urlencode( $this->returnUrl) ;
            $urlc             =     urlencode( $this->cancelUrl);
            $merchandid      =urlencode( $this->X_SYCA_MERCHANDID);
            $typpaie          = "Paiement";
            $commande         =  "Ceci est un test";
            $Sycapay_Url2        =$this->sycapayUrl;


            $nvpreq="token=".$token."&amount=".$amount."&merchandid=".$merchandid."&currency=".$currency."&urls=".$urls."&urlc=".$urlc."&typpaie=".$typpaie."&commande=".$commande;

            $agent ='Mozilla/5.0 (Windows NT 6.1; WOW64; rv:44.0) Gecko';
            //setting the curl parameters.
            $ch = curl_init($Sycapay_Url2);
          //  curl_setopt($ch, CURLOPT_URL,$Sycapay_Url2  );
           curl_setopt($ch, CURLOPT_USERAGENT,$agent);
           // curl_setopt($ch, CURLOPT_VERBOSE, 1);
            //turning off the server and peer verification(TrustManager Concept).
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
              curl_setopt($ch,CURLOPT_FOLLOWLOCATION, 1);
           // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            //setting the nvpreq as POST FIELD to curl
            curl_setopt($ch,CURLOPT_POSTFIELDS,$nvpreq);

           //  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

           $result= curl_exec($ch);

           // print_r($result);
            curl_close($ch);



        }

    public function def($payInfo=array()){

            $token            =     urlencode($payInfo['Order']['token']);
            $amount           =     urlencode($payInfo['Order']['amount'])   ;
            $currency         =     $this->curr2;
            $urls             =     urlencode( $this->returnUrl) ;
            $urlc             =     urlencode( $this->cancelUrl);
            $merchandid       =     urlencode( $this->X_SYCA_MERCHANDID);
            $typpaie          = "Paiement";
            $commande         =  "Ceci est un test";
            $Sycapay_Url2     =     $this->sycapayUrl;

    $data = http_build_query(
      array (   'token'     =>$token,
                'amount'    =>$amount ,
                'merchandid'=>$merchandid,
                'currency'  =>$currency,
                'urls'     =>$urls,
                'urlc'      =>$urlc,
                'typpaie'   =>$typpaie,
                'commande'  =>$commande
    ));

    $context_options = array (
            'http' => array (
                     'method' => 'POST',
                     'header'=> "Content-type: application/x-www-form-urlencoded",
                     'content' => $data
                )
            );

    $context = stream_context_create($context_options);
    echo file_get_contents($Sycapay_Url2, false, $context);

    }
    */
}
