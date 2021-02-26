<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
	<script type='text/javascript'>
        var map;
        var directionsManager;
        var hasil;

        function GetMap()
        {
            map = new Microsoft.Maps.Map('#myMap', {});

            //Load the directions module.
            Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
                //Create an instance of the directions manager.
                directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);

                //Specify where to display the route instructions.
                directionsManager.setRenderOptions({ itineraryContainer: '#directionsItinerary' });

                //Specify the where to display the input panel
                directionsManager.showInputPanel('directionsPanel');
                hasil = directionsManager.calculateDirections();
                console.log(hasil);
            });
        }
    </script>
    <style>
        html, body{
            padding:0;
            margin:0;
            height:100%;
        }

        .directionsContainer{
            width:380px;
            height:100%;
            overflow-y:auto;
            float:left;
        }

        #myMap{
            position:relative;
            width:calc(100% - 380px);
            height:100%;
            float:left;
        }
    </style>
   <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&setMkt=id-ID&setLang=id&key=AhO6VkXEIQTcXbjoOjyr_NhlzmClTcjbUa8goazcGx7e7rr9exfP3QEkHGr9Xz5u' async defer></script>
</head>
<body>
    <div class="directionsContainer">
        <div id="directionsPanel"></div>
        <div id="directionsItinerary"></div>
    </div>
    <div id="myMap"></div>
</body>
</html>