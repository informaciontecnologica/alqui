<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once 'config_inc.php';

Class ciudad{

                private $idciudad; //int(11)
                private $ciudad; //varchar(100)
                private $db;

    public function __construct(){
        $this->db = new database();
    }

    function __destruct() {
        unset($this);
    }

          public function Get_ciudad($pais,$provincia,$departamento,$municipio){
          $sql = "Select idciudad,ciudad from ciudad "
                  . "where idpais = $pais and idprovincia=$provincia and idmunicipio=$municipio "
                  . "and iddepartamento=$departamento";
          $result = $this->db->prepare($sql);
          $result->execute(); 
          $count = $result->rowCount();
          if($count!= 0 ) {
               while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $DataEvents[] = array(
                          'idciudad' => $row['idciudad'],
                          'ciudad' => $row['ciudad']
                     );
              }
               $pro=array("ciudad"=>$DataEvents);
              return json_encode($pro);
          }
           else {
              return 0;
           }

     }
}
?>