<?php
	use app\assets\CalendarAsset;
	CalendarAsset::register($this);
?>
<div id="my-calendar" data-toggle="modal" data-target="#myModal"></div>

<div id="map-meeting" style="height:300px"></div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">3 November 2014</h4>
      </div>
      <div class="modal-body">
            Transaksi dengan Vincent di Cihampelas Walk.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    function myDateFunction(id) {
        var date = $("#" + id).data("date");
        var hasEvent = $("#" + id).data("hasEvent");
        $("#myModal").show();
    }

    $(document).ready(function () {
    	var eventData = [
		    {"date":"2014-11-01","badge":false,"title":"Example 1"},
		    {"date":"2014-11-03","badge":true,"title":"Example 2"}
		];
        $("#my-calendar").zabuto_calendar({
        	//language: "en",
        	data: eventData,
            action: function() {
                myDateFunction(this.id);
            }
        });

    });

    function initializeMeeting() {
      var myLatlng = new google.maps.LatLng(-6.886217, 107.608454);
      var mapOptions = {
        zoom: 14,
        center: myLatlng
      };

      map = new google.maps.Map(document.getElementById('map-meeting'), mapOptions);

      var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
      });
    }

    function createMarkerMeeting(meeting) {
        var myLatlng = new google.maps.LatLng(meeting.latitude, meeting.longitude);

      var contentString = '<h5 style="padding:0;margin:2px 5px;">' + meeting.date + '</h5>';

      var infowindow = new google.maps.InfoWindow({
          content: contentString
      });

      var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          icon: '../../img/marker1.png',
      });
      infowindow.open(map,marker);

      google.maps.event.addListener(marker, 'click', function() {
        window.location.replace(place['url']);
      });
    }

    initializeMeeting();
    var meeting1 = {
        latitude: -6.880028,
        longitude: 107.602145,
        date: "3 November 2014, 13:00",
    };
    createMarkerMeeting(meeting1);
    var meeting1 = {
        latitude: -6.899467,
        longitude: 107.598905,
        date: "1 November 2014, 15:00",
    };
    createMarkerMeeting(meeting1);
</script>