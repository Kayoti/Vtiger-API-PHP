<?php
//Autoload classes
require_once __DIR__. '/../vendor/autoload.php';
// Start the session
session_start();
//CRM Credentials
$endpointUrl = 'http://example.com/webservice.php'; //URL should be the vtiger installed path
$userName = '[YOUR CRM USER HERE]'; // recommend  CRM USER with admin previliage
$userAccessKey = '[YOUR CRM USER ACCESS KEY HERE]'; //access key of the user admin, found on my preferences page.

 ?>
