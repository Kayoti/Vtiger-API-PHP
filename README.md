### Vtiger Webservices API PHP Wrapper
###Structure
```
Vtiger-Webservices-curl/
├── controller/
│  └──classes/
│    ├──crm_webservice.php
│    ├──crm_crudoperation.php
│  ├──auth.php
├── model/
│  constant.php
├── View/
│  ├──index.php
│  ├──create.php
│  ├──read.php
│  ├──update.php
│  ├──delete.php
├── .gitignore.swp
├── .README.md
├── .LICENSE.md


```		
###Installation
To run this project make sure that curl is installed and active in your php.ini

* PRO tip -> to debug your code use the following code to toggle error messages display On/OFF
```php
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
```
###Usage
To use this project you must replace the variables in controller/auth.php with your own information

```php
<?php
$url = 'http://example.com/vtigercrm/webservice.php';
$userName='[YOUR CRM USER HERE]';
$userAccessKey='[YOUR CRM USER ACCESS KEY HERE]';
?>
```
###Examples
you can learn more and test this project by visiting the examples provided within the view folder of this project.


