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
    zoom: 10,
    center: new google.maps.LatLng(55.4, 10.5)
  });
};

var jobsList;
var features = [];

jQuery.getJSON('http://hr-skyen.dk/hr/api/jobs/testvirksomhed', function(json) {

  jQuery.each(json, function(i, val) {

    var new_array = [
      lat: val.locations[0].latitude,
      lng: val.locations[0].longitude];
    features.push(new_array);

  });

});

console.table(features);

features.forEach(function(feature) {
  var marker = new google.maps.Marker({
    position: feature.position,
    map: map
  });

});
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_91mOsG6H_Ec2OwMPfwHF3jFRD1TGasM&callback=initMap"></script>
