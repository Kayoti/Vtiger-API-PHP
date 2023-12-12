<?php
require_once('../Model/Const.php');

header('Content-Type: application/json');

use VtApiClasses\Controllers\WebServices\CrmWebService as CrmWebService;
use VtApiServices\Services\WebServices\VtigerService as VtigerService;
use VtApiClasses\Controllers\Operations\CrmCrudOperations as CrmCrudOperations;

$CrmObj = new CrmWebService($EndPointUrl, $UserName, $UserAccessKey);
$ServiceObj = new VtigerService($CrmObj);
//var_dump($ServiceObj);exit;

$CrudObj=new CrmCrudOperations($ServiceObj);

// Query the record that you want to update
$Query_Statement= "select * from Leads where id='7454444291';";
//execute the query and store the response the query will return
// an array with all records that match including duplicate records
$Query_StatementDetails = $CrudObj->Crm_Query($Query_Statement);


// setup the fields you want to update
$Updated_Values=array("firstname"=>"test","email"=>"f_test@example.com");
// from the records returned you must provide  the ID, lastname and assigned user to target the update
$Updated_Values['id'] = $Query_StatementDetails['result']['0']['id']; //manditory field
$Updated_Values['lastname'] = $Query_StatementDetails['result']['0']['lastname']; //manditory field
//manditory field set to same assigned user or change ID to assign record under a different user
$Updated_Values['assigned_user_id'] = $Query_StatementDetails['result']['0']['assigned_user_id']; 
// call function to perform update operation
$updateResponse= $CrudObj->Crm_Update($Updated_Values);

echo json_encode($updateResponse, JSON_PRETTY_PRINT);
exit;
 ?>
