<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'controles/funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ((isset($_POST['mail'])) and ( isset($_POST['password']))
            and ( $_POST['password'] != '') and ( $_POST['mail'] != '')) {
        $db = new MySQL();
        $password=md5($_POST['password']);
        $sql = "Select * from usuario  where mail='" . $_POST['mail'] . "' and clave='".md5($_POST['password'])."'";
        $seleccion = $db->consulta($sql);

        if ($db->num_rows($seleccion) > 0) {
            $seleccion = $db->consulta($sql);
            while ($resultados = $db->fetch_array($seleccion)) {
                $registro = $resultados['nombre_usuario'];
//                $registro = htmlentities($registro);
                
                $_SESSION['Nombre'] = $registro;
                $_SESSION['mail']=$resultados['mail'];
                $_SESSION['perfil'] = $resultados['id_perfil'];
                $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
                $_SESSION['SKey'] = uniqid(mt_rand(), true);
                    $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
                 $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
//                $_SESSION['IPaddress'] = ExtractUserIpAddress();
                $_SESSION['LastActivity'] = $_SERVER['REQUEST_TIME'];
                header('Location: index.php');
            }
        } else {
            logOut();
            header('Location: ingresar.php');
        }
    } else {
        
    }
}
  
  