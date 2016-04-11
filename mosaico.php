<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html >
    <head>
        <?php
        include 'controles/cabezera.php';
        include 'controles/funciones.php';
//            include'controles/cookies.php';
        ?>
        <title>TODO supply a title</title>

        <link href="style.css" rel="stylesheet" type="text/css"/>

    </head>
    <?php 
    
    ?>
    
    <body>
        <div class="container">
            <div class="col-md-2 ">
                <div class="row">
                    <h3 class="alert alert-info">Alquiler</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <img src="<?php echo $imagen; ?>" alt="..." class="img-thumbnail img-responsive ">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12 ">   
                            Dirección:<p class="text-justify"><?php echo $direccion; ?></p>
                            Tipo:<p class="text-justify"><?php echo $tipo; ?> </p>


                        </div>

                    </div>
                    <div class="row ">
                        <div class="col-md-12 col-md-offset-7 ">     
                            <a href="alquiler.php?prop=<?php echo idpropiedad ?>" class="btn btn-default btn-xs" role="button">Mas ++</a>
                        </div>
                    </div>
                    <div class="row">   
                        <div class="col-md-2">
                            <img src="imagenes/icons/icon-house.png" title="Superficie" alt=""/>
                        </div>
                        <div class="col-md-offset-4">
                            <img src="imagenes/icons/icon-bath.png"  title="Baños" alt="ssssss"/>1
                            <img src="imagenes/icons/icon-bed.png" title="Habitaciones" alt=""/>2
                            <img src="imagenes/icons/icon-car.png" title="Cocheras" alt=""/>3

                        </div>

                    </div>
                </div>
            </div>        
  
    </body>



</html>
