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
// call function get module field names
$TargetModule="Leads";
$Query_StatementResponse= $CrudObj->Crm_GetFieldName($TargetModule);
echo json_encode($Query_StatementResponse, JSON_PRETTY_PRINT);

 ?>
