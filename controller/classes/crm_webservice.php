<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

class crm_webservice{

   // Variable declaration
   protected $_AccessKey='';
   protected $_user='';
   protected $_url='';
   protected $_token='';
   protected $_login='';

   //constructor to set variable value and call initial function
   public function __construct($endpointUrl,$userName,$userAccessKey)
   {
      $this->_url=$endpointUrl;
      $this->_user=$userName;
      $this->_AccessKey=$userAccessKey;
      $this->_token= $this->set_token();  // Call set_token function
      $this->_login= $this->set_access(); // Call set_access function

   }
   // Using the function getting the token value
   protected function set_token(){
      $param=array("operation" => "getchallenge", "username" => $this->_user);
      $result=$this->curl_execution($this->_url,$param,$type = "GET");  // Call function to execute
      return $result;
   }
   // Using the function getting the sessionname to proceeed further operation
   protected function set_access(){

      $tokenResponse = $this->_token;
      $challengeToken=$tokenResponse['result']['token'];
      //access key of the user admin, found on my preferences page.
      //create md5 string concatenating user accesskey from my preference page
      //and the challenge token obtained from get challenge result.
      $generatedKey = md5($challengeToken.$this->_AccessKey);
      $param=array("operation" => "login", "username" => $this->_user, "accessKey" => $generatedKey);
      $dataDetails =$this->curl_execution($this->_url, $param , "POST");
      return $dataDetails;
   }

   public function get_token(){
      return $this->_token;  // return the tokan value by calling get_token function
   }
   public function get_access(){
      return $this->_login; // return the session value by calling get_access function
   }

   // Common curl function it executes all your operation call
   public static function curl_execution($url, $params, $type = "GET") {
       $is_post = 0;
       $return = null;
       // Set the url by identifying the type: GET or POST
       if ($type == "POST") {
           $is_post = 1;
       } else {
            $url = $url . "?" . http_build_query($params);
       }

       try {
            $ch = curl_init($url);  // initialize curl handle

            if ($is_post) {    // POST Operation

                 if($params['operation'] == 'update'){

                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                     curl_setopt($ch, CURLOPT_POST, $is_post);
                     curl_setopt($ch, CURLOPT_POSTFIELDS, $params);  // For update operation : Passing the parameters here
                 } else{
                     curl_setopt($ch, CURLOPT_POST, $is_post);
                     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
                 }

             }
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
             $data = curl_exec($ch);

             if ($data === false) {
                 $return = " Curl Error : ".curl_error($ch);
             } else {
                 $return = json_decode($data, true);  // decode the output from curl
             }
             curl_close($ch);   // Close curl handle
      }
      catch(Exception $e){

            $return='Error: Invalid URL' . $e->getMessage();
      }

      return $return;
   }

}





/***
@param String  URL link
returns HTTP_Request2 object

***/
/*class crm_webservice
{
   protected $_AccessKey='';
   protected $_user='';
   protected $_url='';
   protected $_httpObj='';
   protected $_token='';
   protected $_login='';
   //Properties


   //Methods
   //constructor
   public function __construct($endpointUrl,$userName,$userAccessKey)
   {
      $this->_url=$endpointUrl;
      $this->_user=$userName;
      $this->_AccessKey=$userAccessKey;
      $this->_httpObj = new HTTP_Request2($this->_url);
      $this->_token= $this->set_token();
      $this->_login= $this->set_access();
   }
   protected function set_token(){

      $request=$this->_httpObj;
      $args = array('operation' => 'getchallenge',
      'username' => $this->_user
   );
   $request->setMethod(HTTP_Request2::METHOD_GET);
   $url = $request->getUrl();
   $url->setQueryVariables($args);
   try {
      $response = $request->send();
      if (200 == $response->getStatus()) {
         $body=$response->getBody();
         $jsonResponse = (array) json_decode($body,true);
         if($jsonResponse['success']==false)
         //handle the failure case.
         die('getchallenge failed:'.$jsonResponse['error']['errorMsg']);

         return $jsonResponse;


      } else {
         $err= 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
         $response->getReasonPhrase();
         return $err;
      }
   } catch (HTTP_Request2_Exception $e) {
      $err='Error: ' . $e->getMessage();
      return $err;
   }
}
protected function set_access(){
   $request=$this->_httpObj;
   $tokenResponse = $this->_token;
   $challengeToken=$tokenResponse['result']['token'];
   //access key of the user admin, found on my preferences page.
   //create md5 string concatenating user accesskey from my preference page
   //and the challenge token obtained from get challenge result.
   $generatedKey = md5($challengeToken.$this->_AccessKey);
   //login request must be POST request.

   $request->setMethod(HTTP_Request2::METHOD_POST)
   ->addPostParameter(array(
      'operation'=>'login',
      'username'=>$this->_user,
      'accessKey'=>$generatedKey));
      try {
         $response = $request->send();
         if (200 == $response->getStatus()) {
            $body=$response->getBody();
            $jsonResponse = (array) json_decode($body,true);
            if($jsonResponse['success']==false)
            //handle the failure case.
            die('getchallenge failed:'.$jsonResponse['error']['errorMsg']);

            return $jsonResponse;


         } else {
            $err= 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            $response->getReasonPhrase();
            return $err;
         }
      } catch (HTTP_Request2_Exception $e) {
         $err='Error: ' . $e->getMessage();
         return $err;
      }




   }
   public function get_token(){
      return $this->_token;
   }
   public function get_access(){
      return $this->_login;
   }

}  */
?>
