/**
 * @fileoverview This demo is used for MarkerClusterer. It will show 100 markers
 * using MarkerClusterer and count the time to show the difference between using
 * MarkerClusterer and without MarkerClusterer.
 * @author Luke Mahe (v2 author: Xiaoxi Wu)
 */

function $(element) {
  return document.getElementById(element);
}

var Jobview = {};

Jobview.pics = null;
Jobview.map = null;
Jobview.markerClusterer = null;
Jobview.markers = [];
Jobview.infoWindow = null;

Jobview.init = function() {
  var latlng = new google.maps.LatLng(55, 12);
  var options = {
    'zoom': 8,
    'center': latlng,
    'mapTypeId': google.maps.MapTypeId.ROADMAP
  };

  Jobview.map = new google.maps.Map($('map'), options);
  Jobview.pics = data.photos;

  var useGmm = document.getElementById('usegmm');
  google.maps.event.addDomListener(useGmm, 'click', Jobview.change);

  var numMarkers = document.getElementById('nummarkers');
  google.maps.event.addDomListener(numMarkers, 'change', Jobview.change);

  Jobview.infoWindow = new google.maps.InfoWindow();

  Jobview.showMarkers();
};







Jobview.showMarkers = function() {
  Jobview.markers = [];

  var type = 1;
  if ($('usegmm').checked) {
    type = 0;
  }

  if (Jobview.markerClusterer) {
    Jobview.markerClusterer.clearMarkers();
  }

  var panel = $('markerlist');
  panel.innerHTML = '';
  var numMarkers = $('nummarkers').value;

  for (var i = 0; i < numMarkers; i++) {
    var titleText = Jobview.pics[i].photo_title;
    if (titleText === '') {
      titleText = 'No title';
    }

    var item = document.createElement('DIV');
    var title = document.createElement('A');
    title.href = '#';
    title.className = 'title';
    title.innerHTML = titleText;

    item.appendChild(title);
    panel.appendChild(item);


    var latLng = new google.maps.LatLng(Jobview.pics[i].latitude,
        Jobview.pics[i].longitude);

    var imageUrl = 'http://chart.apis.google.com/chart?cht=mm&chs=24x32&chco=' +
        'FFFFFF,008CFF,000000&ext=.png';
    var markerImage = new google.maps.MarkerImage(imageUrl,
        new google.maps.Size(24, 32));

    var marker = new google.maps.Marker({
      'position': latLng,
      'icon': markerImage
    });

    var fn = Jobview.markerClickFunction(Jobview.pics[i], latLng);
    google.maps.event.addListener(marker, 'click', fn);
    google.maps.event.addDomListener(title, 'click', fn);
    Jobview.markers.push(marker);
  }

  window.setTimeout(Jobview.time, 0);
};







/* Infowindow */

Jobview.markerClickFunction = function(pic, latlng) {
  return function(e) {
    e.cancelBubble = true;
    e.returnValue = false;
    if (e.stopPropagation) {
      e.stopPropagation();
      e.preventDefault();
    }
    var title = pic.photo_title;
    var url = pic.photo_url;
    var fileurl = pic.photo_file_url;
    var fileupload = pic.upload_date;
    var owner_id = pic.owner_id;
    var description = pic.description;
    var infoHtml = '<div class="info"><h3>' + title +
      '</h3><div class="info-body">' +
      '<h2>' + fileupload + '</h2>' +
            '<h2>' + owner_id + '</h2>' +
                '<h2>' + description + '</h2>' +
      '<a href="' + url + '" target="_blank"><img src="' +
      fileurl + '" class="info-img"/></a></div>' +
      '<a href="http://www.panoramio.com/" target="_blank">' +
      '<img src="http://maps.google.com/intl/en_ALL/mapfiles/' +
      'iw_panoramio.png"/></a><br/>' +
      '<a href="' + pic.owner_url + '" target="_blank">' + pic.owner_name +
      '</a></div></div>';

    Jobview.infoWindow.setContent(infoHtml);
    Jobview.infoWindow.setPosition(latlng);
    Jobview.infoWindow.open(Jobview.map);
  };
};





Jobview.clear = function() {
  $('timetaken').innerHTML = 'cleaning...';
  for (var i = 0, marker; marker = Jobview.markers[i]; i++) {
    marker.setMap(null);
  }
};


Jobview.change = function() {
  Jobview.clear();
  Jobview.showMarkers();
};



Jobview.time = function() {
  $('timetaken').innerHTML = 'timing...';
  var start = new Date();
  if ($('usegmm').checked) {
    Jobview.markerClusterer = new MarkerClusterer(Jobview.map, Jobview.markers, {imagePath: '../images/m'});
  } else {
    for (var i = 0, marker; marker = Jobview.markers[i]; i++) {
      marker.setMap(Jobview.map);
    }
  }

  var end = new Date();
  $('timetaken').innerHTML = end - start;
};
