/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function cargarPaises() {
//    $.prettyLoader();
    $.post('controles/get_all_pais.php',              
     function(data){
           if (data != "[]") {
               var item = $.parseJSON(data);
               //recorremos todas las filas del resultado del proceso que obtenemos en Json
               $("#pais").append('<option value="0"></option>');
               $.each(item, function (i, valor) {
               //introducimos los option del Json obtenido
               if (valor.nombre !== null) {
                   $("#pais").append('<option value="' + valor.id_pais + '">' + valor.pais + '</option>');     
               }
        });
}
                                return false;
    });
}
function cargarProvincia(pais) {
//    $.prettyLoader();
                $.post('controles/Get_provincia.php', {pais : pais},
                function(data){
                        if (data != "[]") {
                                        var item = $.parseJSON(data);
                                        //recorremos todas las filas del resultado del proceso que obtenemos en Json
                                                                $("#provincia").append('<option value="0"></option>');
                                        $.each(item, function (i, valor) {
                                            //introducimos los option del Json obtenido
                                            if (valor.nombre !== null) {
                                                 $("#provincia").append('<option value="' + valor.id + '">' + valor.nombre + '</option>');     
                                            }
                                        });
                          }
                          return false;
                 });
}
function cargarDepartamento(pais,provincia) {
//    $.prettyLoader();
                $.post('controles/Get_departamento.php', {pais : pais,provincia : provincia},
                function(data){
                        if (data != "[]") {
                                        var item = $.parseJSON(data);
                                        //recorremos todas las filas del resultado del proceso que obtenemos en Json
                                                                $("#departamento").append('<option value="0"></option>');
                                        $.each(item, function (i, valor) {
                                            //introducimos los option del Json obtenido
                                            if (valor.nombre !== null) {
                                                 $("#departamento").append('<option value="' + valor.id + '">' + valor.nombre + '</option>');     
                                            }
                                        });
                          }
                          return false;
                 });
}
function cargarMunicipio (pais,provincia,departamento) {
//    $.prettyLoader();
    $.post('controles/ciudad/Get_municipio.php', {pais : pais,provincia : provincia, departamento : departamento},
    function(data){
          if (data != "[]") {
          var item = $.parseJSON(data);
          //recorremos todas las filas del resultado del proceso que obtenemos en Json
          $("#municipio").append('<option value="0"></option>');
          $.each(item, function (i, valor) {
              //introducimos los option del Json obtenido
              if (valor.nombre !== null) {
                 $("#municipio").append('<option value="' + valor.id + '">' + valor.nombre + '</option>');     
              }
          });
      }
      return false;
    });
    
    }
function cargarCiudad (pais,provincia,departamento,municipio) {
//    $.prettyLoader();
    $.post('controles/ciudad/Get_ciudad.php', {pais : pais,provincia : provincia, departamento : departamento,municipio:municipio},
    function(data){
          if (data != "[]") {
          var item = $.parseJSON(data);
          //recorremos todas las filas del resultado del proceso que obtenemos en Json
          $("#ciudad").append('<option value="0"></option>');
          $.each(item, function (i, valor) {
              //introducimos los option del Json obtenido
              if (valor.nombre !== null) {
                 $("#ciudad").append('<option value="' + valor.id + '">' + valor.nombre + '</option>');     
              }
          });
      }
      return false;
    });
}

$(document).ready(function () {
    //se cargan automaticamente los paises porque no dependen de otro item
    cargarPaises();

     $( "#pais" ).change(function() {
        var idPais = $("#pais").val();  
        $("#provincia").html('');
         $("#departamento").html('');
         $("#municipio").html('');
         $("#ciudad").html('');
        cargarProvincia(idPais);
     });
      $( "#provincia" ).change(function() {
          var idPais = $("#pais").val();   
          var idProv = $("#provincia").val(); 
          $("#departamento").html('');
          $("#municipio").html('');
          $("#ciudad").html('');
          cargarDepartamento(idPais,idProv);
     }); 

     $( "#departamento" ).change(function() {
          var idPais = $("#pais").val();   
          var idProv = $("#provincia").val();
          var idDep = $("#departamento").val(); 
          $("#municipio").html('');
          $("#ciudad").html('');
          cargarMunicipio(idPais,idProv,idDep);
     });       
     $( "#municipio" ).change(function() {
          var idPais = $("#pais").val();   
          var idProv = $("#provincia").val();
          var idDep = $("#departamento").val(); 
          var idMuni = $("#municipio").val(); 
          $("#ciudad").html('');
          cargarCiudad(idPais,idProv,idDep,idMuni);
     });    

});