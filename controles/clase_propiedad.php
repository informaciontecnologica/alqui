<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once 'config_inc.php';
 Class propiedad {
//                private $idpropiedad; //int(11)
//                private $FPublicacion; //varchar(100)
               
                private $db;

    public function __construct(){
                    $this->db = new database();
                }

    function __destruct() {
        unset($this);
    }

          public function Get_propiedad(){
          
          $sql = "SELECT p.* ,idAlquileres FROM propiedades p left join  `propiedades alquileres`  pa on  p.idpropiedad=pa.idpropiedad";
          $result = $this->db->prepare($sql);
          $result->execute(); 
          $count = $result->rowCount();
          if($count!= 0 ) {
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                       $DataEvents[] = array(
                          'idpropiedad' => $row['idpropiedad'],
                           'FPublicacion'=> $row['FPublicacion'],
                           'superficie'=> $row['superficie'], 
                           'direccion'=> $row['direccion'], 
                           'valor'=> $row['valor'],
                           'Descripcion'=> $row['Descripcion'],
                           'banos'=> $row['banos'],
                           'habitaciones'=> $row['habitaciones'],
                           'pileta'=> $row['pileta'],
                           'otros'=> $row['otros'], 
                           'tipopropiedad_id_tipoPropiedad'=> $row['tipopropiedad_id_tipoPropiedad'],
                           'idbarrio'=> $row['idbarrio'],
                           'idciudad'=> $row['idciudad'], 
                           'idmunicipio'=> $row['idmunicipio'], 
                           'iddepartamento'=> $row['iddepartamento'],
                           'idprovincia'=> $row['idprovincia'],
                           'idpais' => $row['idpais'],
                           'localizacion' => $row['localizacion'],
                           'idAlquileres' => $row['idAlquileres']
                  );

              }
              $pa=array("propiedad"=>$DataEvents);
              
              return json_encode($pa);
           }
           else {
              return 0;
           }
      }

}
?>