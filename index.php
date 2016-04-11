<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
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
        <script>
            $(document).ready(function () {
                $('#coin-slider').coinslider({
                    delay: 3000,
                    hoverPause: false,
                    navigation: true,
                    width: 565,
                    height: 290
                });
                  $('#coin-slider1').coinslider({
                    delay: 3000,
                    hoverPause: false,
                    navigation: true,
                    width: 565,
                    height: 290
                });
                   $('#coin-slider2').coinslider({
                    delay: 3000,
                    hoverPause: false,
                    navigation: true,
                    width: 565,
                    height: 290
                });
            });
        </script>



    </script>

</head>
<?php // include'controles/cabezera.php' ?>
 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
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
        <section class="" > 
            <article class="movi">

                <div class="row  ">
                    <div class="col-sm-3">

                        <div id="coin-slider">

                            <a href="sdasdas" >
                                <img src="imagenes/IS1j754p8h9g020000000000.jpg" alt="aaaaaaaaaa"/>
                                <span>
                                    Description for img01
                                </span>
                            </a>

                            <img src="imagenes/IS5a3bsvuhu1xj1000000000.jpg" alt=""/>
                            <img src="imagenes/ISt04o7buezc071000000000.jpg" alt=""/>
                            <img src="imagenes/ISxvuwl9erryy80000000000.jpg" alt=""/>
                        </div>
                    </div>
                    
                    <div class="col-sm-3">

                        <div id="coin-slider1">

                            <a href="sdasdas" >
                                <img src="imagenes/IS1j754p8h9g020000000000.jpg" alt="aaaaaaaaaa"/>
                                <span>
                                    Description for img01
                                </span>
                            </a>

                            <img src="imagenes/IS5a3bsvuhu1xj1000000000.jpg" alt=""/>
                            <img src="imagenes/ISt04o7buezc071000000000.jpg" alt=""/>
                            <img src="imagenes/ISxvuwl9erryy80000000000.jpg" alt=""/>
                        </div>
                    </div>
                    <div class="col-sm-3">

                        <div id="coin-slider2">

                            <a href="sdasdas" >
                                <img src="imagenes/IS1j754p8h9g020000000000.jpg" alt="aaaaaaaaaa"/>
                                <span>
                                    Description for img01
                                </span>
                            </a>

                            <img src="imagenes/IS5a3bsvuhu1xj1000000000.jpg" alt=""/>
                            <img src="imagenes/ISt04o7buezc071000000000.jpg" alt=""/>
                            <img src="imagenes/ISxvuwl9erryy80000000000.jpg" alt=""/>
                        </div>
                    </div>
                </div>
            </article>
            <article>
                <div id="dedos" ></div>
            </article>
        </section>
        <section>
            <?php
            if (isset($_POST['buscar'])) {
                include 'coneccion/conecionMYSQL.php';
                // Realizar una consulta MySQL
                $query = 'SELECT * FROM propiedades';
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());


                include "mosaico1.php";
                moza($result);
            }
            ?> 
        </section>
    </div>
    <?php include "pie.php"; ?>
</body>
</html>
