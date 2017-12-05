<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jobview
 */

get_header();
?>
<style>
#map {
  width: 100%;
  height: 80vh;
}
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}
</style>
<div id="map"></div>
<script type="text/javascript">

var map;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: new google.maps.LatLng(55, 10)
  });
}


var features = [];


jQuery.getJSON('http://hr-skyen.dk/hr/api/jobs/testvirksomhed', function(json) {

  jQuery.each(json, function(i, val) {
    if (val.locations.length > 0) {
      var new_array = {
        position: new google.maps.LatLng(val.locations[0].latitude, val.locations[0].longitude),
        title: val.title,
        shortdescription: val.shortdescription,
        

      }
      features.push(new_array);
      }
  });

  features.forEach(function(feature, index) {
    var title = features[index].title;
    var shortdescription = features[index].shortdescription;

    var contentString = '<div class="info"><h3>' + title +
      '</h3><div class="info-body">'+ shortdescription +'</div>';

    var infowindow = new google.maps.InfoWindow({
       content: contentString
    });

    var marker = new google.maps.Marker({
        position: feature.position,
        map: map

    });

    marker.addListener('click', function() {
    infowindow.open(map, marker);
    });

  });

});
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_91mOsG6H_Ec2OwMPfwHF3jFRD1TGasM&callback=initMap"></script>
