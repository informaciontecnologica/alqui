<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once 'config_inc.php';
 Class Propiedad_alquileres {
               private $db;

    public function __construct(){
                    $this->db = new database();
                }

    function __destruct() {
        unset($this);
    }

          public function Get_Propiedad_alquileres(){
          $sql = "Select * from `propiedades alquileres`";
          $result = $this->db->prepare($sql);
          $result->execute(); 
          $count = $result->rowCount();
          if($count!= 0 ) {
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                       $DataEvents[] = array(
                          'idpropiedad' => $row['idpropiedad'],
                          'idAlquileres' => $row['idAlquileres']
                  );

              }
              $pa=array("Propiedad_alquileres"=>$DataEvents);
              
              return json_encode($pa);
           }
           else {
              return 0;
           }
      }

}
?>