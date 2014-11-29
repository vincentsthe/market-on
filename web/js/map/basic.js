
    var mapOptions = {
            center: new google.maps.LatLng(-6.8933215,107.6115761),
            zoom: 15
       };
    var map = new google.maps.Map(
        document.getElementById("map-canvas"),
        mapOptions
    );
    var marker = new google.maps.Marker({
        draggable: true,
        title: 'Start',
        map: map,
    });

    
    $(document).ready(function(){initialize();});
    function initialize(){
        marker.setPosition(new google.maps.LatLng(-6.8933215,107.6115761));
        google.maps.event.addListener(marker,'drag',function(e){
            //change 
            $("#lat").val(marker.getPosition().lat());
            $("#lng").val(marker.getPosition().lng());
        });
    }
