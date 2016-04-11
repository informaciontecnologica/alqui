<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once 'config_inc.php';

Class provincia {

                private $idprovincia; //int(11)
                private $provincia; //varchar(100)
                private $db;

    public function __construct(){
        $this->db = new database();
    }

    function __destruct() {
        unset($this);
    }

          public function Get_provincia($pais){
          $sql = "Select idprovincia,provincia from provincia where idpais = '$pais'";
          $result = $this->db->prepare($sql);
          $result->execute(); 
          $count = $result->rowCount();
          if($count!= 0 ) {
               while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $DataEvents[] = array(
                          'idprovincia' => $row['idprovincia'],
                          'provincia' => $row['provincia']
                     );
              }
              $pro=array("provincia"=>$DataEvents);
              return json_encode($pro);
          }
           else {
              return 0;
           }

     }
}
?>