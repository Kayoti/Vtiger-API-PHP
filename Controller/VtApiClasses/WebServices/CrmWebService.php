<?php

namespace VtApiClasses\Controllers\WebServices;

class CrmWebService
{
   // Variable declaration
   private $_AccessKey = '';
   private $_User = '';
   private $_Url = '';
   private $_Token = '';
   private $_Login = '';
   private static $_Ch = null;  // Static cURL handle

   // Constructor to set variable value and call initial function
   public function __construct($EndPointUrl, $UserName, $UserAccessKey)
   {
      $this->_Url = $EndPointUrl;
      $this->_User = $UserName;
      $this->_AccessKey = $UserAccessKey;
      $this->Curl_Init(); // Initialize cURL handle
      $this->_Token = $this->Set_Token(); // Call set_token function
      $this->_Login = $this->Set_Access(); // Call set_access function
   }

   // Initialize cURL handle
   private function Curl_Init()
   {
      if (self::$_Ch === null) {
         self::$_Ch = curl_init();
      }
   }

   // Getting the token value
   private function Set_Token()
   {
      $Params = ["operation" => "getchallenge", "username" => $this->_User];
      $result = $this->Curl_Execution($this->_Url, $Params, "GET");
      
      // Ensure result is an array
      if (!is_array($result)) {
         throw new \Exception("Invalid response type in set_token");
      }

      return $result;
   }

   private function Set_Access()
   {
      $tokenResponse = $this->_Token;

      // Check if tokenResponse is an array
      if (!is_array($tokenResponse)) {
         throw new \Exception("Invalid token response type in Set_Access");
      }

      $challengeToken = $tokenResponse['result']['token'] ?? null;
      if (!$challengeToken) {
         throw new \Exception("Challenge token not found in Set_Access");
      }

      $generatedKey = md5($challengeToken . $this->_AccessKey);
      $Params = ["operation" => "login", "username" => $this->_User, "accessKey" => $generatedKey];
      $DataDetails = $this->Curl_Execution($this->_Url, $Params, "POST");
      $DataDetails['result']['crmurl']=$this->_Url;
      // Ensure DataDetails is an array
      if (!is_array($DataDetails)) {
         throw new \Exception("Invalid response type in Set_Access");
      }

      return $DataDetails;
   }


   public function Get_Token()
   {
      return $this->_Token;
   }

   public function Get_Access()
   {
      
      if (isset($_SESSION['token']) && isset($_SESSION['token_expires']) && $_SESSION['token_expires'] > time()) {
         // If a token exists in the session and has not expired, return it
        
         return $_SESSION['token'];
      } else {
         
         // Token is expired or not set, fetch a new one from the server
         $NewToken = $this->_Login;

         // Store the new token and its expiration time in the session
         $_SESSION['token'] = $NewToken;
         $_SESSION['token_expires'] = time() + 1200; // Set session expiration to 20 minutes (1200 seconds)
        
         return $NewToken;
      }
     
   }

   public static function Curl_Execution($Url, $Params, $RequestType)
   {
      if (self::$_Ch === null) {
         self::$_Ch = curl_init();
      }

      if ($RequestType === "GET") {
        
         $Url = $Url . "?" . http_build_query($Params);
         
      }

      // Set the URL for the cURL session
      curl_setopt(self::$_Ch, CURLOPT_URL, $Url);

      if ($RequestType === "POST") {
       
         curl_setopt(self::$_Ch, CURLOPT_POST, true);
         curl_setopt(self::$_Ch, CURLOPT_POSTFIELDS, http_build_query($Params));
         
      } else {
        
         curl_setopt(self::$_Ch, CURLOPT_HTTPGET, true);
      }

      curl_setopt(self::$_Ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt(self::$_Ch, CURLOPT_SSL_VERIFYPEER, false);

      $data = curl_exec(self::$_Ch);
      if ($data === false) {
         throw new \Exception("Curl Error: " . curl_error(self::$_Ch));
      }

      $httpCode = curl_getinfo(self::$_Ch, CURLINFO_HTTP_CODE);
      if ($httpCode != 200) {
         throw new \Exception("Request returned HTTP code " . $httpCode);
      }
      
      return json_decode($data,true);
   }


   public function __destruct()
   {
      curl_close(self::$_Ch); // Close cURL handle when the object is destroyed
   }
}
