<?php
include('../model/constant.inc');


include(ROOT_PATH.'controller/classes/crm_webservice.php');
include(ROOT_PATH.'controller/auth.php');
include(ROOT_PATH.'controller/classes/crm_crudoperation.php');


// Get the url and sessionid from auth.php
// create instance for class query (has all crud operations)
$qryobj=new crm_crudoperation($endpointUrl,$sessionid);
// Delete Operation
$dataArray=array("firstname"=>"test","lastname"=>"tester","email"=>"test@example.com");

$deleteDetails=$qryobj->crm_delete($dataArray);
echo "<pre>";
print_r($deleteDetails);
echo "</pre>";

 ?>
