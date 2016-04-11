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
        ?>

    </head>
    <body>
        <header>
            <?php navegador($estado); ?>
        </header>
        <?php
        // put your code here
        ?>

        <div class="container">
            <h1>Analistas de cuentas</h1>
            <div class="row">
                <div class="col-sm-6" style="background-color:lavender;">
                    <h3>Jorge Daniel Castro</h3>
                    <img src="asd" width="100" height="100" alt="nombre"/>

                    <p>Jorge Daniel Castro</p>
                    <p>Mail:</p>
                    <p>interno:</p>
                    <p>Celular:</p>
                    <p>Twiter:</p>
                    <div class="col-sm-1" style="background-color:lavender;">
                        <form  method="post" action="asda"  class="form-horizontal" role="form">
                            <div class="form-group">  
                                <input class="btn btn-default" type="submit"  value="Contactar"   name="Agente" />
                            </div>
                   
                    </form>
                </div>
            </div>

            <div class="col-sm-6" style="background-color:lavenderblush;">
                <h3>Trabajos Realizados</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                    veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6" style="background-color:lavender;">
                <h3>Jorge Daniel Castro</h3>
                <img src="asd" width="100" height="100" alt="nombre"/>

                <p>Jorge Daniel Castro</p>
                <p>Mail</p>
                <p>interno;</p>
                <p>Celular</p>
                <p>Twiter:</p>
            </div>

            <div class="col-sm-6" style="background-color:lavenderblush;">
                <h3>Trabajos Realizados</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                    veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
        </div>
    </div>


</body>
</html>
