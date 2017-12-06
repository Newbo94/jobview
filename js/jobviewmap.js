var map;
//Via brugerens lokation bliver mappet defineret og markers loaded
if (navigator.geolocation) {
     navigator.geolocation.getCurrentPosition(function (position) {
         initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
         map.setCenter(initialLocation);
         map.setZoom(12)
     });
 }

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: new google.maps.LatLng(50, 13)
  });
}


var features = [];

//indlæs JSON filen
jQuery.getJSON('http://hr-skyen.dk/hr/api/jobs/testvirksomhed', function(json) {
//Laver each loop som looper gennem hvert object i JSON filen
  jQuery.each(json, function(i, val) {
    if (val.locations.length > 0) {
      var new_array = { //finder de foskellige values og opretter nyt array
        position: new google.maps.LatLng(val.locations[0].latitude, val.locations[0].longitude),
        title: val.title,
        shortdescription: val.shortdescription,
        imageurl: val.frontimage


      }
      features.push(new_array); //pusher alt til nyt array features
      }
  });
//laver en forEach funktion af arrayet features, der opretter nye markers på mappet med de udvalgte punkter fra JSON feeded
  features.forEach(function(feature, index) {
    var title = features[index].title;
    var shortdescription = features[index].shortdescription;
    var imageurl = features[index].imageurl;

    var contentString =
    '<img src="'+ imageurl +'"></img><div class="info"><h3>' + title +'</h3><div class="info-body">'+ shortdescription +'</div></div>';

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
