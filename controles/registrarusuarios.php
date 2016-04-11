<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include 'funciones.php';

 $data = json_decode(file_get_contents('php://input'), true);
// $u=$data["usuario"];
// $p='pp';//$data["password"];
//  $postdata = file_get_contents("php://input");
    $request = json_decode($data);
   $usuario=$request->usuario;
    $password =$request->password;




//$usuario=$_POST['usuario'];
//$password=$_POST['password'];
//



