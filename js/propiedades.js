/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
'use strict';
var markers = [];
function mapas(){
//      var mapOptions = {
//        center: new google.maps.LatLng(-26.167002, -58.186986),
//        zoom: 13,
//        mapTypeId: google.maps.MapTypeId.ROADMAP
//    };
//    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}

function inicio(loca) {

    var mapOptions = {
        center: new google.maps.LatLng(-26.167002, -58.186986),
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);

//    document.getElementById('getValues').onclick = function () {
//        alert('Current Zoom level is ' + map.getZoom());
//    };
    var location1 = '-26.167002';
    var location2 = '-58.186986';



    var str = loca ;"document.getElementById('Localizacion').value";
    
    var n = str.search(",");
    var lat = str.substr(0, n);
    var lng = str.substr(n+1);
//    alert(lat+"-"+lng);
 
    var aa = new google.maps.LatLng(lat, lng);
    marca(aa);
//    

    function marca(location) {
        if (markers.length > 0) {
            DeleteMarkers();
        }

        var marker = new google.maps.Marker({
            position: location,
            map: map,
            title: 'Click me'
//        icon: 'http://gmaps-samples.googlecode.com/svn/trunk/markers/blue/blank.png'
        });


        document.getElementById('Localizacion').value = location.lat() + "," + location.lng();
        //Add marker to the array.
        markers.push(marker);
    }


    google.maps.event.addListener(map, 'click', function (e) {
        marca(e.latLng);

    });

 

}
function DeleteMarkers() {
    //Loop through all the markers and remove
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
    markers = [];
};
google.maps.event.addDomListener(window, 'load', map);
//*************************



//var myApp = angular.module('myApp', ['uiGmapgoogle-maps']);
var myApp = angular.module('myApp', []);
myApp.controller('customersCtrl', function ($scope, $http, $log, $filter) {
    

 $scope.alquilerEstado= function (){
       $http.post("controles/Get_Propiedad_alquileres.php", {
       }).success(function (responses) {
             $scope.alquileres = responses.Propiedad_alquileres;
        });  
};

  //*** fotos ***
      $scope.buscarFoto = function(idpropiedad){
         $http.post("controles/Get_foto.php", {
             idpropiedad: idpropiedad 
              }).success(function (responses) {
             $scope.Rfotos = responses.fotopropiedad;
           });
      };
   
    //******
    
          $scope.DetaAlquiler = function(idpropiedad){
         $http.post("controles/Get_foto.php", {
             idpropiedad: idpropiedad 
              }).success(function (responses) {
             $scope.Rfotos = responses.fotopropiedad;
           });
      };
      
      //*********************
    
    $scope.Listado = true;
    $scope.cancelar = false;
    $scope.registros= false;
    $scope.Listafoto=false;

    $http.get("controles/Get_propiedades.php").success(function (response) {
        $scope.propiedades = response.propiedad;
    });


    $http.get("controles/Get_tipo_propiedad.php").success(function (response) {
        $scope.Tipopropiedades = response.Tipo_propiedad;
    });


 $scope.grabar = function (){
       $scope.registros = false;
        $scope.Listado = true;
        $scope.Listafoto=false;
 };
 


    $scope.editar = function (idpropiedad) {
        // Shows/hides the delete button on hover
        $scope.ver = false;
        $scope.nuevo = false;
        $scope.BotonCan = false;
        VerRegistro(idpropiedad);
        $scope.registros = true;
        $scope.Listado = false;
        $scope.BotonModificar = true;
        $scope.BotonAgregar = false;
        $scope.idpropiedad = idpropiedad;
        $scope.titulo = 'prueba';
        $scope.Listafoto=false;
        
    };
    $scope.fotos = function (idpropiedad){
//        $scope.editar=false;
        $scope.registros =false;
        $scope.Listado = false;
//        $scope.nuevo = false;
        $scope.Listafoto=true;
        $scope.propiedad=idpropiedad;
        $scope.buscarFoto(idpropiedad);
    };
  
    $scope.Nuevo = function () {
        // Shows/hides the delete button on hover
        $scope.Listafoto=false;
        $scope.Listado = false;
        $scope.BotonCan = true;
        VerRegistro(-1);
        $scope.registros = true;
        $scope.BotonModificar = false;
        $scope.BotonAgregar = true;
    };
    
    $scope.cancelar = function () {
        // Shows/hides the delete button on hover
        $scope.ver = true;
        $scope.BotonCan = false;

    };
    $scope.submitForm = function () {
        $http({
            method: 'POST',
            url: 'basepropiedades.php',
            data: param($scope.formData), // pass in data as strings
            headers: {'Content-Type': 'application/x-www-form-urlencoded'} // set the headers so angular passing info as form data (not request payload)
        });

    };
    $scope.Contenido = function () {
        $scope.registros = false;
        $scope.Listado = true;
        $scope.Listafoto = false;
        
        
    };


    
    
    // ***********************   Consulta de pais, provinica, departamento , muniicpio , ciudad , barrio 
    $http.get("controles/get_all_pais.php").success(function (response) {
        $scope.paises = response.pais;
    });


//      CAmbio PAis
    $scope.CambioPais = function () {
        $http.post("controles/Get_provincia.php",
                {pais: $scope.pais
                }).success(function (responses) {
            $scope.provincias = responses.provincia;

        });
//        console.log($scope.pais);

    };
//    Cambio Provinica
    $scope.CambioProvincia = function () {
        $http.post("controles/Get_departamento.php", {
            pais: $scope.pais,
            provincia: $scope.provincia
        }).success(function (responses) {
            $scope.departamentos = responses.departamento;
        });

    };
//   Cambio Departamento
    $scope.CambioDepartamento = function () {
        // alert('Template is : '+$scope.departamento);

        $http.post("controles/Get_municipio.php", {
            pais: $scope.pais,
            provincia: $scope.provincia,
            departamento: $scope.departamento
        }).success(function (responses) {
            $scope.municipios = responses.municipio;

        });
    };

//    Cambio municipio
    $scope.CambioMunicipio = function () {
//                       alert('Template is : '+$scope.pais);

        $http.post("controles/Get_ciudad.php", {
            pais: $scope.pais,
            provincia: $scope.provincia,
            departamento: $scope.departamento,
            municipio: $scope.municipio}
        ).success(function (responses) {
            $scope.ciudades = responses.ciudad;

        });
    };
//    Cambio Ciudad
    $scope.CambioCiudad = function () {
//                       alert('Template is : '+$scope.pais);

        $http.post("controles/Get_barrio.php", {
            pais: $scope.pais,
            provincia: $scope.provincia,
            departamento: $scope.departamento,
            municipio: $scope.municipio,
            ciudad: $scope.ciudad

        }).success(function (responses) {
            $scope.barrios = responses.barrio;

        });
    };
//    cambio Barrio 
    $scope.CambioBarrio = function () {
//                       alert('Template is : '+$scope.pais);

        $http.post("controles/Get_barrio.php", {pais: $scope.pais, provincia: $scope.provincia,
            departamento: $scope.departamento, ciudad: $scope.ciudad}).success(function (responses) {
            $scope.barrios = responses.barrio;

        });
    };
    //***********************************************************
    
    $scope.myVar =function (id){
   
//      $filter('filter')($scope.propiedades, {idpropiedad: id});
         $scope.Ti=$filter('filter')($scope.Tipopropiedades,{idtipopropiedad:id});
         $scope.ca=$scope.Ti[0].Tipo;
 
    return true;
};
    
    
    
    function VerRegistro(id) {
        if (id >= 0) {
            $scope.rpropiedades = $filter('filter')($scope.propiedades, {idpropiedad: id});
            //`idpropiedad`, `FPublicacion`, `superficie`, `direccion`, `valor`, `Descripcion`, `banos`, `habitaciones`, `pileta`, `otros`, 
            //`tipopropiedad_id_tipoPropiedad`, `idbarrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`

            $scope.idpropiedad = $scope.rpropiedades[0].idpropiedad;
            $scope.FPublicacion = $scope.rpropiedades[0].FPublicacion; //Fecha de publicacion
            $scope.superficie = $scope.rpropiedades[0].superficie;
            $scope.direccion = $scope.rpropiedades[0].direccion;
            $scope.valor = parseFloat($scope.rpropiedades[0].valor);
            $scope.Descripcion = $scope.rpropiedades[0].Descripcion;
            $scope.banos = parseFloat($scope.rpropiedades[0].banos);
            $scope.habitaciones = parseFloat($scope.rpropiedades[0].habitaciones);
            $scope.pileta = parseFloat($scope.rpropiedades[0].pileta);
            $scope.otros = $scope.rpropiedades[0].otros;
            $scope.tipopropiedad = $scope.rpropiedades[0].tipopropiedad_id_tipoPropiedad;
            $scope.localizacion = $scope.rpropiedades[0].localizacion;


            $scope.pais = $scope.rpropiedades[0].idpais;
            $scope.CambioPais();
            $scope.provincia = $scope.rpropiedades[0].idprovincia;
            $scope.CambioProvincia();
            $scope.departamento = $scope.rpropiedades[0].iddepartamento;
            $scope.CambioDepartamento();
            $scope.municipio = $scope.rpropiedades[0].idmunicipio;
            $scope.CambioMunicipio();
            $scope.ciudad = $scope.rpropiedades[0].idciudad;
            $scope.CambioCiudad();
            $scope.barrio = $scope.rpropiedades[0].idbarrio;

            var loca = $scope.localizacion;
            inicio(loca);


        }
        ;
        if (id == -1) {
            $scope.idpropiedad = '';
            $scope.FPublicacion = '';
            $scope.superficie = '';
            $scope.direccion = '';
            $scope.valor = '';
            $scope.Descripcion = '';
            $scope.banos = '';
            $scope.habitaciones = '';
            $scope.pileta = '';
            $scope.otros = '';
            $scope.tipopropiedad = '';
            $scope.localizacion = '';
            $scope.pais = '1';
            $scope.CambioPais();
            $scope.provincia = '1';
            $scope.CambioProvincia();
            $scope.departamento = '1';
            $scope.CambioDepartamento();
            $scope.municipio = '1';
            $scope.CambioMunicipio();
            $scope.ciudad = '1';
            $scope.CambioCiudad();
            $scope.barrio = '1';
        }
    }


});

