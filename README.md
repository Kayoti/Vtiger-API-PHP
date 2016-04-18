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
* Linux
$ `sudo apt-get install wget`,
$ `sudo yum install wget`,
$ `sudo yum install php-pear`,
* to verify your installation run
$ `pear info PEAR`
* Install HTTP_Request2 package
$ `pear install HTTP_Request2-(Version Number Here)``
* using pyrus
$ `php pyrus.phar install pear/HTTP_Request2-(Version Number Here)``
* Finally make sure your project has access to the package
