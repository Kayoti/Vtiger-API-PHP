<?php
include('../model/constant.inc');
/* create entry by using Webservice -API */
include(ROOT_PATH.'controller/classes/crm_webservice.php');
include(ROOT_PATH.'controller/auth.php');
include(ROOT_PATH.'controller/classes/crm_crudoperation.php');

// Get the url and sessionid from auth.php
// create instance for class
$qryobj=new crm_crudoperation($endpointUrl,$sessionid);

// Create operation
$createData=Array ("firstname" => "test" ,"lastname" => "tester","phone" => "1000000001");

$createDetails=$qryobj->crm_create($createData);
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
