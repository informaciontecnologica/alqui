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
        zoom: 13,
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
google.maps.event.addDomListener(window, 'load', inicio);
//*************************

 $(document).ready(function () {
                $('#coin-slider').coinslider({
                    delay: 5000,
                    hoverPause: false,
                    navigation: true,
                    width: 550,
                    height: 290
                });
            });