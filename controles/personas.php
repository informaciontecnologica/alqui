<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'funciones.php';
$db= new MySQL;

 $seleccion = $db->consulta("select * from personas  ");
$cont=0;
while ($rs = mysql_fetch_array($seleccion)) {

    $cont++;
    $records[] = array(
        "id"=>$cont,
        "idpersonas"=>$rs["idpersonas"], 
        "documento"=>$rs["documento"], 
        "nombre"=> $rs["nombre"],
        "apellido"=> $rs["apellido"],
        "nacimiento"=>$rs['nacimiento'],
         "mail"=>$rs['mail'],
        "telefono"=>$rs["telefono"],
        "direccion"=>$rs["direccion"],
        "idbarrio"=>$rs["idbarrio"],
        "idciudad"=>$rs["idciudad"],
        "idmunicipio"=>$rs["idmunicipio"],
        "iddepartamento"=>$rs["iddepartamento"],
        "idprovincia"=>$rs["idprovincia"],
        "idpais"=>$rs["idpais"]
        
        
        );
}
$clientes=array("personas"=>$records);
//Creamos el JSON
$json_string = json_encode($clientes);
echo $json_string;


