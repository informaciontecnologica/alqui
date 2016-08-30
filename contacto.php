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
            <header>
                <?php navegador(); ?>
            </header>
            <div class="container">
                <div class="row col-md-offset-3">
                    <h3>Contacto</h3>
                    <div id="formulario">
                        <form class="form-horizontal" method="post"  name="contacto" role="form">
                            <label for="nombre">Nombre</label>
                            <div class="form-group">

                                <div class="col-md-4">
                                    <input name="nombre" class="form-control" type="text" required="required" id="nombre" placeholder="nombre" tabindex="1" title="Nombre">
                                </div>
                            </div>
                            <label for="email">Email</label>
                            <div class="form-group">

                                <div class="col-md-4">
                                    <input name="email"  class="form-control" type="email" required="required" id="email" placeholder="email" tabindex="2" title="Email">
                                </div>
                            </div>
                            <label for="telefono">Teléfono</label>

                            <div class="form-group">

                                <div class="col-md-4">
                                    <input name="telefono" class="form-control" type="text" id="telefono" placeholder="telefono" tabindex="3" title="Telefono">
                                </div>
                            </div>
                            <label for="ciudad">Ciudad</label>
                            <div class="form-group">

                                <div class="col-md-4">
                                    <input name="ciudad" class="form-control" type="text" id="ciudad" placeholder="ciudad" tabindex="4" title="ciudad">
                                </div>
                            </div>
                            <label for="pais">País</label>
                            <div class="form-group">

                                <div class="col-md-4">
                                    <input name="pais" type="pais" class="form-control" id="pais" placeholder="pais" tabindex="5" title="pais">
                                </div>
                            </div>
                            <label for="Mensaje">Mensaje</label>
                            <div class="form-group">

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
            </div >


            <?php
        
            
            if (isset($_POST['mensaje']) ){
                $destinatario = "info@informaciontecn.com.ar";
                $asunto = "Este mensaje es de prueba";
                $cuerpo = ' 
<html> 
<head> 
   <title>Prueba de correo</title> 
</head> 
<body> 
<h1>Hola amigos!</h1> 
<p> 
<b>Bienvenidos a mi correo electrónico de prueba</b>. Estoy encantado de tener tantos lectores. Este cuerpo del mensaje es del artículo de envío de mails por PHP. Habría que cambiarlo para poner tu propio cuerpo. Por cierto, cambia también las cabeceras del mensaje. 
</p> 
</body> 
</html> 
';
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//dirección del remitente 
                $headers .= "From: Miguel Angel Alvarez <pepito@desarrolloweb.com>\r\n";

//dirección de respuesta, si queremos que sea distinta que la del remitente 
                $headers .= "Reply-To: mariano@desarrolloweb.com\r\n";

//ruta del mensaje desde origen a destino 
                $headers .= "Return-path: holahola@desarrolloweb.com\r\n";

//direcciones que recibián copia 
                $headers .= "Cc: maria@desarrolloweb.com\r\n";

//direcciones que recibirán copia oculta 
                $headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n";

                $bool = mail($destinatario, $asunto, $cuerpo, $headers);
                if ($bool) {
                    echo "Mensaje enviado";
                } else {
                    echo "Mensaje no enviado";
                }
            }
            ?>
            <?php include "pie.php"; ?>
        </body>
    </html>
