<?php
require_once ('classes/crm_webservice.php');
$url = 'http://example.com/vtigercrm/webservice.php';
$userName='[YOUR CRM USER HERE]';
$userAccessKey='[YOUR CRM USER ACCESS KEY HERE]';
//Creates a new webservices object by passing vtigercrm url, a vtiger crm username, vtigercrm useraccesskey
$crmobj= new crm_webservice($url,$userName,$userAccessKey);

//IF operation was successful get the token from the reponse.
$challengeToken = $crmobj->get_token();
//echo $challengeToken['result']['token'];
//echo $challengeToken['result']['serverTime'];
//echo $challengeToken['result']['expireTime'];
//IF login successful extract sessionId and userId from LoginResult to it can used for further calls.
$login = $crmobj->get_access();
//echo $login['result']['userId'];;
//echo $login['result']['sessionName'];;

?>
