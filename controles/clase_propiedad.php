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
          // realia la nueva consulta
         $sql = "SELECT p.idpropiedad as id ,pa.*, a.* ,p.* FROM `propiedades` p left join `propiedades alquileres` pa on p.idpropiedad=pa.idpropiedad left join alquileres a on pa.idalquileres=a.idalquiler order by id";
          $result = $this->db->prepare($sql);
          $result->execute(); 
          $count = $result->rowCount();
          if($count!= 0 ) {
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                       $DataEvents[] = array(
                          'idpropiedad' => $row['id'],
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
                           'idalquiler' => $row['idalquiler'],
                           'monto' => $row['monto'],
                           'fecha_Activa' => $row['fecha_Activa'],
                           'descripcion' => $row['descripcion'],
                           'estado' => $row['estado'],
                           'idAlquileres' => $row['idalquileres']
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