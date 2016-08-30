<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'controles/cabezera.php';

include 'controles/funciones.php';
header('Content-Type: text/html; charset=ISO-8859-1');


if (!isset($_SESSION['Nombre'])) {
    $estado = "Ingresar";
} else {
    $now = time(); // Checking the time now when home page starts.
    $estado = "salir";
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "LA session a expirado";
    } else { //Starting this else one [else1]}
    }
}
?>
<html>
    <head>
        <script src="jquery/jquery-2.1.3.min.js" type="text/javascript"></script>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
        <!-- jQuery library (served from Google) -->

        <!-- bxSlider Javascript file -->
        <meta property="og:url"           content="http://www.informaciontecn.com.ar" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="Sistema de busqueda de alquileres SADA" />
        <meta property="og:description"   content="Alquileres Online para su busqueda sea mas simple" />
        <!--<meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />-->



        <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="coin-slider/coin-slider.min.js" type="text/javascript"></script>
        <script src="coin-slider/coin-slider.js" type="text/javascript"></script> 
        <link href="coin-slider/coin-slider-styles.css" rel="stylesheet" type="text/css"/>
        <link href="plantillas/inicio.css" rel="stylesheet" type="text/css"/>




    </head>
    <?php // include'controles/cabezera.php'  ?>
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <body>
        <header>
            <?php navegador($estado); ?>
        </header>
        <article style=" display: block; padding: 15px; background-color:  #90B8DA;">
            <?php buscadores(); ?>
        </article>

        <div class="container " style="margin-top: 20px;">
            <div class="row "> 
                <div class=" cointainer">
                    <?php
                    include 'coneccion/conecionMYSQL.php';
                    $query = "SELECT * FROM `propiedades` p left join `propiedades alquileres` pa "
                            . "on p.idpropiedad=pa.idpropiedad left join alquileres a on pa.idalquileres=a.idalquiler where estado in('desalquilado','promocion')";
                    $result = mysql_query($query) or die('Consulta fa222222llida: ' . mysql_error());
                    if (mysql_num_rows($result) > 0) {
                        $contar = 0;
                        while ($propiedades = mysql_fetch_array($result)) {

                            $idpropieda[] = $propiedades['idpropiedad'];
                        }


                        $nom = implode(",", $idpropieda);
                    }

                    $sql = "SELECT * FROM `propiedades` p left join fotopropiedad  fp  on fp.idpropiedad=p.idpropiedad "
                            . "where  fp.idpropiedad in ($nom)";
                    $FotoPr = mysql_query($sql) or die('Consult1111a fallida: ' . mysql_error());

                    if (mysql_num_rows($FotoPr) > 0) {
                        ?>         

                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">

                                <?php
                                for ($index = 0; $index < mysql_num_rows($FotoPr); $index++) {
                                    if ($index == 0) {
                                        $act = ' class="active" ';
                                    } else {
                                        $act = "";
                                    }
                                    ?>
                                    <li data-target="#myCarousel" data-slide-to="<?php echo $index; ?>" <?php $act ?> ></li>
                                <?php } ?> 
                            </ol>
                            <!--                                    <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <?php
                                $cont = 0;
                                while ($Fotos = mysql_fetch_assoc($FotoPr)) {
                                    if ($cont == 0) {
                                        $act = ' active ';
                                        $cont++;
                                    } else {
                                        $act = "";
                                    }
                                  echo " <div class = \"item $act\">";
                                  echo '<a href="alquiler.php?prop='.$Fotos['idpropiedad'].'">';
                                    echo "<img data-color=\"\" src=\"imagenes/Personal/fotos/propiedad/propiedad" . $Fotos['idpropiedad'] . "/" . $Fotos['foto'] . "\" />";
                                    echo "<div class=\"carousel-caption\">";
                                     echo "<h3>".$Fotos['direccion']."</h3>";
                                     echo "<p>".$Fotos['Descripcion'].".</p>";
                                  echo "</a>";   
                                    echo "</div>";
                                  echo "</div>";
                                }
                                ?>    
                            </div>
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </div>
                    </div>


                    <?php
                }
                mysql_free_result($FotoPr);
                ?>
            </div>

            <article>
                <!--<div id="dedos" ></div>-->
            </article>
        </div>     

        <div class="row"> 

            <?php
            if (isset($_POST['buscar'])) {


                // Realizar una consulta MySQL
                $Habitaciones = $_POST['Habitaciones'];
                $categoria = $_POST['tipocasa'];
                $min = $_POST['min'];
                $max = $_POST['max'];
                $where = "  ";
                $cont = false;
                if (($Habitaciones == '0') and ( $categoria == '0') and ( $min == '0') and ( $max == '0')) {
                    $where = " where estado in('desalquilado','promocion')";
                }

                if ($categoria != 0) {
                    $where.=" tipopropiedad_id_tipoPropiedad=$categoria";
                    $cont = true;
                }
                if ($Habitaciones != '0') {
                    ($cont) ? $where.=" and" : $where.="";
                    $where.=" habitaciones=$Habitaciones";
                    $cont = true;
                }
                if ($min != 0) {
                    ($cont) ? $where.=" and" : $where.="";
                    $where.=" monto>=$min";
                    $cont = true;
                }
                if ($max != 0) {
                    ($cont) ? $where.=" and" : $where.="";
                    $where.=" monto<=$max";
                }

                $query = "SELECT p.*,a.descripcion,a.temporada,a.monto,a.fecha_Activa FROM  `propiedades alquileres` pa  
                    left join propiedades  p on p.idpropiedad=pa.idpropiedad
                left join alquileres a on a.idalquiler=pa.idalquileres $where";
            } else {

                $query = "SELECT * FROM `propiedades` p left join `propiedades alquileres` pa on "
                        . " p.idpropiedad=pa.idpropiedad left join alquileres a on pa.idalquileres=a.idalquiler where estado in('desalquilado','promocion') ";
            }
//            echo $query;

            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            include "mosaico1.php";
            moza($result);
            ?> 
        </div>


        <?php include "pie.php"; ?>
        <script>
//                    $(document).ready(function () {
//                        
//            .carousel - inner > .item > img,
//    
//                    .carousel - inner > .item > a > img {
//                    width: 300px;
//                            height: 350px;
//                            
//                    }
//            });
        </script>
    </body>

</html>
