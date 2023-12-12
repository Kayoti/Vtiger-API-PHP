<?php

namespace VtApiServices\Services\WebServices;


use VtApiClasses\Controllers\WebServices\CrmWebService;


class VtigerService
{
    private $CrmService;

    public function __construct(CrmWebService $CrmService)
    {
        $this->CrmService = $CrmService;
    }

    public function GetToken()
    {
        return $this->CrmService->Get_Token();
    }

    public function GetAccess()
    {
        return $this->CrmService->Get_Access();
    }

    public function ExecuteCurl($Url, $Params, $RequestType)
    {
        return CrmWebService::Curl_Execution($Url, $Params, $RequestType);
    }
}
