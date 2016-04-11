<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once 'config_inc.php';

Class departamento {

                private $iddepartamento; //int(11)
                private $departamento; //varchar(100)
              
                private $db;

    public function __construct(){
        $this->db = new database();
    }

    function __destruct() {
        unset($this);
    }

          public function Get_departamento($pais,$provincia){
          $sql = "Select iddepartamento,departamento from departamento "
                  . "where idpais = '$pais' and idprovincia='$provincia'";
          $result = $this->db->prepare($sql);
          $result->execute(); 
          $count = $result->rowCount();
          if($count!= 0 ) {
               while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $DataEvents[] = array(
                          'iddepartamento' => $row['iddepartamento'],
                          'departamento' => $row['departamento']
                     );
              }
              $pro=array("departamento"=>$DataEvents);
              return json_encode($pro);
          }
           else {
              return 0;
           }

     }
}
?>