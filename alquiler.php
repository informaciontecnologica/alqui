<!DOCTYPE html>
<html >
    <html>
        <head>     
            <?php
            include 'controles/cabezera.php';
            include 'controles/funciones.php';
            ?>
            <link href="style.css" rel="stylesheet" type="text/css"/>
            <script src="http://maps.googleapis.com/maps/api/js"></script>
            <style>
                .carousel-inner > .item > img,
                .carousel-inner > .item > a > img {
                    width: 400px;
                    height: 370px;
                    margin: auto;
                }
            </style>
        </head>
        <body >
            <header>
                <?php navegador(0); ?>
            </header>
            <article style=" display: block; padding: 15px; background-color:  #90B8DA;">
                <?php buscadores(); ?>
            </article>

            <article>
                <?php
                if (isset($_GET['prop'])) {
                    include 'coneccion/conecionMYSQL.php';
                    // Realizar una consulta MySQL
//                $categoria=$_POST['tipocasa'];
//                $min=$_POST['min'];
//                $max=$_POST['max'];
//                $Habitaciones=$_POST['Habitaciones'];

                    $idpropiedad = $_GET['prop'];

//                 where valor beetwen $min and $max  and categoria=$categoria and ambientes=$Habitaciones

                    $query = "SELECT * FROM propiedades where idpropiedad=$idpropiedad";
                    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                    $sql = "SELECT * FROM fotopropiedad where idpropiedad=$idpropiedad";
                    $FotoPr = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());
                }
                ?> 
                <div class="container" >
                    <div class="row " >
                        <div class="col-md-4">
                            <h3>Imagenes</h3>
                            <div style=" width: 380px;">
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
                                            echo "<img  src=\"imagenes/Personal/fotos/propiedad/propiedad$idpropiedad/" . $Fotos['foto'] . "\" width=\"450\" height=\"390\"/>";
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
                        </div>
                        <div class="col-md-3 ">
                            <div>
                                <h3>Alquiler</h3>
                                <div class="panel panel-info">
                                    <!--                                    <div class="panel-heading">
                                                                            
                                                                        </div>-->

                                    <?php $row = mysql_fetch_assoc($result) ?>
                                    <div class="list-group-item">Dirección:<?php echo $row['direccion'] ?></div>
                                    <div class="list-group-item">Municipio - Provincia</div>
                                    <div class="list-group-item">Precio:<?php echo $row['valor'] ?></div>
                                    <div class="list-group-item">Superficie:<?php echo $row['superficie'] ?></div>

                                    <div class="list-group-item">Baños:<?php echo $row['banos'] ?></div>
                                    <div class="list-group-item">Ambientes:<?php echo $row['habitaciones'] ?></div>
                                    <div class="list-group-item">Descripción:<?php echo $row['Descripcion'] ?></div>
                                    <div class="list-group-item">Otros:<?php echo $row['otros'] ?></div>
                                    <input type="hidden" id="Localizacion" value="<?php echo $row['localizacion'] ?>">
                                </div>

                            </div>     
                        </div>

                        <div class="col-md-4 info">
                            <h3>Ver ubicación</h3>
                            <div id="map" style="width: 100%; height: 370px;" ></div>
                        </div> 
                    </div>

                    <div style=" padding:  20px;">  
                      
                        <div ng-app="zaza" ng-controller="envio" class="row">

                            <div class="row">
                                <label for="ejemplo_email_3" class="col-md-2 control-label">Email</label>
                                <div class="col-md-6">
                                    <input type="email" ng-model="mail" class="form-control col-md-6" id="ejemplo_email_3" placeholder="Email"
                                           value="<?php echo $_SESSION['mail']?>">
                                </div>
                            </div>
                            <div class="row" >
                                <label  class="col-lg-2 control-label">Mensaje</label>
                                <div class="col-md-5">
                                   <textarea ng-model="mensaje" class="col-md-7 form-control" >Usuario:<?php echo $_SESSION['Nombre'] ?> </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-right col-md-7 ">
                                    <button ng-click="mensajes();" class="btn btn-default">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>

                <?php include "pie.php"; ?>
        </body>
    </html>
    <script src="js/alquiler.js" type="text/javascript"></script>
