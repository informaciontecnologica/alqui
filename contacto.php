<!doctype html>
<html>
    <html lang="es">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Formulario de Contacto - Script Personal</title>

            <?php
            include'controles/cabezera.php';
            include 'controles/funciones.php';
            include 'coneccion/conecionMYSQL.php';
            ?>
        </head>

        <body>
            <div class="container">
                <div id="formulario">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <div class="col-md-4">
                                <input name="nombre" class="form-control" type="text" required="required" id="nombre" placeholder="nombre" tabindex="1" title="Nombre">
                            </div>
                        </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="col-md-4">
                        <input name="email"  class="form-control" type="email" required="required" id="email" placeholder="email" tabindex="2" title="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <div class="col-md-4">
                        <input name="telefono" class="form-control" type="text" id="telefono" placeholder="telefono" tabindex="3" title="Telefono">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <div class="col-md-4">
                        <input name="ciudad" class="form-control" type="text" id="ciudad" placeholder="ciudad" tabindex="4" title="ciudad">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pais">País</label>
                    <div class="col-md-4">
                        <input name="pais" type="pais" class="form-control" id="pais" placeholder="pais" tabindex="5" title="pais">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Mensaje">Mensaje</label>
                    <div class="col-md-4">
                        <textarea name="mensaje" rows="4" class="form-control" id="mensaje" placeholder="mensaje" tabindex="6"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <input type="submit" name="enviar" tabindex="7" value="Enviar">
                        <input type="reset" tabindex="8" value="Borrar">
                        <input type="hidden" name="estado" value="1">
                    </div>  
                </div>
            </form>
        </div>
    </div>
</body>
</html>
