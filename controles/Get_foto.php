<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

  require_once 'clase_foto.php';
  $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
     
    $idpropiedad =$request->idpropiedad;//$_POST['pais'];
    $fo = new foto();
    $data = $fo->Get_foto($idpropiedad);
     echo $data;
?>