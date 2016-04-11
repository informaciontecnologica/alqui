<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once 'config_inc.php';
 Class Tipo_propiedad {
//                private $id; //int(11)
//                private $pais; //varchar(100)
               
                private $db;

    public function __construct(){
                    $this->db = new database();
                }

    function __destruct() {
        unset($this);
    }

          public function Get_Tipo_propiedad(){
          $sql = "Select * from tipopropiedad";
          $result = $this->db->prepare($sql);
          $result->execute(); 
          $count = $result->rowCount();
          if($count!= 0 ) {
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                       $DataEvents[] = array(
                          'idtipopropiedad' => $row['idtipoPropiedad'],
                          'Tipo' => $row['Tipo']
                  );

              }
              $pa=array("Tipo_propiedad"=>$DataEvents);
              
              return json_encode($pa);
           }
           else {
              return 0;
           }
      }

}
?>