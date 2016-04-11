<script>
        function cerrar() {
            
            var data = "window.documesdasdasdnt.getElementById('val1').value";
            window.opener.document.getElementById('deHijo').innerHTML = "Este texto viene de la página hijo: "+data;        
           
        }
</script>

            <input type="submit" value="Aceptar" name="Buscar" onclick="cerrar();" />
<?php

//$users = array(
//'harryf' => 'secret',
//'littlepig' => 'chinny'
//);
//// If there's no Authentication header, exit
//if (!isset($_SERVER['PHP_AUTH_USER'])) {
//header('HTTP/1.1 401 Unauthorized');
//header('WWW-Authenticate: Basic realm="PHP Secured"');
//exit('This page requires authentication');
//}
//// If the user name doesn't exist, exit
//if (!isset($users[$_SERVER['PHP_AUTH_USER']])) {
//header('HTTP/1.1 401 Unauthorized');
//header('WWW-Authenticate: Basic realm="PHP Secured"');
//exit('Unauthorized!');
//}
//// Is the password doesn't match the username, exit
//if ($users[$_SERVER['PHP_AUTH_USER']] != $_SERVER['PHP_AUTH_PW'])
//{
//header('HTTP/1.1 401 Unauthorized');
//header('WWW-Authenticate: Basic realm="PHP Secured"');
//exit('Unauthorized!');
//}
//echo 'You\'re in';
//echo $_POST['valor']."adasd";
echo "<p id=\"deHijo\"></p>";
?>