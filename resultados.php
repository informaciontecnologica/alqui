<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'controles/funciones.php';
$filters = array
  (
  "Habitaciones" => array
    (
   "filter"=>FILTER_VALIDATE_INT,
      
    ),
    "bano" => array
    (
   "filter"=>FILTER_VALIDATE_INT,
      
    ),
    
    "min" => array
    (
    "filter"=>FILTER_VALIDATE_INT,
    "options"=>array
      (
      "min_range"=>0,
      "max_range"=>120
      )
    ),
  "max" => array
    (
    "filter"=>FILTER_VALIDATE_INT,
    "options"=>array
      (
      "min_range"=>0,
      "max_range"=>120
      )
    ),
  "tipocasa"=> array
    (
    "filter"=>FILTER_CALLBACK,
    "flags"=>FILTER_FORCE_ARRAY,
    "options"=>"ucwords"
    ),
    "Barrio"=>FILTER_SANITIZE_STRING,
   
  );
$matriz=filter_input_array(INPUT_POST, $filters);
//conexxion base de datos y busqueda
$db = new MySQL();
$seleccion=$db->consulta('select * from propiedades where id_barrios='.$matriz["Barrio"].'');
if ($db->num_rows($seleccion)>0){
while($resultados=$db->fetch_array($seleccion)){
    
echo $resultados['nombre'];

}
}
echo "<div style=\"hidth:800px;\">";


echo $resultados['Barrio'];

echo "</div>";