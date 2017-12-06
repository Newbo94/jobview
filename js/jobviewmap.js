var map;
//Via brugerens lokation bliver mappet defineret og markers loaded
if (navigator.geolocation) {
     navigator.geolocation.getCurrentPosition(function (position) {
         initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
         map.setCenter(initialLocation);
         map.setZoom(12)
         map.setMapTypeId('roadmap');
     });
 }

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: new google.maps.LatLng(55.637618, 10.665156)
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
    '<img src="'+ imageurl +' "style="width:300px; height:300px; object-fit:cover;" ></img><div class="info"><h3>' + title +'</h3><div class="info-body">'+ shortdescription +'</div></div>';

    var infowindow = new google.maps.InfoWindow({
       content: contentString
    });

    var jobviewIcon = {
        path: 'M25.5,0.3C11.6,0.3,0.4,11.5,0.3,25.4c0,0,0,0.1,0,0.1c0,14,25.6,36.8,25.6,36.8s24.4-22.9,24.4-36.8C50.4,11.7,39.3,0.4,25.5,0.3z M25.3,34.7c-5.9,0-10.6-4.8-10.6-10.6s4.8-10.6,10.6-10.6c5.9,0,10.6,4.8,10.6,10.6S31.2,34.7,25.3,34.7z',
        fillColor: '#FCB123',
        fillOpacity: 0.95,
        scale: 0.7,
        strokeColor: '#fff',
        strokeWeight: 0,
        anchor: new google.maps.Point(12, 24)
    };

    var marker = new google.maps.Marker({
        position: feature.position,
        icon: jobviewIcon,
        map: map

    });

    marker.addListener('click', function() {
    infowindow.open(map, marker);
    });

  });

});
