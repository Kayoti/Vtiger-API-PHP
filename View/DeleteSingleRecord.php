<?php
require_once('../Model/Const.php');

header('Content-Type: application/json');

use VtApiClasses\Controllers\WebServices\CrmWebService as CrmWebService;
use VtApiServices\Services\WebServices\VtigerService as VtigerService;
use VtApiClasses\Controllers\Operations\CrmCrudOperations as CrmCrudOperations;

$CrmObj = new CrmWebService($EndPointUrl, $UserName, $UserAccessKey);
$ServiceObj = new VtigerService($CrmObj);
$CrudObj = new CrmCrudOperations($ServiceObj);
// Query the record that you want to update
$Query_Statement= "select * from Leads where id='10x7454444291';";
//execute the query and store the response the query will return
// an array with all records that match including duplicate records
$Query_StatementDetails = $CrudObj->Crm_Query($Query_Statement);
$DeleteResponse= $CrudObj->Crm_Delete($Query_StatementDetails['result']['0']['id']);
echo json_encode($DeleteResponse, JSON_PRETTY_PRINT);

 ?>
