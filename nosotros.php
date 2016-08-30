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
            <div class="container">
            <article>
                <h3>Misión</h3>  
                "Ser una empresa dedicada a dar satisfacción habitacional tendiente a lograr excelencia en nuestros servicios. Para ello entregamos lo mejor de nosotros para administrar la confianza que nos depositan nuestros clientes manteniendo y cumpliendo la palabra empeñada acrecentando en cada acto el prestigio de la firma." 
            <h3>  Visión</h3>  
                "Ser la empresa N° 1 en servicios inmobiliarios, afianzarnos cada vez más en la región, mantener el perfil familiar y  entregar en cada paso la experiencia y confianza acumulada en cada generación. Ser líderes en servicios inmobiliarios con la aplicación de la mejor tecnología y gestión para satisfacer las necesidades de los clientes." 
            </article>
                <article style=" padding: 10px;">
                    <img class="col-md-offset-4" src="imagenes/images.jpg" width="256" height="192" alt="images"/>

                </article>  
               </div> 
            <?php include "pie.php"; ?>
        </body>
    </html>