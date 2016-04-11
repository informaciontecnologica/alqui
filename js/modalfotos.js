/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
  $("#borrar").click(function(){
 
       $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "controles/clase_borrarfoto.php", //Where to make Ajax calls
//            dataType:"json", // Data type, HTML, json etc.
            data:{foto:foto,idpropiedad:idpropiedad}, //Form variables
            success:function(response){
                //on success, hide  element user wants to delete.
                 console.log( response );
//                 $( "#dialog" ).dialog();
                    
            },
            error:function (xhr, ajaxOptions, thrownError){
                //On error, we alert user
                alert(thrownError);
            }
            });
});

});

    
