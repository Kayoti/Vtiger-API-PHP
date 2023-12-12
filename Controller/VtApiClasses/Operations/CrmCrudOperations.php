<?php

namespace VtApiClasses\Controllers\Operations;


use VtApiServices\Services\WebServices\VtigerService;

class CrmCrudOperations
{
  protected $_Url = '';
  protected $_SessionID = '';
  protected $VtigerService;

  public function __construct(VtigerService $VtigerService)
  {
    $this->VtigerService = $VtigerService;
    $this->_Url = $this->VtigerService->GetAccess()['result']['crmurl'];
    $this->_SessionID = $this->VtigerService->GetAccess()['result']['sessionName'];
    
  }

  public function Crm_Query($Query_Statement)
  {
    
    $Params = [
      "operation" => "query",
      "sessionName" => $this->_SessionID,
      "query" => $Query_Statement
    ];
    $GetDetails = $this->VtigerService->ExecuteCurl($this->_Url, $Params, "GET");
    return $GetDetails;
    
  }

  public function Crm_Update($Updated_Values)
  {
    $Params = [
      "operation" => "update",
      "sessionName" => $this->_SessionID,
      "element" => json_encode($Updated_Values)    
    ];
    $UpdatedDetails = $this->VtigerService->ExecuteCurl($this->_Url, $Params, "POST");
    return $UpdatedDetails;
  }


  public function Crm_Create($Create_Values, $TargetModule)
  {  
    $Params = [
      "operation" => "create",
      "sessionName" => $this->_SessionID,
      "element" => json_encode($Create_Values),
      "elementType" => $TargetModule
    ];

    $GetDetails = $this->VtigerService->ExecuteCurl($this->_Url, $Params, "POST");
    return $GetDetails;
  }

  public function Crm_Delete($Delete_Values)
  {
    $Params = [
      "operation" => "delete",
      "sessionName" => $this->_SessionID,
      "id" => $Delete_Values  
    ];
    $UpdatedDetails = $this->VtigerService->ExecuteCurl($this->_Url, $Params, "POST");
    return $UpdatedDetails;
  }

  public function Crm_GetFieldName($Query_Statement)
  {
    $UpdatedDetails = $this->VtigerService->ExecuteCurl($this->_Url, $Query_Statement, "POST");
    return $UpdatedDetails;
  }
}
