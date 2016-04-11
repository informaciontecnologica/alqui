<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
/* Establecemos que las paginas no pueden ser cacheadas */
header("Expires: Tue, 01 Jul 2016 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
date_default_timezone_set('America/Argentina/Buenos_Aires');

function logOut() {
    session_unset();
    session_destroy();
    session_start();
    session_regenerate_id(true);
}

//if (isset($_SESSION['Nombre'])) {
//     $estado="Salir";
//     
// }else
// {
//     $estado="Ingresar";
////       header('Location: index.php');
////      
// }
//header('Content-Type: text/html; charset=ISO-8859-1');

class MySQL {

    private $conexion;
    private $total_consultas;

    public function MySQL() {
        if (!isset($this->conexion)) {
            $this->conexion = (mysql_connect("localhost", "root", ""))
                    or die(mysql_error());
            
            mysql_query("SET NAMES 'utf8'");
            mysql_select_db("SADA", $this->conexion) or die(mysql_error());
        }
    }

    public function consulta($consulta) {
        $this->total_consultas++;
        $resultado = mysql_query($consulta, $this->conexion);
        if (!$resultado) {
            echo 'MySQL Error: ' . mysql_error();
            exit;
        }
        return $resultado;
    }

    public function fetch_array($consulta) {
        return mysql_fetch_array($consulta);
    }

    public function num_rows($consulta) {
        return mysql_num_rows($consulta);
    }

    public function getTotalConsultas() {
        return $this->total_consultas;
    }

}

//<svg width=\"60\" height=\"60\" id=\"dedos\">
//  <rect  width=\"60\" height=\"60\" style=\"fill:rgb(0,0,255);stroke:rgb(0,0,0)\" />
//</svg> class=\"navbar navbar-default navbar-static-top\"




//
//class navegadores {
//
//    // Declaración del método
//    function __construct() {
//        $db = new MySQL();
//        $seleccion = $db->consulta("Select * from menu");
//
//        echo "<lu>";
//        if ($db->num_rows($seleccion) > 0) {
//            while ($resultados = $db->fetch_array($seleccion)) {
//                echo "<li>" . $resultados['Texto'] . "</li>";
//            }
//            echo "</lu>";
//        }
//    }
//
//}

function buscador() {
    echo "<object type=\"text/html\" data=\"formularioBuscador.php\" width=\"400\" height=\"450\"></object>";
}

function FormInputSelectBarrios() {
    $db = new MySQL();
    $seleccion = $db->consulta('select b.* from barrios b left join barrio_ciudad bc on bc.Id_barrio =b.id_barrios where bc.id_ciudad=1');
    if ($db->num_rows($seleccion) > 0) {
        $resultados = array();
        while ($row = mysql_fetch_array($seleccion)) {
            $resultados[] = array($row['id_barrios'] => $row['nombre']);
        }
    }

    echo "<select name=\"Barrio\">";
    foreach ($resultados as $fila) {
        foreach ($fila as $key => $tipo) {
            echo "<option value=\"$key\">$tipo</option>";
        }
    }
    echo"             </select>";
}

function FormInputSelectTipoPorpiedades() {
    $db = new MySQL();
    $seleccion = $db->consulta('select * from tipopropiedad');
    if ($db->num_rows($seleccion) > 0) {
        $resultados = array();
        while ($row = mysql_fetch_array($seleccion)) {
            $resultados[] = array($row['idtipoPropiedad'] => $row['Tipo']);
        }
    }

    echo "<select name=\"tipocasa\">";
    foreach ($resultados as $fila) {
        foreach ($fila as $key => $tipo) {
            echo "<option value=\"$key\">$tipo</option>";
        }
    }
    echo"             </select>";
}

function SelectProvincia() {
    $db = new MySQL();
    $seleccion = $db->consulta('select * from provincia');
    if ($db->num_rows($seleccion) > 0) {
        $resultados = array();
        while ($row = mysql_fetch_array($seleccion)) {
            $resultados[] = array($row['id_provincia'] => $row['Provincia']);
        }
    }

    echo "<select name=\"Provincia\">";
    foreach ($resultados as $fila) {
        foreach ($fila as $key => $tipo) {
            echo "<option value=\"$key\">$tipo</option>";
        }
    }
    echo"             </select>";
}

;

function SelectMunicipio() {
    $db = new MySQL();
    $seleccion = $db->consulta('select * from provincia');
    if ($db->num_rows($seleccion) > 0) {
        $resultados = array();
        while ($row = mysql_fetch_array($seleccion)) {
            $resultados[] = array($row['id_provincia'] => $row['Provincia']);
        }
    }

    echo "<select name=\"Provincia\">";
    foreach ($resultados as $fila) {
        foreach ($fila as $key => $tipo) {
            echo "<option value=\"$key\">$tipo</option>";
        }
    }
    echo"             </select>";
}

class formSelection {

    function __construct($nombre, $tabla, $campo1, $campo2) {
        $db = new MySQL();
        $seleccion = $db->consulta('select * from ' . $tabla);

        if ($db->num_rows($seleccion) > 0) {

            $resultados = array();
            while ($row = mysql_fetch_array($seleccion)) {
                $resultados[] = array($row[$campo1] => $row[$campo2]);
            }
        }

        echo "<label>$nombre</label><select name=\"$nombre\">";
        foreach ($resultados as $fila) {
            foreach ($resultados as $key => $tipo) {
                echo "<option value=\"$key\">$tipo</option>";
            }
        }
        echo"   </select>";
    }

}

function after($this, $inthat) {
    if (!is_bool(strpos($inthat, $this)))
        return substr($inthat, strpos($inthat, $this) + strlen($this));
}

;
