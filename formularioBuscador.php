<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php // include 'controles/funciones.php'; ?>
<html>
    <head>
        <title>SADA</title>
        <script src="jquery/jquery-2.1.3.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="plantillas/inicio.css" type="text/css"/>
        <?php include 'controles/funciones.php'?>
       <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript">
			$(document).ready(function() {
				$("#boton").click(function(event) {
					$("#capa").load('usuarios.html');
				});
			});
		</script>
    </head>
    <body >
        <div id="capa"></div>
        <div id="buscador">
            
            <form name="buscador"  action="resultados.php" method="POST">
                <label>
                    Cantidad de Habitaciones
                </label>
                <select name="Habitaciones">
                    <option value"1">1</option>
                    <option value"2">2</option>
                    <option value"3">3</option>
                    <option value"3+">3+</option>
                </select>
              
                <label>
                    Cantidad de Baños
                </label> 
                <select name="bano"  >
                    <option value"1">1</option>
                    <option value"2">2</option>
                    <option value"3">3</option>
                    <option value"4">4</option>
                    <option value"5">5</option>
                    <option value"6+">6+</option>
                </select>
                <label>
                    Precios max y min
                </label>
                <label>min</label>
                <input type="number" title="precio mini" name="min">
                <label>max</label>
                <input type="number" title="precio max" name="max">
                 <label>
                    Barrios
                </label>  
              
                
                <label>
                    Tipo de Propiedad
                </label>
               <?php FormInputSelectTipoPorpiedades(); ?>
                <input name="boton" id="boton" type="button" value="Actualizar capa" />
                    
            </form>
            
            <!--<input type="submit" value="Aceptar" name="Buscar" onclick="AbrirIndex();" />-->
            
        </div>
    </body>
</html>
