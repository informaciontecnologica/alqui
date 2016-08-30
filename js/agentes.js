/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var app = angular.module('myApp', []);


app.controller('customersCtrl', function ($scope, $http, $filter) {
    
$scope.Listado = true;    
$scope.formfoto=false;  

$scope.archivo="noimage.png";

 
    $http.get("controles/Get_all_avatar.php").success(function (response) {

        $scope.avatares = response.avatar;
    });
    
    $http.get("controles/personas.php").success(function (response) {

        $scope.personas = response.personas;
    });

// ***********************   Consulta de pais, provinica, departamento , muniicpio , ciudad , barrio 
    $http.get("controles/Get_all_pais.php").success(function (response) {
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

    $http.get("controles/personas_usuarios.php").success(function (response) {
        $scope.usuarios = response.personasusuario;
    });


    $scope.Estado = function (ver) {
        if (ver == 'Nuevo') {
            $scope.limpiarCampos();
            $scope.Nuevo = true;
            $scope.Listado = false;
            $scope.formfoto=false;  

        }
        if (ver == 'Listado') {
            $scope.Nuevo = false;
            $scope.Listado = true;
            $scope.formfoto=false;  
        }

    };


    $scope.perfiles = [
        {name: 'Administrador', id: '1'},
        {name: 'Gerencia', id: '2'},
        {name: 'Analista', id: '3'},
        {name: 'Usuario', id: '4'},
        {name: 'Propietario', id: '5'},
        {name: 'Nulo', id: '6'}
    ];
    $scope.userInit = function (uid, role) {
        $scope.user = uid;
        $scope.role = role;
        // Get a list of projects for user
//        $scope.projectList($scope.user);
    };
    $scope.numero = 0;
    $scope.edit = true;
    $scope.error = false;
    $scope.incomplete = false;

    $scope.cancelar = function () {
        $scope.edit = true;
        $scope.nacimiento = '';
    };
    $scope.editUser = function (id, idper, idusuario) {
        $scope.usuari = $filter('filter')($scope.usuarios, {id_usuario: idusuario});
        $scope.usuario=$scope.usuari[0].nombre;
        
        if (idper > 0) {
            $scope.Nuevo = true;
            $scope.Listado = false;
            $scope.Editar = false;
           
            $http.get("controles/Get_all_avatar.php").success(function (response) {
              $scope.avatares = response.avatar;
                });
                $scope.Regfoto=$filter('filter')($scope.avatares, {idpersonas: idper});
                 console.log($scope.Regfoto);     
                if  (angular.equals($scope.Regfoto,[])){
               $scope.archivo='noimage.png';
                } else {
                    $scope.archivo=$scope.Regfoto[0].foto;
                }
            
            $scope.registro = $filter('filter')($scope.personas, {idpersonas: idper});
            
            $scope.idpersonas = $scope.registro[0].idpersonas;
            $scope.documento = $scope.registro [0].documento;
            $scope.nombre = $scope.registro[0].nombre;
            $scope.apellido = $scope.registro[0].apellido;
            $scope.nacimiento = $scope.registro[0].nacimiento;
            $scope.direccion = $scope.registro[0].direccion;
            $scope.telefono = $scope.registro[0].telefono;
            $scope.mail = $scope.registro[0].mail;
            $scope.pais = $scope.registro[0].idpais;
            $scope.CambioPais();
            $scope.provincia = $scope.registro[0].idprovincia;
            $scope.CambioProvincia();
            $scope.departamento = $scope.registro[0].iddepartamento;
            $scope.CambioDepartamento();
            $scope.municipio = $scope.registro[0].idmunicipio;
            $scope.CambioMunicipio();
            $scope.ciudad = $scope.registro[0].idciudad;
            $scope.CambioCiudad();
            $scope.barrio = $scope.registro[0].idbarrio;
            //**** 
            // ingresa la seleccion de select
            $scope.perfil = $scope.usuarios[id].idperfil;
            $scope.idusuario =   idusuario;
            

        } else {
           console.log('asd');
            $scope.archivo='noimage.png';
            $scope.Listado = false;
            $scope.Nuevo = true;
            $scope.Editar = true;
            $scope.limpiarCampos();
            $scope.usuario=$scope.usuari[0].nombre;
            $scope.idusuario =   idusuario;
        }

    };
    $scope.limpiarCampos = function () {
//        $scope.idusuario=idusuario;
        $scope.idpersonas = '';
        $scope.usuario='';
        $scope.documento = '';
        $scope.nombre = '';
        $scope.apellido = '';
        $scope.nacimiento = '';
        $scope.direccion = '';
        $scope.telefono = '';
        $scope.mail = '';
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
        $scope.perfil = '4';
    };
    $scope.Avatar = function (idper,idusuario,nombre){
        $http.get("controles/Get_all_avatar.php").success(function (response) {
        $scope.avatares = response.avatar;
    });
       $scope.Regfoto=$filter('filter')($scope.avatares, {idpersonas: idper});
       console.log($scope.Regfoto);
       
       if  (angular.equals($scope.Regfoto,[])){
         $('#previewing').attr('src','imagenes/Personal/fotos/avatar/noimage.png').width('150').height('150');
   } else {$scope.archivo=$scope.Regfoto[0].foto;}
 
//    var myEl = angular.element( document.querySelector( '#line' ) );
//       myEl.empty();
      $scope.idpersonas=idper;
      $scope.idusuario=idusuario;
       $scope.usuario=nombre; 
      $scope.formfoto=true;  
      $scope.Listado = false;
      $scope.Editar = true;
      $scope.Nuevo = false;
    };
});
