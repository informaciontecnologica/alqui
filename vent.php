<!doctype html>
<html>
<head>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script>
$(document).ready(function(){
$( "#hello" ).dialog({ autoOpen: false });
$( "#say_it" ).click(function() {
$( "#hello" ).dialog( "open" );
});
});
</script>
</head>
<body><object type="text/html" data="prin.php" width="400" height="400"> </object>
    <iframe  src="http://webdesign.about.com/od/iframes/a/aaiframe.htm" width="300" height="600">A page about learning iFrames</iframe>
<img id="say_it"src="http://s2.miradetodo.com.ar/thumbs/thumbs/1421001782eac72.-big.jpg" >
<p>Esta pagina te dice Hola!!!"<br>
as un Click en la imagen</p>
<object type="text/html" data="http://www.google.com" width="400" height="400"> </object>
<img id="say_it"src="http://s2.miradetodo.com.ar/thumbs/thumbs/1421001782eac72.-big.jpg" >

<div id="hello"  title="Hola Belen!">
    <p><font face="Georgia" size="4"> Ey , tu tio te dice HOLA°°!!"</font></p>
    <img id="say_it"src="http://s2.miradetodo.com.ar/thumbs/thumbs/1426891471814b7.-big.jpg" >
</div>
</body>
</html>