<?php
include 'coneccion/conecionMYSQL.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['precio'])) {
$precio = strip_tags($_POST['precio']);
$idlocador=strip_tags($_POST['precio']);
$idlocatario=strip_tags($_POST['precio']);
$fecha=strip_tags($_POST['fecha']);
//realizar el insert con la nueva tabla
$query=mysql_query("INSERT INTO `propiedades alquileres` (idpropiedad,idalquileres,idpersona,idpersona) values (idpersona='$idlocatario', idpropíedad=idlocador )");

}
