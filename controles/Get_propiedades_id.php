<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


   require_once 'clase_propiedad_id.php';
   $postdata = file_get_contents("php://input");
   $request = json_decode($postdata);
   $id =$request->idpropiedades;
    $Events = new propiedad();
    $data = $Events->Get_propiedad_id($id);
            
    echo $data;
