<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'controles/funciones.php';

function FormInputSelectBarrios() {
    $db = new MySQL();
    $seleccion = $db->consulta('select b.* from barrios b left join barrio_ciudad bc on bc.Id_barrio =b.id_barrios where bc.id_ciudad=1');
    if ($db->num_rows($seleccion) > 0) {
        $resultados = array();
        while ($row = mysql_fetch_array($seleccion)) {
            $resultados[] = array($row['id_barrios'] => $row['nombre']);
        }
    }

    echo "<select name=\"tipocasa\">";
    foreach ($resultados as $fila) {
        foreach ($fila as $key => $tipo) {
            echo "<option value=\"$key\">$tipo</option>";
        }
    }
    echo"             </select>";
}

ListaBarrios();
echo'';
//$ma=ListaBarrios();
// echo "<select name=\"tipocasa\">";
//  foreach ($ma as $fila) { 
//     foreach ($fila as $key=>$tipo) {  
//         echo "<option value=\"$key\">$tipo</option>" ;
//  }}
//  echo"             </select>";
?>