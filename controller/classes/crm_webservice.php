<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


require_once '../../../../../../usr/share/pear/HTTP/Request2.php';
/***
@param String  URL link
returns HTTP_Request2 object

***/
class crm_webservice
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

}
?>
