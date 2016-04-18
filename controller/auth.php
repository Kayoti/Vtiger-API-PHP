<?php
require_once 'classes/crm_webservice.php';
$url = 'http://example.com/vtigercrm/webservice.php';
$userName="admin";
$crmobj= new crmconnect($url);
$crmResponse=$crmobj->getToken($userName,$url);
//IF operation was successful get the token from the reponse.
$challengeToken = $crmResponse['result']['token'];
$serverTime = $crmResponse['result']['serverTime'];
$expireTime = $crmResponse['result']['expireTime'];
$crmLogin=$crmobj->signIn($challengeToken,$userName,$url);
//IF login successful extract sessionId and userId from LoginResult to it can used for further calls.
$userId = $crmLogin['result']['userId'];
$sessionId=$crmLogin['result']['sessionName'];
//echo $challengeToken;
//echo $sessionId;

?>
