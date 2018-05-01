<?php namespace VtApiClasses\Operations;
use VtApiClasses\Webservices\crm_webservice as crm_webservice;
class crm_crudoperation    // Class Start
{

  // variable declaration
  protected $_url='';
  protected $_sessionID='';

  //constructor to set variable value
  public function __construct($endpointUrl,$sessionid){

    $this->_url=$endpointUrl;
    //echo " URL : ".$this->_url."<br />";
    $this->_sessionID=$sessionid;
    //echo " Session : ".$this->_sessionID."<br />";exit;
  }

  // Using this function we are updating the crm values
  // performing two operations : query and update
  // operation query : fetch the records from crm DB
  // operation update : give the field and value to update in crm DB
  public function crm_update($query,$updated_value){  // update Function implementation

      $returndata="";
      $queryParam = urldecode($query);
      $param=array("operation" => "query", "sessionName" => $this->_sessionID, 'query' => $queryParam);
      $getUserDetail=crm_webservice::curl_execution($this->_url,$param);  // call the static function from another class
      //print_r($getUserDetail);
      if (!empty($getUserDetail['result'])) {
        // records got from query operation
        foreach($getUserDetail['result'] as $key => $retrievedObjects);

        // include the fields and values into the records variable to update
        foreach($updated_value as $key => $value){
          $retrievedObjects[$key] =$value;
        }
        //print_r($retrievedObjects);
        $returndata=$retrievedObjects;
        // encode the array values
        $objectJson=json_encode($retrievedObjects);
        $param=array("operation" => "update", "sessionName" => $this->_sessionID, 'element' => $objectJson);
        $UpdatedDetail=crm_webservice::curl_execution($this->_url,$param,"POST");  // call the static function from another class

        if (!empty($getUserDetail['result'])) {
              $returndata=$UpdatedDetail;
        }else{
          $returndata="Error" ;
        }

      }else{
        $returndata="NoResult" ;
      }

      return $returndata;

  } // update Function implementation End
  // Using this function we are quering the crm values
  // performing one operations : query
  // operation query : fetch the records from crm DB
  public function crm_query($query){  // update Function implementation

      $returndata="";
      $queryParam = urldecode($query);
      $param=array("operation" => "query", "sessionName" => $this->_sessionID, 'query' => $queryParam);
      $getUserDetail=crm_webservice::curl_execution($this->_url,$param);  // call the static function from another class
      //print_r($getUserDetail);
      if (!empty($getUserDetail['result'])) {
        // records got from query operation
        return $returndata=$getUserDetail;

      }else{
        return $returndata="NoResult" ;
      }

  } // query Function implementation End

  // Using this function we are creating new entry in crm
  // performing two operations : query and create
  // operation query : to idendify the user exist in crm
  // operation create : new entry in crm DB
  public function crm_create($createData){  // create Function implementation

      $returndata="";
      /*$firstname=$createData['firstname'];
      $lastname=$createData['lastname'];
      $email=$createData['email'];

      $query = "SELECT * FROM Leads where firstname='$firstname' and lastname='$lastname' and email='$email';";
      $queryParam = urldecode($query);
      $param=array("operation" => "query", "sessionName" => $this->_sessionID, 'query' => $queryParam);
      $getUserDetail = crm_webservice::curl_execution($this->_url,$param);

      if (!empty($getUserDetail['result'])) {

          $returndata=" Lead already exist !!!";
      }else{ */
          $createDataJson = json_encode($createData);
          $param=array("operation" => "create", "sessionName" => $this->_sessionID, "element" => $createDataJson, "elementType" => "Leads");
          $dataDetails = crm_webservice::curl_execution($this->_url,$param,"POST");
          $returndata=$dataDetails;

      //}
      return $returndata;

  } // create Function implementation End

  // Using this function we are deleting entry in crm
  // performing two operations : query and delete
  // operation query : to idendify the user exist in crm and get the user id
  // operation delete : delete entry in crm DB
  public function crm_delete($dataArr){ // Delete Function implementation

      $returndata="";
      $whereCond="where";
      foreach($dataArr as $key=>$value){
          $whereCond.=" ".$key."="."'$value'"." and";
      }
      $whereCond=substr($whereCond,0,-3);

      $query = "SELECT * FROM Leads $whereCond;";
      $queryParam = urldecode($query);
      $param=array("operation" => "query", "sessionName" => $this->_sessionID, 'query' => $queryParam);
      $getUserDetail = crm_webservice::curl_execution($this->_url,$param);

      if (!empty($getUserDetail['result'])) {

          foreach($getUserDetail['result'] as $key => $value){
              $id=$value['id'];
              $param=array("operation" => "delete", "sessionName" => $this->_sessionID, "id" => $id);
              $deleteData = crm_webservice::curl_execution($this->_url,$param,"POST");

              $deleteStatus=$deleteData['result']['status'];
              if($deleteStatus == "successful"){
                  $returndata=" Deleted operation is successful !!";
              }else{
                  $returndata=" Delete operation is not successful !!";
              }

          }


      }else{
          $returndata= " No Result !!!";
      }
      return $returndata;

  } // Delete Function implementation End

  public function crm_getfieldname($elementType){  // describe Function implementation

    $param=array("operation" => "describe", "sessionName" => $this->_sessionID, 'elementType' => $elementType);
    $getfieldDetail = crm_webservice::curl_execution($this->_url,$param);

    return $getfieldDetail;

  } // describe Function implementation End



}  // Class End
 ?>
