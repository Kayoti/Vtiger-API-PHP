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
* make sure you have proper permissions
$ `sudo su`
* make sure you have wget if not install wget
$ `apt-get install wget`, OR
$ `yum install wget`,
* Install PEAR
$ `yum install php-pear`, OR
$ `$ wget http://pear.php.net/go-pear.phar` then `$ php go-pear.phar`
* to verify your installation run
$ `pear info PEAR`
* Install HTTP_Request2 package
$ `pear install HTTP_Request2-(Version Number Here)``
* using pyrus
$ `php pyrus.phar install pear/HTTP_Request2-(Version Number Here)``
* Finally when making HTTP_Request2 calls make sure your project has access to the installed HTTP_Request2 package
