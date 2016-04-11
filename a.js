/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('#myModal').on('show.bs.modal', function (event) {
//  var button = $(event.relatedTarget) // Button that triggered the modal
//  var recipient = button.data('whatever') // Extract info from data-* attributes
//////  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
//////  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-title').text('New message to ');
////////  modal.find('.modal-body input').val(recipient)
//  modal.find('.modal-body img').attr('src',recipient)
//alert('asdas');
//  
});