<?php
//Autoload classes
require_once __DIR__. '/../vendor/autoload.php';
// Start the session
session_start();
//CRM Credentials ...for security purposes please use php environment variables read more about getenv and php environment variables to prevent security issues

$endpointUrl = getenv('CRMURL');    // [YOUR CRM URL ENVIRONMENT VARIABLE HERE] YOUR URL MUST END WITH /webservice.php eg(http://example.com/vtigercrm/webservice.php) 
$userName = getenv('CRMUSERNAME');    // [YOUR CRM USER ENVIRONMENT VARIABLE HERE] // recommend  CRM USER with admin previliage
$userAccessKey = getenv('CRMAPIKEY'); // [YOUR CRM USER ACCESS KEY ENVIRONMENT VARIABLE HERE] //access key of the user admin, found on my preferences page.

 ?>
