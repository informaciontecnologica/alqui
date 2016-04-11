<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'clase_ciudad.php';
$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
     
    $pais =$request->pais;//$_POST['pais'];
    $provincia=$request->provincia;
    $departamento=$request->departamento;
    $municipio=$request->municipio;
    $ciudad = new ciudad();
    $data = $ciudad->Get_ciudad($pais,$provincia,$departamento,$municipio);
     echo $data;
?>