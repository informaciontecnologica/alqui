<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!isset($_SESSION['Nombre'])) {
    header('Location: index.php');
} else {
    $now = time(); // Checking the time now when home page starts.
    $estado = "salir";
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "tu sesion a expirado! <a href='index.php'>Login here</a>";
    } else { //Starting this else one [else1]}
    }
}