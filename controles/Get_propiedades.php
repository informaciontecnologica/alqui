<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


   require_once 'clase_propiedad.php';
    $Events = new propiedad();
    $data = $Events->Get_propiedad();
     echo $data;
