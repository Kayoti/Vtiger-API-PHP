<?php
include('../model/constant.inc');
include(ROOT_PATH.'controller/classes/crm_webservice.php');
include(ROOT_PATH.'controller/auth.php');
include(ROOT_PATH.'controller/classes/query.php');


// Get the url and sessionid from auth.php
// create instance for class query (has all crud operations)
$qryobj=new crm_crudoperation($endpointUrl,$sessionid);

// Update operation
$query="select * from Leads where firstname='test' and lastname='tester' and email='test@example.com';";
$updated_value=array("firstname"=>"update_test","email"=>"update_test@example.com");

// call function to perform update operation
$updateDetails=$qryobj->crm_update($query,$updated_value);
echo "<pre>";
print_r($updateDetails);
echo "</pre>";

 ?>
