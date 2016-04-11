<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

  require_once 'clase_borrarfoto.php';
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    $idfoto =$request->idfoto;//$_POST['pais'];
    $fo = new Borrarfoto();
    $res=$fo->Delete_foto($idfoto);
  
?>