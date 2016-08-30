/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $('#mama').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('.modal-title').text('Nuevo Diseño');
//  modal.find('.modal-body input').val(recipient);
        modal.find('.modal-body img').attr('src', recipient);
//     modal.find('.modal-body p').text( recipient);
        var foto = button.data('foto');
        var idpropiedad = button.data('idpropiedad');
        modal.find('.modal-body span').text(foto);

        $("#borrar").click(function () {

            $.ajax({
                type: "POST", // HTTP method POST or GET
                url: "controles/clase_borrarfoto.php", //Where to make Ajax calls
//            dataType:"json", // Data type, HTML, json etc.
                data: {foto: foto, idpropiedad: idpropiedad}, //Form variables
                success: function (response) {
                    //on success, hide  element user wants to delete.
                    console.log(response);
//                 $( "#dialog" ).dialog();

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //On error, we alert user
                    alert(thrownError);
                }
            });
        });
    });


    $('#DetaAlquile').on('show.bs.modal', function (event) {

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
//            alert(datestring);



        if ((estado == 'libre')) {

            
            

            modal.find('.modal-title').text('Libreaaa');

            $.ajax({
                type: "GET",
                url: 'libre.php',
                success: function (data) {
                    modal.find('.modal-body').html(data);
                    modal.find('#precio').val(monto);
                    modal.find('#fecha').val(datestring);
                    modal.find('#idpropiedad').val(idpropiedad);
                $('#alquilarpropiedad').submit(function(event){
                
                var idpropiedad = 1;
                var fecha = '2016-10-15';
                var precio = 144444;
                var idpersonas = 2;
                $.ajax({
                    type: "POST",
                    url: "controles/alquilarpropiedad.php",
                    data: {idpropiedad: idpropiedad, fecha: fecha, precio: precio, idpersonas: idpersonas},
                    success: function (data) {
                        console.log(data); // John

                    }

                });
            });
                }
            });




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
        if (estado == 'alquilado') {
            modal.find('.modal-title').text('Propiedad Alquilada ');

            var fechainicio = "2016-11-11";
            var fechafinal = "2017-11-11";
            var cadena = 'Fecha de inicio' + fechainicio + ' y Fecha fin de contrato: ' + fechafinal;
            modal.find('.modal-body').text(cadena);

        }
    });

    $('#dialogo').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget); // Button that triggered the modal
        var idpropiedad = button.data('idpropiedad');
        var valor = button.data('valor');
        var fecha = button.data('fecha');
        var encabezado = button.data('encabezado');
        var cuerpo = button.data('cuerpo');
//    var mydata = $( "#Aceptar" ).data();
        var modal = $(this);
        modal.find(".modal-title").text(encabezado);
        var txt1 = "<p>$" + valor + "</p>";              // Create text with HTML
        var txt2 = $("<p></p>").text(valor);  // Create text with jQuery
        var txt3 = document.createElement("p");
        txt3.innerHTML = "Text.";               // Create text with DOM
        modal.find(".modal-body span").text(idpropiedad + '-' + valor + '-' + encabezado);

    });

// $('subscribe-email-form').on('submit', function(e){
//            e.preventDefault();
//  if ($('#search-box').val() != '') {
//        if ($('#precio').val() != '') {
//            if ($('#fecha').val() != '') {
//                $('.modal-body ').append($('#search-box').val());
//                $('#dialogo').modal('show');
//            }
//
//        }
//    }

    $('#alquilarpropiedad').on('submit', function (e) {
        e.preventDefault();
        alert('sdfsfs');
        var precio = $('#formulario #precio').val();
        var locador = $('#formulario #search-box').val();
        var fecha = $('#formulario #fecha').val();
        var locatario = $('#formulario #locatario').text();
        var direccion = $('#formulario #direccion').text();


        var message = '<p>El locador <strong>' + locador + '</strong> alquila su Casa/Departamento/terreno sito en la direccion:<strong>'
                + direccion + '</strong> al locatario:<strong>' + locatario
                + '</strong> dando inicio el contrato en la fecha:<strong>' + fecha + '</strong> el importe mensual sera de <strong>$ ' + precio + '</strong></p>';
        $("#subscription-confirm .modal-body").html(!message ? "" : message);
        $('#subscription-confirm').modal('show');



    });


    $('#subscription-confirm #guardar').click(function () {
        $.ajax({
            url: 'controles/gestionalquiler.php',
            type: 'POST',
            data: $('#formulario').serialize(),
            success: function (data) {
                alert(data);
                $('#subscription-confirm').modal('hide');
//                     $('#DetaAlquiler').modal('hide'); 
            }
        });
    });

    function PopUp(title, message, oktext, okfunction, canceltext, cancelfunction) {
        var $myModal = $('#myModal');
        $("#myModal .modal-title").html(!title ? "<br />" : title);
        $("#myModal .modal-body").html(!message ? "" : message);
        var $myModalFooter = $("#myModal .modal-footer").empty();
        if (canceltext) {
            if (!(typeof (cancelfunction) === 'function')) {
                cancelfunction = function () {
                    $myModal.modal('hide');
                };
            }
            $myModalFooter.append('<button id="cancelfunction" type="button" class="btn btn-default">' + canceltext + '</button>');
            $("#cancelfunction").on("click", function () {
                cancelfunction();
                return false;
            });
        }
        if (oktext) {
            if (!(typeof (okfunction) === 'function')) {
                okfunction = function () {
                    $myModal.modal('hide');
                };
            }
            $myModalFooter.append('<button id="okfunction" type="button" class="btn btn-primary">' + oktext + '</button>');
            $("#okfunction").on("click", function () {
                okfunction();
                return false;
            });
        }
        $myModal.modal('show');
    }
    ;
});