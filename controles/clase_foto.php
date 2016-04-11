<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once 'config_inc.php';

Class foto {
        
                private $db;

    public function __construct(){
        $this->db = new database();
    }

    function __destruct() {
        unset($this);
    }

          public function Get_foto($idpropiedad){
          $sql = "Select * from fotopropiedad where idpropiedad = '$idpropiedad'";
          $result = $this->db->prepare($sql);
          $result->execute(); 
          $count = $result->rowCount();
          if($count!= 0 ) {
               while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $DataEvents[] = array(
                          'idpropiedad' => $row['idpropiedad'],
                          'foto' => $row['foto']
                     );
              }
              $pro=array("fotopropiedad"=>$DataEvents);
              return json_encode($pro);
          }
           else {
              return 0;
           }

     }
}
?>