<?php
require_once('../model/constant.inc');

use VtApiClasses\Operations\crm_crudoperation as crm_crudoperation;
use VtApiClasses\Webservices\crm_auth as crm_auth;

// Get the url and sessionid from auth.php
if($_SESSION["vtsession"]==""){
session_unset();
$authobj=new crm_auth($endpointUrl,$userName,$userAccessKey);
$_SESSION["vtsession"] = $authobj->sessionid;
}

// create instance for class query (has all crud operations)
$qryobj=new crm_crudoperation($endpointUrl,$_SESSION["vtsession"]);

// Create operation
$createData=Array ("firstname" => "testwaelx" ,"lastname" => "testerwaelx","assigned_user_id"=>"1");
//specify the module you are trying to work with
$targetModule="Leads";
$createDetails=$qryobj->crm_create($createData,$targetModule);
echo "<pre>";
print_r($createDetails);
echo "</pre>";
if(!empty($createDetails['result'])){

}else{
  echo $code=$createDetails['error']['code'];
  echo "<br />";
  echo $message=$createDetails['error']['message'];
}

?>
