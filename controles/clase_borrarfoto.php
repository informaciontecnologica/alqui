<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//
$foto = $_POST['foto'];
$idpropiedad = $_POST['idpropiedad'];
$path = "imagenes/Personal/fotos/propiedad/propiedad$idpropiedad/";
$sql = "delete from fotopropiedad where foto ='$foto' and idpropiedad='$idpropiedad'";
//echo $sql."\n";
//echo $path.$foto."\n";

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db('sada');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not delete data: ' . mysql_error());
} else {
$files='../'.$path.$foto;
echo $files;
       if(is_file($files)) {
           echo "verdad/n";
           try {
           unlink($files);                     
          } catch (Exception $ex) {
            echo 'esepcion :'.$e->getMessage(),"\n";
           }
       }else {
           echo "no";
       }
}    
//echo "Deleted data successfully\n";
mysql_close($conn);
//      






