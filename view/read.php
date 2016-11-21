<?php
include('../model/constant.inc');


include(ROOT_PATH.'controller/classes/crm_webservice.php');
include(ROOT_PATH.'controller/auth.php');
include(ROOT_PATH.'controller/classes/query.php');


// Get the url and sessionid from auth.php
// create instance for class query (has all crud operations)
$qryobj=new crm_crudoperation($endpointUrl,$sessionid);
// query operation
$query="select * from Leads where firstname='test' and lastname='tester' and email='test@example.com';";
// call function to perform query operation
$queryDetails=$qryobj->crm_query($query);
echo "<pre>";
print_r($queryDetails);
echo "</pre>";

 ?>
