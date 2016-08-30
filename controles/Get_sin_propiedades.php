<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once 'clase_sin_propiedades.php';
   $postdata = file_get_contents("php://input");
   $request = json_decode($postdata);
   
    $Events = new sinPropiedades();
    $data = $Events->Get_sin_Propiedades();
            
    echo $data;
