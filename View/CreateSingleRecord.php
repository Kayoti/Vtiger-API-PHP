<?php
require_once('../Model/Const.php');

header('Content-Type: application/json');

use VtApiClasses\Controllers\WebServices\CrmWebService as CrmWebService;
use VtApiServices\Services\WebServices\VtigerService as VtigerService;
use VtApiClasses\Controllers\Operations\CrmCrudOperations as CrmCrudOperations;

$CrmObj = new CrmWebService($EndPointUrl, $UserName, $UserAccessKey);
$ServiceObj = new VtigerService($CrmObj);


$CrudObj = new CrmCrudOperations($ServiceObj);


// Create operation
$Create_Values=Array ("firstname" => "test" ,"lastname" => "tester","assigned_user_id"=>"1");
//specify the module you are trying to work with
$TargetModule="Leads";
$createResponse= $CrudObj->Crm_Create($Create_Values,$TargetModule);
echo json_encode($createResponse, JSON_PRETTY_PRINT);

?>
