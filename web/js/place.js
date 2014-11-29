function initialize() {
  var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
  var mapOptions = {
    zoom: 4,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map'), mapOptions);

  var contentString = '<h5 style="padding:1px">Uluruasdasdasd</h5>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Uluru (Ayers Rock)',
      icon: 'img/marker0.png',
  });
  infowindow.open(map,marker);
}

$(document).ready(function() {
	initialize();
});