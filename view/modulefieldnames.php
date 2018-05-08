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
// call function get module field names
$targetModule="Leads";
$queryDetails=$qryobj->crm_getfieldname($targetModule);
echo "<pre>";
print_r($queryDetails);
echo "</pre>";

 ?>
