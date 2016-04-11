<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$link = mysql_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());

mysql_select_db('sada') or die('No se pudo seleccionar la base de datos');
