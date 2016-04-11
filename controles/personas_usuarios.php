<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'funciones.php';

$ne = new MySQL;

$seleccion = $ne->consulta("select * from `usuario` u left join `personas usuario` pu on u.id_usuario = pu.idusuario");
// 
$cont=0;
while ($rs = mysql_fetch_array($seleccion)) {
    if ($ne->getTotalConsultas() > 0) {
 $cont++;


        $records[] = array(
            "id"=>$cont,
            "id_usuario" => $rs["id_usuario"],
            "nombre" => $rs["nombre_usuario"],
            "clave" => $rs["clave"],
            "mail" => $rs["mail"],
            "fecha" => $rs["fecha"],
            "idperfil" => $rs["id_perfil"],
            "idpersonas" => $rs["idpersonas"],
            "idusuario" => $rs["idusuario"]
        );
    }
}
$re = array("personasusuario" => $records);
//Creamos el JSON
$json_string = json_encode($re);
echo $json_string;


