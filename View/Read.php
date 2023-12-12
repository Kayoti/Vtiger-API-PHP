<?php
require_once('../Model/Const.php');

header('Content-Type: application/json');

use VtApiClasses\Controllers\WebServices\CrmWebService as CrmWebService;
use VtApiServices\Services\WebServices\VtigerService as VtigerService;
use VtApiClasses\Controllers\Operations\CrmCrudOperations as CrmCrudOperations;

$CrmObj = new CrmWebService($EndPointUrl, $UserName, $UserAccessKey);
$ServiceObj = new VtigerService($CrmObj);


$CrudObj = new CrmCrudOperations($ServiceObj);
// query operation
$Query_Statement= "select * from Leads where id='7454444291';";
// call function to perform query operation
$Query_StatementResponse= $CrudObj->Crm_Query($Query_Statement);
echo json_encode($Query_StatementResponse, JSON_PRETTY_PRINT);

 ?>
