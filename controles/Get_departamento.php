<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

  require_once 'clase_departamento.php';
  $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
     
    $pais =$request->pais;//$_POST['pais'];
    $provincia=$request->provincia;//$_POST['pais']; $_POST['provincia'];
    $dpto = new departamento();
    $data = $dpto->Get_departamento($pais,$provincia);
     echo $data;
?>