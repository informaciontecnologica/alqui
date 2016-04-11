<?php
/**
* MySQL Database Connection Class
* @access public
* @package SPLIB
*/
class MySQL {
/**
* MySQL server hostname
* @access private
* @var string
*/
var $host;
/**
* MySQL username
* @access private
* @var string
*/
var $dbUser;
/**
* MySQL user's password
* @access private
* @var string
*/
var $dbPass;
/**
* Name of database to use
* @access private
* @var string
*/
var $dbName;
/**
* MySQL Resource link identifier stored here
* @access private
* @var string
*/
var $dbConn;
/**
* Stores error messages for connection errors
* @access private
* @var string
*/
var $connectError;
/**
* MySQL constructor
* @param string host (MySQL server hostname)
* @param string dbUser (MySQL User Name)
* @param string dbPass (MySQL User Password)
* @param string dbName (Database to select)
* @access public
*/
function MySQL($host, $dbUser, $dbPass, $dbName)
{
$this->host = $host;
$this->dbUser = $dbUser;
$this->dbPass = $dbPass;
$this->dbName = $dbName;
$this->connectToDb();
}
/**
* Establishes connection to MySQL and selects a database
* @return void
* @access private
*/
function connectToDb()
{
// Make connection to MySQL server
if (!$this->dbConn = @mysql_connect($this->host,
$this->dbUser, $this->dbPass)) {
trigger_error('Could not connect to server');
$this->connectError = true;
// Select database
} else if (!@mysql_select_db($this->dbName,$this->dbConn)) {
trigger_error('Could not select database');
$this->connectError = true;
}
}
/**
* Checks for MySQL errors
* @return boolean
* @access public
*/
function isError()
{
if ($this->connectError) {
return true;
}
$error = mysql_error($this->dbConn);
if (empty($error)) {
return false;
} else {
return true;
}
}

}