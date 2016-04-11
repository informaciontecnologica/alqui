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
function navegador() {
    if (isset($_SESSION['Nombre'])) {
        $estado = 'Salir';
    } else {
        $estado = 'Ingresar';
    }

    echo "
<nav class=\"navbar navbar-default\" role=\"navigation\" > 
 <div class=\"container-fluid\">
  <div class=\"collapse navbar-collapse\">
    <ul class=\"nav navbar-nav\">
        <li ><a  href=\"index.php\" title=\"SADA\" > Home </a></li>
        <li ><a  href=\"alquileres.php\" title=\"SADA\" > Alquileres </a></li>
        <li><a href=\"agentes.php\" title=\"SADA\" > Agentes </a></li>
        <li ><a  href=\"Locales\" title=\"SADA\" > Locales</a></li>
    </ul> 
     <ul class=\"nav navbar-nav pull-right\">";
    if (isset($_SESSION['Nombre'])) {
        
        echo "<li><a href=\"#\" > <span class=\"badge\">".$_SESSION['Nombre']."</span></a></li>"
        . "<li><a href=\"perfil.php\" title=\"perfil\" >Perfil</a></li>"
        . "<li><a href=\"propiedades.php\" title=\"Propiedades \" >Propiedades</a></li>"
        . "<li> <a  href=\"noticias.php\" title=\"Noticias\" >Noticias</a></li>";
        
                       
    // verifica si pertenece a un perfil determinado
   switch ($_SESSION['perfil']) {
    case 1:
       echo "<li> <a  href=\"usuarios.php\" title=\"Usuarios \" >Usuarios</a></li>";
    echo "<li> <a  href=\"Adminagentes.php\" title=\"Agentes\" >Agentes</a></li>";
    break;
    case 2:
      echo "<li> <a  href=\"seguimientos.php\" title=\"Seguimientos\" >Seguimientos</a></li>"; 
    break;
    default :
   echo "<li><a  href=\"registrarse.php\" title=\"Nuevo Registrase \" >Registrarse</a></li>";
    break;
   }
    } 
    echo "<li> <a  href=\"ingresar.php?estado=$estado\" title=\"$estado \" >$estado</a></li>";  
          echo "<li><a  href=\"registrarse.php\" title=\"Nuevo Registrase \" >Registrarse</a></li>".  
     "</ul>
    </div>
  </div>
 </nav>
     
";
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

    echo "<select class=\"form-control\" name=\"tipocasa\">";
    echo "<option value=\"0\">Todas</option>";
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

function buscadores(){
   echo "<div class=\"container\">
               <form name=\"buscador\"  class=\"form-inline\" action=\"\" method=\"POST\">";
                   echo " <div class=\"form-group\"> ";
              echo " <label class=\"sel1\" style=\"padding:5px;\"  >Categoria: </label>";    
                         FormInputSelectTipoPorpiedades(); 
                   echo  "</div>";

                   echo "<div class=\"form-group\">
                        <label class=\"sel1\" style=\"padding:5px;\" >Ambientes: </label>
                        <select class=\"form-control\" name=\"Habitaciones\"> 
                            <option value\"0\">Todos</option>
                            <option value\"1\">1</option>
                            <option value\"2\">2</option>
                            <option value\"3\">3</option>
                            <option value\"3+\">3+</option>
                        </select>
                    </div>";

                   echo "<div class=\"form-group\">
                        <label class=\"sel1\" style=\"padding:5px;\" >Min: </label>
                        <select class=\"form-control\" name=\"min\"> 
                            <option value\"1\">Todos</option> 
                            <option value\"1000\">1000</option>
                            <option value\"2000\">2000</option>
                            <option value\"3000\">3000</option>
                            <option value\"+3000\">+3000</option>
                        </select>
                    </div>";
                   echo "<div class=\"form-group\">
                        <label class=\"sel1\" style=\"padding:5px;\">Max: </label>
                        <select class=\"form-control\" name=\"max\"> 
                            <option value\"1\">Todos</option> 
                            <option value\"1000\">1000</option>
                            <option value\"2000\">2000</option>
                            <option value\"3000\">3000</option>
                            <option value\"+3000\">+3000</option>
                        </select>
                   </div>
                    <div <div class=\"form-group\" style=\"padding:5px;\">
                        <input type=\"hidden\" name=\"valorbuscar\" value=\"ok\">
                       <input type=\"submit\" class=\"btn btn-default\" name=\"buscar\" value=\"Buscar\">
                    </div>
                </form>
            </div>
            ";
}
