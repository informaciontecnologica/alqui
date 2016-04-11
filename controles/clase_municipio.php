<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once 'config_inc.php';

Class municipio {

               
                private $idmunicipio; //varchar(100)
                private $municipio; //int(11)
                private $db;

    public function __construct(){
        $this->db = new database();
    }

    function __destruct() {
        unset($this);
    }

          public function Get_municipio($pais,$provincia,$departamento){
          $sql = "Select idmunicipio,municipio from municipio where idpais = '$pais' and idprovincia='$provincia' and iddepartamento='$departamento'  ";
          $result = $this->db->prepare($sql);
          $result->execute(); 
          $count = $result->rowCount();
          if($count!= 0 ) {
               while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $DataEvents[] = array(
                          'idmunicipio' => $row['idmunicipio'],
                          'municipio' => $row['municipio']
                     );
              }
              $pro=array("municipio"=>$DataEvents);
              return json_encode($pro);
          }
           else {
              return 0;
           }

     }
}
?>