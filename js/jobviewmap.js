
var jobviewmap, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 50, lng: 13},
          zoom: 13
        });


infoWindow = new google.maps.InfoWindow;

        // HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

      var icon = "http://chart.apis.google.com/chart?cht=mm&chs=24x32&chco=";
      var infowindow = new google.maps.InfoWindow();

//LOADING JSON FILE START//

    $.getJSON("http://localhost:8888/wordpress/wp-content/themes/jobview/data/test-job-post.json", function(jobs) {

    $.each(jobs.jobpost, function (key, data) {

        var location = new google.maps.LatLng(jobs.latitude,jobs.longitude);

        var marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: icon,
            title: jobs.title
        });

        var details = data.shortdescription + ", " + data.contacts + ".";

        bindInfoWindow(marker, map, infowindow, details);

        });

    });

function bindInfoWindow(marker, map, infowindow, strDescription) {
    google.maps.event.addListener(marker, 'click', function () {
        infowindow.setContent(strDescription);
        infowindow.open(map, marker);
    });
}

google.maps.event.addDomListener(window, 'load', initialize);
