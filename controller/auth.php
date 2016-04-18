<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'classes/crm_webservice.php';
$url = 'http://example.com/vtigercrm/webservice.php';
$userName="admin";
$crmobj= new crmconnect($url);
$crmResponse=$crmobj->getToken($userName,$url);
$challengeToken = $crmResponse['result']['token'];
$serverTime = $crmResponse['result']['serverTime'];
$expireTime = $crmResponse['result']['expireTime'];
$crmLogin=$crmobj->signIn($challengeToken,$userName,$url);
$userId = $crmLogin['result']['userId'];
$sessionId=$crmLogin['result']['sessionName'];
//echo $challengeToken;
//echo $sessionId;

?>
