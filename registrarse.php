<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>


        <?php
        include'controles/cabezera.php';

        //*******************navegador
        function navegador() {
            if (isset($_SESSION['Nombre'])) {
                $estado = 'Salir';
            } else {
                $estado = 'Ingresar';
            }

            echo "
<nav id=\"navegador\" > 
  <ul id=\"menu_general\">
        <li><a  href=\"index.php\" title=\"SADA\" > Home </a></li>
        <li><a  href=\"alquileres.php\" title=\"SADA\" > Alquileres </a></li>
        <li><a href=\"agentes.php\" title=\"SADA\" > Agentes </a></li>
        <li><a  href=\"Locales\" title=\"SADA\" > Locales</a></li>
    </ul> 
     <ul id=\"sesion\">";
            if (isset($_SESSION['Nombre'])) {

                echo "<li>Bienvenido/a</li> <li>" . ucwords($_SESSION['Nombre']) . "</li>"
                . "<li><a href=\"perfil.php\" title=\"Ingresar \" >Perfil</a></li>"
                . "<li><a href=\"propiedades.php\" title=\"Propiedades \" >Propiedades</a></li>"
                . "<li> <a  href=\"noticias.php\" title=\"Noticias\" >Noticias</a></li>";




                // verifica si pertenece a un perfil determinado
                switch ($_SESSION['perfil']) {
                    case 1:
                        echo "<li> <a  href=\"usuarios.php\" title=\"Usuarios \" >usuarios</a></li>";
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
            echo "<li><a  href=\"registrarse.php\" title=\"Nuevo Registrase \" >Registrarse</a></li>" .
            "</ul>

    
  
 </nav>
     
";
        }

        //*********************


        class MySQL {

            private $conexion;
            private $total_consultas;

            public function MySQL() {
                if (!isset($this->conexion)) {
                    $this->conexion = (mysql_connect("localhost", "root", ""))
                            or die(mysql_error());
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
        ?>

        <script src="jquery/angular.min.js" type="text/javascript"></script>

     <!--<script src="js/registrase.js" ></script>-->
    </head>
    <body ng-app='MyApp' ng-controller='MainCtrl'  >
        <header>
            <?php navegador(); ?>
        </header>

        <div class="container ">
            <article >
                <div class="row">

                    <form class="form-horizontal" method="post" role="form">
                        <div class="form-group">
                            <h2 class="form-signin-heading">Registrarse</h2>
                            <div class="col-lg-4">
                                <input type="text" name="nombre_usuario" class="form-control" placeholder="usuario" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <input type="email" name="mail" class="form-control" placeholder="emial direccion " required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <button class="btn btn-lg btn-primary btn-block" name="Agregar" type="submit">Registrar </button>
                            </div>
                        </div>
                    </form>
                </div>
            </article>
            <article>
                <?php
                if (isset($_POST['Agregar'])) {
                    $nombre_usuario = utf8_decode($_POST['nombre_usuario']);
                    $mail = utf8_decode($_POST['mail']);
                    $password = md5($_POST['password']);


                    $db = new MySQL;
                    $seleccion = $db->consulta("insert into usuario (nombre_usuario,clave,mail,fecha,id_perfil)"
                            . " values ('$nombre_usuario','$password','$mail',NOW(),1)");
                    if ($seleccion) {
                        
                        ?>
                <div class="view">
                    <p>Gracias por registrarte <?php echo "$nombre_usuario"; ?></p>
                </div>
                            <?php
                    }
                } else {
                    
                }
                ?>


            </article>
        </div>
    </div> 
</div>
<div id="message"></div>
</body>
<script>

</script>



</html>
