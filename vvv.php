<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>jQuery UI Dialog - Dialogo para formulario simple</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

<link rel="stylesheet" href="jquery-ui-1.10.2.sunny.css" />

<script>
$(function () {
$("#dialog").dialog({
autoOpen: false,
modal: true,
buttons: {
"Aceptar": function () {
nombre.value = $(this).val();
$(this).dialog("close");
},
"Cerrar": function () {
$(this).dialog("close");
}
}
});
$("#marco").click(function (valor) {
    
el_nombre.value = valor;
$("#dialog").dialog("option", "width", 600);
$("#dialog").dialog("option", "height", 300);
$("#dialog").dialog("option", "resizable", false);
$("#dialog").dialog("open");
});
});
</script>
</head>

<body>
Diálogo:
<div id="dialog" title="Dialogo básico">
Nombre:<input type="text" id="el_nombre" value="" />
</div>
<div id="marco">
<input type="text"  onclick="Valor({{}})"  value="1" />
<button >Abrir diálogo</button>

<input type="text"  onclick="Valor(this.value)" value="2" />
<button >Abrir diálogo</button>
</div>
</body>
</html>