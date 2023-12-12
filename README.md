<a href="https://wiki.vtiger.com/index.php/Webservices_tutorials" rel="nofollow"><img src="https://camo.githubusercontent.com/4fd72570634024a3402a0957991e1c51bc390484/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f7654696765722d352e78253230253743253230362e78253230253743253230372e782d677265656e2e7376673f6d61784167653d33363030" alt="vTiger versions" data-canonical-src="https://img.shields.io/badge/vTiger-5.x%20%7C%206.x%20%7C%207.x-green.svg?maxAge=3600" style="max-width:100%;"></a>
<a href="https://github.com/Kayoti/Vtiger-API-PHP/search?l=php"><img src="https://camo.githubusercontent.com/3d8c1d5ee8f63ce8431af1865f4ad465d53e2872/68747470733a2f2f696d672e736869656c64732e696f2f6769746875622f6c616e6775616765732f746f702f73616c61726f732f76747773636c69622d7068702e7376673f6d61784167653d33363030" alt="GitHub top language" data-canonical-src="https://img.shields.io/github/languages/top/salaros/vtwsclib-php.svg?maxAge=3600" style="max-width:100%;"></a>
<a href="https://github.com/Kayoti/Vtiger-API-PHP/blob/master/LICENSE.md"><img src="https://img.shields.io/badge/License-GNU-blue" alt="License-GNU" data-canonical-src="https://img.shields.io/badge/License-GNU-blue?maxAge=3600" style="max-width:100%;"></a>
### Vtiger REST API PHP Wrapper (webservices) [PSR-4 🆗 ✅]
### 📂Structure
```
VtigerAPI-PHP/
├── Controller/
│  └──VtApiClasses/
│     └──Operations/
│        ├──CrmCrudOperations.php
│     └──WebServices/
│        ├──CrmWebService.php
├── Service/
│     └──VtApiServices/
│        └──WebServices/
│           VtigerService.php
├── Model/
│   ├──Const.php
├── View/
│  ├──CreateSingleRecord.php
│  ├──CreateMultiRecord.php
│  ├──Read.php
│  ├──UpdateSingleRecord.php
│  ├──UpdateMultiRecord.php
│  ├──DeleteSingleRecord.php
│  ├──DeleteMultiRecord.php
│  ├──ModuleFieldNames.php
├── .gitignore.swp
├── .README.md
├── .LICENSE.md


```		
### 💾Installation
To run this project make sure that curl is installed and active in your php.ini
You will Also need Composer to manage classes

### ▶️Usage
in the main dir of your project open composer and execute ```composer self-update```

followed by ```composer dump-autoload -o ```

To use this project you must add/modify your php environment variables to match your CRM information read more about php environment variables and how to set them up for security purposes
```php
<?php
$EndPointUrl = getenv('CRMURL'); // [YOUR CRM URL ENVIRONMENT VARIABLE HERE] YOUR URL MUST END WITH /webservice.php eg(http://example.com/vtigercrm/webservice.php)
$UserName=getenv('CRMUserName'); // [YOUR CRM USER ENVIRONMENT VARIABLE HERE]
$UserAccessKey=getenv('CRMAPIKEY'); // [YOUR CRM USER ACCESS KEY ENVIRONMENT VARIABLE HERE]
?>
```
### 📜Examples
```php
available in the view folder of this project.
```
* 💪PRO tip -> to debug your code use the following code to toggle error messages display On/OFF
```php
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
```
## License

Vtiger REST API PHP Wrapper (webservices) distributed under the
[**GNU**](https://github.com/Kayoti/Vtiger-API-PHP/blob/master/LICENSE.md)
