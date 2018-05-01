<?php namespace VtApiClasses\Webservices;

use VtApiClasses\Webservices\crm_webservice as crm_webservice;
class crm_auth    // Class Start
{

  // variable declaration
  public $challengeToken;
  public $login ;
  public $userid;
  public $sessionid;

  //constructor to set variable value
  public function __construct($endpointUrl,$userName,$userAccessKey){
    $crmobj= new crm_webservice($endpointUrl,$userName,$userAccessKey);
     $this->challengeToken = $crmobj->get_token();
     $this->login = $crmobj->get_access();
     $this->userid=$this->login['result']['userId'];
     $this->sessionid=$this->login['result']['sessionName'];

  }
  /**
   * Gets the crm challenge token.
   *
   * @return $challengeToken
   */
  public function getchallengeToken()
  {
      return $this->challengeToken;
  }

  /**
   * Sets the crm challenge token.
   *
   * @param  $challengeToken
   *
   * @return self
   */
  public function setchallengeToken($challengeToken)
  {
      $this->challengeToken = $challengeToken;


  }
  /**
   * Gets the crm sessionid.
   *
   * @return $sessionid
   */
  public function getsessionid()
  {
      return $this->sessionid;
  }

  /**
   * Sets the crm sessionid.
   *
   * @param  $sessionid
   * @param  $crmobj
   *
   * @return self
   */
  public function setsessionid($sessionid)
  {
    $this->sessionid = $sessionid;
  }
}





?>
