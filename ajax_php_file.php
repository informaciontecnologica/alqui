<?php
function VerificarFile(){
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
    ) && ($_FILES["file"]["size"] < 300000)//Approx. 100kb files can be uploaded.
    && in_array($file_extension, $validextensions)) {
    if ($_FILES["file"]["error"]== 0){
        return true;
    } else 
    {
        return false;
    }
}
}
function subirfile($path, $id, $paraquien){
if (VerificarFile()){
// envia el archivo
    switch ($paraquien) {
     case 'avatar':
     $temporary = explode(".", $_FILES["file"]["name"]);
     $path = 'imagenes/Personal/fotos/avatar/';
     $archivo = "avatar" . $id . "." . $temporary[1];
     if (!is_dir($path)){
        if(!mkdir($path, 0777, true)) {
        die('Fallo al crear las carpetas...');
        }

     }
     break;
     case 'propiedad':
     $path = 'imagenes/Personal/fotos/propiedad';
     $archivo = $_FILES["file"]["name"];
     //si la capeta propiedad existe o sino crear
     if (!is_dir($path)){     
         if(!mkdir($path, 0777, true)) {
            die('Fallo al crear las carpetas...');
            } 
        }
         // crear o no Carpeta de la propiedad en cuestion
         $path2=$path."/propiedad$id/";
         if (!is_dir($path2)){
            if(!mkdir($path2, 0777, true)) {
               die('Fallo al crear las carpetas...');
                }
                
         }
      $path=$path2;
    break;

    }

 // ver si existe el archvio que tiene que tener como nombre simpre el nombre
echo $_FILES['file']['tmp_name'];
$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable

$targetPath = "$path".$archivo; // Target path where file is to be stored
move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
} 
else {

echo "<span id='invalid'>***Invalid file Size or Type***<span>";
}
}


if (isset($_FILES["file"]["type"])) {
if (VerificarFile()){
$archivo=$_FILES["file"]["name"];
$temporary = explode(".", $_FILES["file"]["name"]);
$Tipoarchivo = end($temporary);
$path='imagenes/Personal/fotos/'; 
     if (isset($_POST['idpropiedad'])) {
            $id= $_POST['idpropiedad'];
            $paraquien='propiedad';
            basefotos($id, $paraquien, $Tipoarchivo,$archivo);
            subirfile($path, $id, $paraquien);
    }elseif (isset($_POST['idpersona'])) {
        $id=$_POST['idpersona'];
        $paraquien='avatar';
        
        basefotos($id, $paraquien, $Tipoarchivo,$archivo);
        subirfile($path, $id, $paraquien);
      }

    }
}
    function basefotos($id, $paraquien,$Tipoarchivo,$archivo){
    // insertar o actualizar la base de datos de fotospersonas o fotospropiedad
    $conc=mysql_connect("localhost", "root", "");
    switch ($paraquien){
        case 'avatar':
        $consulta="select * from fotopersona where idpersonas=$id";
    break;
        case 'propiedad':
        $consulta="select * from fotopropiedad where foto='$archivo' and idpropiedad=$id";
    break;
    }
    
    mysql_select_db('sada', $conc);
    $resultado = mysql_query($consulta,$conc);
    $filas=mysql_num_rows($resultado);
    if (mysql_num_rows($resultado)==0) {
        // insertar registro nuevo
         $existe=2;
     }
     
     if ((mysql_num_rows($resultado)>0) ) {
         //Actualizar registro 
         $existe=1;
     }
    switch ($existe){ 
        
        case 1:
            switch ($paraquien){
            case 'avatar':
            $ss= "update fotopersona set foto='avatar$id.$Tipoarchivo' where idpersonas=$id";
   
            break;
            case 'propiedad':
                $ss= "update fotopropiedad set foto='$archivo' where idpersonas=$id";
                break;
            }
            break;
        case 2:
            switch ($paraquien){
            case 'avatar':
            $ss = "insert into fotopersona (idpersonas,foto) values ($id,'avatar$id.$Tipoarchivo')";
     
            break;
            case 'propiedad':
                $ss = "insert into fotopropiedad (idpropiedad,foto) values ($id,'$archivo')";
                break;
            }
            break;
    }
      echo $ss;
      $fp = fopen('data.txt', 'w');
fwrite($fp,  $ss);
fwrite($fp, $consulta."-".$filas."existe:".$existe."paraquien:".$paraquien);
fclose($fp);
             $resultado = mysql_query($ss,$conc);
             
    }         

// fin else 

?>