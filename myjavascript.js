// JavaScript Document

// o kwdikas gia ton xarti opos dinetai sto google maps
var map;
var marker;
function initialize1() {
  var mapOptions = {
    zoom: 14,
    center: new google.maps.LatLng(38.246093, 21.735083)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
	  
  addmarkers();
}


function initialize2() {
  var mapOptions = {
    zoom: 14,
    center: new google.maps.LatLng(38.246093, 21.735083)
  };
  
   map = new google.maps.Map(document.getElementById('map-canvas2'),
      mapOptions);
	  
   // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);
									   
 						   

    document.getElementById("lng").value=pos.lng();
	document.getElementById("lat").value=pos.lat();
	
       addMarker(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
  
  google.maps.event.addListener(map, 'click', function(event) {
    addMarker(event.latLng);
  });
 
}
 
 
 // synartisi gia na prosthetei markers  
function addMarker(location) {
var oldmarker=marker;
  marker = new google.maps.Marker({
    position: location,
    map: map
  });
  oldmarker.setMap(null);
 
  document.getElementById("lng").value=location.lng();
	document.getElementById("lat").value=location.lat();
}   
   
function addMarker2() {

 var location= new google.maps.LatLng(document.getElementById("lat").value,document.getElementById("lng").value);
 
var oldmarker=marker;
  marker = new google.maps.Marker({
    position: location,
    map: map
  });
  oldmarker.setMap(null);
 
  
}      


function addMarker3( vlat,vlng,perigrafi) {

 var location= new google.maps.LatLng(vlat,vlng);


 
  var marker3 = new google.maps.Marker({
    position: location,
    map: map
  });
 
	var txt='<font color=red>'+perigrafi+'</font>';
	var infoWindow = new google.maps.InfoWindow({
                content: txt
            });

            google.maps.event.addListener(marker3, 'click', function () {
                infoWindow.open(map, marker3);
            });
 
 
  
}      
   
   
// synartisi gia na dosei to option tou geolocation   
function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(38.246093, 21.735083),
    content: content
  };

  addMarker(new google.maps.LatLng(38.246093, 21.735083));
  map.setCenter(options.position);
}






function initialize3() {
  var mapOptions = {
    zoom: 14,
	
  };

 
   if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

     marker = new google.maps.Marker({
        map: map,
        position: pos,
      });
      document.getElementById('mikos').value=pos.lng();
	   document.getElementById('platos').value=pos.lat();
      map.setCenter(pos);
    }, function() {
       map.setCenter(new google.maps.LatLng(38.020078, 23.799443));
	   document.getElementById('mikos').value=23.799443;
	   document.getElementById('platos').value=38.020078;
    });
  } else {
      map.setCenter(new google.maps.LatLng(38.020078, 23.799443));
	   document.getElementById('mikos').value=23.799443;
	   document.getElementById('platos').value=38.020078;
  }
  
 
  map = new google.maps.Map(document.getElementById('map2'), mapOptions);
   google.maps.event.addListener(map, 'click', function(event) {
    addmarker4(event.latLng);
  });
}

function addmarker4(location)
{
 document.getElementById('mikos').value=location.lng();
	   document.getElementById('platos').value=location.lat();
	  
	   marker.setMap(null);
  marker = new google.maps.Marker({
        map: map,
        position: location
      });

}

function change()
{
pos=new google.maps.LatLng(document.getElementById('platos').value,document.getElementById('mikos').value);
addmarker3(pos)

}



// synartisi ajax
function ajax() {
 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("ajax_div").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","ajax.php",true);
  xmlhttp.send();
}
