### Vtiger Webservices PHP example using Pear HTTP_Request2
###Structure
```
Vtiger-Webservices-HTTP_Request2/
├── controller/
│  └──classes/
│    ├──crm_webservice.php
│  ├──auth.php
├── model/
├── View/
├── .gitignore.swp
├── .README.md
├── .LICENSE.md


```		
###Installation
To run this project you will need to install pear first
* Make sure you have proper permissions
$ `sudo su`
* Make sure you have wget, if not install wget
$ `apt-get install wget` OR.
$ `yum install wget`.
* Install PEAR
$ `yum install php-pear` OR.
$ `$ wget http://pear.php.net/go-pear.phar` then `$ php go-pear.phar`
* To verify your installation run
$ `pear info PEAR`
* Install HTTP_Request2 Package
$ `pear install HTTP_Request2-(Version Number Here)``
* using pyrus
$ `php pyrus.phar install pear/HTTP_Request2-(Version Number Here)``
* When making HTTP_Request2 calls make sure your project has access to the installed HTTP_Request2 package
* Finally PRO tip -> to debug your code use the following code to toggle error messages display On/OFF
`ini_set('display_errors', 1);`.
`ini_set('display_startup_errors', 1);`.
`error_reporting(E_ALL);`
