<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once 'config_inc.php';
 Class pais {
                private $id; //int(11)
                private $pais; //varchar(100)
               
                private $db;

    public function __construct(){
                    $this->db = new database();
                }

    function __destruct() {
        unset($this);
    }

          public function Get_all_pais(){
          $sql = "Select * from pais";
          $result = $this->db->prepare($sql);
          $result->execute(); 
          $count = $result->rowCount();
          if($count!= 0 ) {
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                       $DataEvents[] = array(
                          'idpais' => $row['idpais'],
                          'pais' => $row['pais']
                  );

              }
              $pa=array("pais"=>$DataEvents);
              
              return json_encode($pa);
           }
           else {
              return 0;
           }
      }

}
?>