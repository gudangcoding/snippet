<!DOCTYPE html>
<html>
<head>
    <title>pushpinDragEventsHTML</title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <style type='text/css'>body{margin:0;padding:0;overflow:hidden;font-family:'Segoe UI',Helvetica,Arial,Sans-Serif}</style>
</head>
<body>
    <div id='printoutPanel'></div>

    <div id='myMap' style='width: 100vw; height: 100vh;'></div>
    <script type='text/javascript'>

        
        function loadMapScenario() {
        var map=new Microsoft.Maps.Map(document.getElementById('myMap'), {});
        //Request the user's location
        navigator.geolocation.getCurrentPosition(function (position) {
            var loc = new Microsoft.Maps.Location(position.coords.latitude,position.coords.longitude);

            var center  =loc;
            //var center  =map.getCenter();
            var Events  =Microsoft.Maps.Events;
            var Location=Microsoft.Maps.Location;
            var Pushpin =Microsoft.Maps.Pushpin;
            var pins=[
                    new Pushpin(new Location(center.latitude, center.longitude), { color: '#00F', draggable: true }),
                ];
            
                 // Setting up the pin_coordinates printout panel
                document.getElementById('printoutPanel').innerHTML='<div id="pushpinDragEnd">' + center +'</div>';      
                console.log(center);
                
                var infobox=new Microsoft.Maps.Infobox(
                    center, { 
                    title: "Lokasi Saya",
                    description: 'Initail Lable' });
                    infobox.setMap(map);
                
                
                map.entities.push(pins);

                // Binding the events for the pin
                Events.addHandler(pins[0], 'dragend', function () {  displayPinCoordinates('pushpinDragEnd'); });


                function displayPinCoordinates(id) {
                        infobox.setMap(null); // delete infobox
                        var pin_location=pins[0].getLocation();
                    
                        document.getElementById(id).innerHTML=pin_location;   // display pin coordinates in printout panel
                        
                        // display dragged infobox
                        infobox=new Microsoft.Maps.Infobox(
                            pin_location, { 
                            title: 'Pin Center',
                            description: 'Dragable Lable' });
                            infobox.setMap(map);
                }

            //Center the map on the user's location.
            map.setView({ center: loc, zoom: 18 });
        });

        
        
        }


    </script>
    

    <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=AhO6VkXEIQTcXbjoOjyr_NhlzmClTcjbUa8goazcGx7e7rr9exfP3QEkHGr9Xz5u&callback=loadMapScenario' async defer></script>
</body>
</html>