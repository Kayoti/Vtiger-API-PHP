### Vtiger Webservices API PHP Wrapper using Pear HTTP_Request2
###Structure
```
Vtiger-Webservices-HTTP_Request2/
├── controller/
│  └──classes/
│    ├──crm_webservice.php
│  ├──auth.php
├── model/
│  config.php
├── View/
│  ├──index.php
├── .gitignore.swp
├── .README.md
├── .LICENSE.md


```		
###Installation
To run this project you will need to install pear first
* Make sure you have proper permissions <br />
$ `sudo su`
* Make sure you have wget, if not install wget<br />
$ `apt-get install wget` OR <br />
$ `yum install wget` <br />
* Install PEAR<br />
$ `yum install php-pear` OR <br />
$ `wget http://pear.php.net/go-pear.phar` THEN <br> $` php go-pear.phar`
* To verify your installation run <br />
$ `pear info PEAR`
* Install HTTP_Request2 Package <br />
$ `pear install HTTP_Request2-(Version Number Here)`
* Using PYRUS <br />
$ `php pyrus.phar install pear/HTTP_Request2-(Version Number Here)`
* When making HTTP_Request2 calls make sure your project has access to the installed HTTP_Request2 package
* Finally PRO tip -> to debug your code use the following code to toggle error messages display On/OFF
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
