<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        include'controles/cabezera.php';
        include 'controles/funciones.php';
        include 'coneccion/conecionMYSQL.php';
        ?>

    </head>
    <body>
        <?php
        $query = "select * from personas p left join agentes a on p.idpersonas=a.idpersonas left join "
                . "fotopersona f on f.idpersonas=p.idpersonas where a.idagente is not null";

        $consulta = mysql_db_query("sada", $query) or die('Consulta fallida: ' . mysql_error());
        $sele = mysql_num_rows($consulta);
        ?>






        <header>
            <?php navegador(); ?>
        </header>
        <?php
        // put your code here
        ?>

        <div class="container">
            <h1>Analistas de cuentas</h1>
            <div class="row">
                <?php
                if ($sele > 0) {
                    while ($row = mysql_fetch_assoc($consulta)) {
                        if ($row['foto'] == '') {
                            $foto = "noimage.png";
                        } else {
                            $foto = $row['foto'];
                        }
                        ?>
                        <div class="row alert">
                            <div class="col-sm-6" style="background-color:lavender;">
                                <h3><?php echo $row['nombre'] . " " . $row['apellido']; ?> </h3>
                                <img class="tirafoto thumbnail" src="imagenes/Personal/fotos/avatar/<?php echo $foto; ?>" width="100" height="100" alt="nombre"/>

                                <p><?php echo $row['nombre'] . " " . $row['apellido']; ?> </p>
                                <p>Mail:<a href="mailto:<?php echo $row['mail']; ?>" target="_top"><?php echo $row['mail']; ?></a></p>
                                <p>interno:<?php echo $row['interno']; ?> </p>

                                <div class="col-sm-1" style="background-color:lavender;">
                                    <form  method="post" action="asda"  class="form-horizontal" role="form">
                                        <div class="form-group">  

                                            <a href="contacto.php" class="btn btn-info" role="button">contactar</a>
                                        </div>

                                    </form>
                                </div>
                            </div>

                            <div class="col-sm-6" style="background-color:lavenderblush;">

                            </div>
                        </div>
    <?php }
};
?>
            </div>


        </div>
<?php include "pie.php"; ?>

    </body>
</html>
