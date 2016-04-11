<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


   require_once 'clase_tipo_propiedad.php';
    $Events = new Tipo_propiedad();
    $data = $Events->Get_tipo_propiedad();
     echo $data;
