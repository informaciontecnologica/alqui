<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once 'config_inc.php';

Class barrio{

                private $idbarrio; //int(11)
                private $barrio; //varchar(100)
                private $db;

    public function __construct(){
        $this->db = new database();
    }

    function __destruct() {
        unset($this);
    }

          public function Get_barrio($pais,$provincia,$departamento,$municipio,$ciudad){
          $sql = "Select idbarrio,barrio from barrio "
                  . "where idpais = $pais and idprovincia=$provincia and "
                  . "iddepartamento=$departamento and idmunicipio=$municipio "
                  . " and idciudad=$ciudad ";
          $result = $this->db->prepare($sql);
          $result->execute(); 
          $count = $result->rowCount();
          if($count!= 0 ) {
               while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $DataEvents[] = array(
                          'idbarrio' => $row['idbarrio'],
                          'barrio' => $row['barrio']
                     );
              }
              
               $pro=array("barrio"=>$DataEvents);
              return json_encode($pro);
          }
           else {
              return 0;
           }

     }
}
?>