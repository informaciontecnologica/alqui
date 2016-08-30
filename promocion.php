
<?php
//include 'controles/cabezera.php';
//include 'controles/funciones.php';
//include'controles/cookies.php';
?>

<script>
$('#DetaAlquiler').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget); // Button that triggered the modal
        var idpropiedad = button.data('idpropiedad');
        var descripcion = button.data('descripcion');
        var superficie = button.data('superficie');
        var monto = button.data('monto');
        var estado = button.data('estado');
        var modal = $(this);
        modal.find('input').val('');// borra los inputs
        modal.find('#descripcion').text(descripcion);
        modal.find('#direccion').text(button.data('direccion'));
        modal.find('#idpropiedad').text(idpropiedad);
        modal.find('#superficie').text(superficie);
        modal.find('#monto').text(monto);
        modal.find('#precio').val(monto);

        if (estado == 'alquilado') {
            modal.find('.modal-title').text('Propiedad Alquilada ');
            var fechainicio = "2016-11-11";
            var fechafinal = "2017-11-11";
            var cadena = 'Fecha de inicio' + fechainicio + ' y Fecha fin de contrato: ' + fechafinal;


            $('#alquiler').html(cadena);
            // cancelar el alquiler 
            // pagar la cuenta del mes 

        }
        if ((estado == 'libre') || (estado == 'promocion')) {
            // proceder a alquilarlo
            // Ver detalles


            modal.find('.modal-title').text('Alquilar propiedad');
//            


            $('#alquiler').html(cadena);
            $("#search-box").keyup(function () {
                $.ajax({
                    type: "POST",
                    url: 'autocompletarpersonas.php',
                    data: 'keyword=' + $(this).val(),
                    beforeSend: function () {
//                                                $("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                    },
                    success: function (data) {
                        $("#suggesstion-box").show();
                        $("#suggesstion-box").html(data);
                        $("#search-box").css("background", "#FFF");
                    }
                });
            });
        }
        if (estado == '') {
            modal.find('.modal-title').text('Ofertar Propiedad');

// GET CURRENT DATE
            var date = new Date();

// GET YYYY, MM AND DD FROM THE DATE OBJECT
            var yyyy = date.getFullYear().toString();
            var mm = (date.getMonth() + 1).toString();
            var dd = date.getDate().toString();

// CONVERT mm AND dd INTO chars
            var mmChars = mm.split('');
            var ddChars = dd.split('');

// CONCAT THE STRINGS IN YYYY-MM-DD FORMAT
            var datestring = yyyy + '-' + (mmChars[1] ? mm : "0" + mmChars[0]) + '-' + (ddChars[1] ? dd : "0" + ddChars[0]);

            cadena = '<p>Ofertar  </p>'
                    + '<form id="ofertar" class="form-horizontal" role="form">'
                    + '       <div class="form-group">'
                    + '           <div class="col-md-6">'
                    + '               <input type="text" class=" form-control " required="" value="' + monto + '" id="monto"  placeholder="monto" />'

                    + '              <input type="hidden" id="idpropiedad" value="' + idpropiedad + '" />'
                    + '          </div>'
                    + '      </div>'
                    + '       <div class="form-group">'
                    + '           <div class="col-md-6">'
                    + '               <input type="date" class=" form-control " value="' + datestring + '" min="2015-11-11" required="" id="fecha"  placeholder="fecha_Activa" />'

                    + '              <input type="hidden" id="idpersonas"  />'
                    + '          </div>'
                    + '      </div>'
                    + '       <div class="form-group">'
                    + '           <div class="col-md-12">'
                    + '               <input type="text" class=" form-control " required="" id="descripcion"  placeholder="Descripcion" />'

                    + '              <input type="hidden" id="idpersonas"  />'
                    + '          </div>'
                    + '      </div>'
                    + '       <div class="form-group">'
                    + '           <div class="col-md-12">'


                    + '              <input type="hidden" id="estado" value="libre" />'
                    + '          </div>'
                    + '      </div>'
                    + ' <button class="btn btn-success" id="submit">Enviar</button>'
                    + ' <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>'
                    + '</form>';

            $('#alquiler').html(cadena);
        }



//  modal.find('.modal-body input').val(recipient);
//       modal.find('.modal-body span').text('jkjkjk');
    });

</script>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Modal title</h4>

</div>

<div class="modal-body">
    <form id="alquilarpropiedad" class="form-horizontal" role="form">
        <div class="form-group">
            <div class="col-md-12">
                <input type="text" class=" form-control " required="" id="search-box"  placeholder="Apellido" />
                <div id="suggesstion-box" ></div>
                <input type="hidden" id="idpersonas"  />
            </div>
        </div>
        <div class="form-group ">
            <div class="col-md-5">
                <input type="number" class=" form-control " required="" value="154" name="precio" id="precio" placeholder="Precio de alquiler por mes" />
            </div>
        </div>
        <div class="form-group ">
            <div class="col-md-6">
                <input type="date" class=" form-control " required="" name="fecha" value="2016-12-30" id="fecha" placeholder="Fecha de inicio Contrato" />
            </div>
        </div>
        <button class="btn btn-success" id="alqui">Enviar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </form>
</div>
<div class="modal-footer"></div>

