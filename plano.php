<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'controles/funciones.php';
  $tabla=$_POST['opcion'];
  
  $id=$_POST['id'];
        $db = new MySQL();
        $seleccion = $db->consulta("select * from $tabla where provincia_id_provincia=$provincia");
    if ($db->num_rows($seleccion) > 0) {
        $resultados = array();
        $campo1='id_'.$tabla;
        $campo2=$tabla;
        while ($row = mysql_fetch_array($seleccion)) {
            $resultados[] = array($row[$campo1] => $row[$campo2]);
        }
    }
     
    
    foreach ($resultados as $fila) {
        foreach ($fila as $key => $tipo) {
            $options= "<option value=\"$key\">$tipo</option>";
        }
    }
    echo $options;             
        
    

