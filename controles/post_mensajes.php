<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
     
    $de =$request->de;
    $mensaje=$request->mensaje;


$fp = fopen("resource.txt", "w+");
fputs($fp, "$de,$mensaje");

fclose($fp);