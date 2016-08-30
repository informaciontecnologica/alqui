<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once 'config_inc.php';
 Class propietario{
//                private $idpropiedad; //int(11)
//                private $FPublicacion; //varchar(100)
               
                private $db;

    public function __construct(){
                    $this->db = new database();
                }

    function __destruct() {
        unset($this);
    }

          public function Get_propietario(){
          
          $sql = "SELECT * from personas p left join `personas usuario` pu on p.idpersonas=pu.idpersonas
left join usuario u on pu.idusuario=u.id_usuario where id_perfil=5";
          $result = $this->db->prepare($sql);
          $result->execute(); 
          $count = $result->rowCount();
          if($count!= 0 ) {
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                       $DataEvents[] = array(
                          'idpersonas' => $row['idpersonas'],
                           'nombre'=> $row['nombre'],
                           'apellido'=> $row['apellido'], 
                           'direccion'=> $row['direccion'], 
                           'telefono'=> $row['telefono'],
                           'documento'=> $row['documento']
                           
                  );

              }
              $pa=array("propietarios"=>$DataEvents);
              
              return json_encode($pa);
           }
           else {
              return 0;
           }
      }

}
?>