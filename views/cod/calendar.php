<?php
	use app\assets\CalendarAsset;
	CalendarAsset::register($this);
?>
<div id="my-calendar"></div>

<div id="my-calendar"></div>

<script>
    $(document).ready(function () {
    	var eventData = [
		    {"date":"2014-11-01","badge":false,"title":"Example 1"},
		    {"date":"2014-11-03","badge":true,"title":"Example 2"}
		];
        $("#my-calendar").zabuto_calendar({
        	//language: "en",
        	data: eventData
        });
    });
</script>