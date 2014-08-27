
$(document).ready(function() {
	$("#contact").hide();
	$("#contact").prev().hide();
	$("#object").change(function() {
		$("#otherobject").hide();
		$("#hiddenmeeting").hide();
		if ($("#object option:selected").attr("value") == "meet")
		    $("#hiddenmeeting").show();
		else if ($("#object option:selected").attr("value") == "other")
		    $("#otherobject").show();
	    });
    });

function setMaps() {
    $(".addresses .well").each(function() {
	    var id = $(this).attr('id');
	    var address = $("#" + id + " .address").text();
	    var zoom = $("#" + id + " .map .zoom").text();
	    var lat = $("#" + id + " .map .lat").text();
	    var long = $("#" + id + " .map .long").text();
	    var latlong = new google.maps.LatLng(lat, long);
	    var mapOptions = {
		center: latlong,
		zoom: parseInt(zoom, 10),
		disableDefaultUI: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	    };
	    var map = new google.maps.Map(document.getElementById(id + "map"),
					  mapOptions);
	    var marker = new google.maps.Marker({
		    position: latlong,
		    map: map,
		    title: address
		});
	});
}

function loadMapScript() {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyAz32fwKMGSJBdKIuPMxbWkP2l48Z1nlUA&sensor=false&callback=setMaps";
    document.body.appendChild(script);
}

window.onload = loadMapScript;

