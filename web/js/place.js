var map;

function createMarker(place) {
	var myLatlng = new google.maps.LatLng(place.latitude, place.longitude);

  var contentString = '<h5 style="padding:5px 0px 0 0;margin:2px;">' + place['name'] + '</h5><p style="color:#555;margin:0;padding:0 20px 5px 0;">' + place['category'] + '</p>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString,
      maxWidth:200
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      icon: '../../img/marker0.png',
  });
  infowindow.open(map,marker);

  google.maps.event.addListener(marker, 'click', function() {
    window.location.replace(place['url']);
  });
}

function initializeHome() {
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
	initializeHome();
	$.post("?", function(data) {
		for(i in data) {
			createMarker(data[i]);
		}
	});
});