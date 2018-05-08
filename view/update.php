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

// Update operation
$query="select * from Leads where firstname='test' and lastname='tester' and email='test@example.com';";
$updated_value=array("firstname"=>"update_test","email"=>"update_test@example.com");

// call function to perform update operation
$updateDetails=$qryobj->crm_update($query,$updated_value);
echo "<pre>";
print_r($updateDetails);
echo "</pre>";

 ?>
