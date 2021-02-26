<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <script type='text/javascript'>
    var map, watchId, userPin;

    function GetMap()
    {
        map = new Microsoft.Maps.Map('#myMap', {
            credentials: 'AhO6VkXEIQTcXbjoOjyr_NhlzmClTcjbUa8goazcGx7e7rr9exfP3QEkHGr9Xz5u'
        });

    }

    function StartTracking() {
        //Add a pushpin to show the user's location.
        userPin = new Microsoft.Maps.Pushpin(map.getCenter(), { visible: false });

        map.entities.push(userPin);

        //Watch the users location.
        watchId = navigator.geolocation.watchPosition(UsersLocationUpdated);
    }

    function UsersLocationUpdated(position) {
        var loc = new Microsoft.Maps.Location(
                    position.coords.latitude,
                    position.coords.longitude);

        //Update the user pushpin.
        userPin.setLocation(loc);
        userPin.setOptions({ visible: true });
        var center =loc;
       var infobox = new Microsoft.Maps.Infobox(
                    center, { 
                    title: "Driver 1",
                    description: 'Progress Mang, Sabar, Jangan Diintipin Bae' });
                    infobox.setMap(map);

        //Center the map on the user's location.
        map.setView({ center: loc , zoom: 18});
    }

    function StopTracking() {
        // Cancel the geolocation updates.
        navigator.geolocation.clearWatch(watchId);

        //Remove the user pushpin.
        map.entities.clear();
    }
    </script>
    <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
</head>
<body>
    <div id="myMap" style="position:relative;width:600px;height:400px;"></div><br/>
    <input type="button" value="Start Continuous Tracking" onclick="StartTracking()" />
    <input type="button" value="Stop Continuous Tracking" onclick="StopTracking()"/>
</body>
</html>