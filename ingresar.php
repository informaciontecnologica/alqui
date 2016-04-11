<?php include 'controles/funciones.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include'controles/cabezera.php' ?>
        <title> Login Form </title>
        <meta http-equiv="Content-type"
              content="text/html; charset=iso-8859-1" />

    </head>
    <body>
        <header>
            <?php navegador($_GET['estado']); ?>
        </header> 
        <div class="container">
        <div class="row">
              <div class="col-md-12 col-lg-12">
        <?php if ($_GET['estado'] == 'Ingresar') { ?>
       
            <h1>Loguearse</h1>
            <form class="form-horizontal" role="form"  action="sess.php" method="post">
                <div class="form-group">  
                    <label class="control-label col-sm-2">Mail</label>
                    <div class="col-md-3 col-lg-3">
                        <input class="form-control" type="mail" ng-model="mail" name="mail" required  autofocus/>
                    </div>
                </div>
                <div class="form-group">  
                    <label class="control-label col-sm-2 ">Clave</label>
                    <div class="col-md-3 col-lg-3">
                        <input  class="form-control" type="password" ng-model="password" required  name="password" />
                    </div>
                </div>
                <div class="form-group">  
                    <div class="col-md-offset-2 col-md-12 col-lg-12">
                        <input class="btn btn-default" type="submit" value=" Login " />
                    </div>
                </div>
            </form>
            <?php
        } else {

            session_unset();
            session_destroy();
            header('Location: index.php');
//            echo $_SESSION['Nombre'];
        }
        ?>
        </div>
        </div>
        </div>
    </body>
</html>