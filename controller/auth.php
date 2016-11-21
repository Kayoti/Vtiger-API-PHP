<?php
//access key of the user admin, found on my preferences page.
//URL should be the vtiger installed path

$endpointUrl = 'http://example.com/webservice.php';
$userName = '[YOUR CRM USER HERE]';
$userAccessKey = '[YOUR CRM USER ACCESS KEY HERE]';

// Create instance for class
$crmobj= new crm_webservice($endpointUrl,$userName,$userAccessKey);

$challengeToken = $crmobj->get_token();
//echo $challengeToken['result']['token'];
//echo $challengeToken['result']['serverTime'];
//echo $challengeToken['result']['expireTime'];
//echo "<br />";
$login = $crmobj->get_access();
$userid=$login['result']['userId'];
$sessionid=$login['result']['sessionName'];





?>
