<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class database extends PDO {

private $engine;
private $host;
private $database;
private $dns;
private $user;
private $pass;

public function __construct() {
$this->engine = 'mysql';
$this->host = 'localhost';
$this->database = 'sada';
$this->user = 'root';
$this->pass = '';
$this->dns = $this->engine.':dbname='.$this->database.';host='.$this->host;
parent::__construct( $this->dns, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

}

}
?>