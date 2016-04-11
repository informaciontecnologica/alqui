<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


   require_once 'clase_Propiedad_alquileres.php';
    $Events = new Propiedad_alquileres();
    $data = $Events->Get_Propiedad_alquileres();
     echo $data;
