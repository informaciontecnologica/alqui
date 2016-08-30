<?php

function moza($result) { ?>
    <div class="container " style="background-color: #afd9ee ; ">
        <?php
          
        if (mysql_num_rows($result) > 0) {
            while ($fila = mysql_fetch_assoc($result)) {
                $idp = $fila['idpropiedad'];
                $sql = "select * from fotopropiedad where idpropiedad=" . $fila['idpropiedad'];
                $FotoProp = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());
                $ver = mysql_fetch_assoc($FotoProp);
                $tp= "select * from  tipopropiedad where idtipopropiedad=" . $fila['tipopropiedad_id_tipoPropiedad'];
                $tipop= mysql_query($tp) or die('Consulta fallida: ' . mysql_error());
                $tipo = mysql_fetch_assoc($tipop);
                
                $filas=  mysql_num_rows($result);
                
                ?>
                <div class="col-md-3">
                    <div class="row">
                        <h4 class="alert alert-info" style="right: 5px;">Alquiler</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <img style="width: 250px; height: 200px;" src="imagenes/Personal/fotos/propiedad/propiedad<?php echo "$idp/";
                                print_r($ver['foto']);?>" alt="..." class="img-thumbnail img-responsive center-block ">
                            </div>
                        </div>
                        <div class="panel-group">
                            <div class="col-md-12 ">   
                                <strong>Direcci&oacute;n:</strong><p class="text-justify"><?php echo utf8_encode($fila["direccion"]); ?></p>
                                <strong>Tipo:</strong><p class="text-justify"><?php echo $tipo['Tipo'];?> </p>
                           </div>
                        </div>
                        <div class="panel-group">
                            <div class="col-md-12 col-md-offset-7 ">     
                                <a href="alquiler.php?prop=<?php echo $fila["idpropiedad"]; ?>" class="btn btn-default btn-xs" role="button">Mas ++</a>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-4">
                                <img src="imagenes/icons/icon-house.png" title="Superficie" alt=""/>
                                 <?php echo $fila["superficie"]; ?>
                            </div>
                            <div class="col-md-8">
                                <img src="imagenes/icons/icon-bath.png"  title="Baños" alt="ssssss"/><?php echo $fila["banos"]; ?>
                                <img src="imagenes/icons/icon-bed.png" title="Habitaciones" alt=""/><?php echo $fila["habitaciones"]; ?>
                                
                            </div>
                        </div>
                    </div>
                </div>        
                <?php
                mysql_free_result($FotoProp);
            }
        }
    }
    ?>
