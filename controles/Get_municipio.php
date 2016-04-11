<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

  require_once 'clase_municipio.php';
  $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
     
    $pais =$request->pais;
    $provincia=$request->provincia;
    $departamento=$request->departamento;
    $dpto = new municipio();
 
    $data = $dpto->Get_municipio($pais,$provincia,$departamento);
     echo $data;
?>
