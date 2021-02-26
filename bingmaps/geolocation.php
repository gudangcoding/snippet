<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
	<script type='text/javascript'>
    function GetMap() {
        var map = new Microsoft.Maps.Map('#myMap', {
            credentials: 'AhO6VkXEIQTcXbjoOjyr_NhlzmClTcjbUa8goazcGx7e7rr9exfP3QEkHGr9Xz5u'
        });

        
        //Request the user's location
        navigator.geolocation.getCurrentPosition(function (position) {
            var loc = new Microsoft.Maps.Location(
                position.coords.latitude,
                position.coords.longitude);

            //Add a pushpin at the user's location.
            //var pushpinOptions = {icon: 'icon.png', draggable:true};
            var pushpinOptions = { draggable:true};
            var pin = new Microsoft.Maps.Pushpin(loc,pushpinOptions);
            map.entities.push(pin);

            //Center the map on the user's location.
            map.setView({ center: loc, zoom: 18 });
        });

        //buat ambil koordinat dari geser pin
        // var pushpinOptions = { draggable:true};
        // var pin = new Microsoft.Maps.Pushpin(map.getCenter(), pushpinOptions); 
        // pushpindragend= Microsoft.Maps.Events.addHandler(pin, 'dragend', enddragDetails);  
        // map.entities.push(pin);

    }
    </script>
    <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
</head>
<body>
    <div id="myMap" style="position:relative;width:600px;height:400px;"></div>
</body>
</html>