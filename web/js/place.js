var map;

function createMarker(place) {
	var myLatlng = new google.maps.LatLng(place.latitude, place.longitude);
  var mapOptions = {
    zoom: 14,
    center: myLatlng
  };

  var contentString = '<h3 style="padding:0;margin:3px 7px;">' + place['name'] + '</h3>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      icon: '../../img/marker0.png',
  });
  infowindow.open(map,marker);
}

function initialize() {
  var myLatlng = new google.maps.LatLng(-6.886217, 107.608454);
  var mapOptions = {
    zoom: 14,
    center: myLatlng
  };

  map = new google.maps.Map(document.getElementById('map'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
  });
}

$(document).ready(function() {
	initialize();
	$.post("?", function(data) {

		for(i in data) {
			createMarker(data[i]);
		}
	});
});