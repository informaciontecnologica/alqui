<?php
require_once("Rest.inc.php");

class API extends REST {

public $data = "";

const DB_SERVER = "localhost";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB = "sada";

private $db = NULL;
private $mysqli = NULL;
public function __construct(){
parent::__construct(); // Init parent contructor
$this->dbConnect(); // Initiate Database connection
}

/*
* Connect to Database
*/
private function dbConnect(){
$this->mysqli = new mysqli(self::DB_SERVER, self::DB_USER, self::DB_PASSWORD, self::DB);
}

/*
* Dynmically call the method based on the query string
*/
public function processApi(){
$func = strtolower(trim(str_replace("/","",$_REQUEST['x'])));
if((int)method_exists($this,$func) > 0)
$this->$func();
else
$this->response('',404); // If the method not exist with in this class "Page not found".
}

private function login(){
}

private function customers(){

}

private function insertCustomer(){
}

private function updateCustomer(){
}

private function deleteCustomer(){
}

/*
* Encode array into JSON
*/
private function json($data){
if(is_array($data)){
return json_encode($data);
}
}
}

// Initiiate Library

$api = new API;
$api->processApi();
?>