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

// create instance for class crm_crudoperation (has all crud operations)
$qryobj=new crm_crudoperation($endpointUrl,$_SESSION["vtsession"]);
// query operation
$query="select lastname from Leads where firstname='test' and lastname='test' and email='test@test.com';";
// call function to perform query operation
$queryDetails=$qryobj->crm_query($query);
echo "<pre>";
print_r($queryDetails);
echo "</pre>";

 ?>
