<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
	<script type='text/javascript'>
    var map;

    function GetMap() {
        map = new Microsoft.Maps.Map('#myMap', {});

        Microsoft.Maps.loadModule('Microsoft.Maps.AutoSuggest', function () {
            var manager = new Microsoft.Maps.AutosuggestManager({ map: map });
            manager.attachAutosuggest('#searchBox', '#searchBoxContainer', selectedSuggestion);
        });
    }

    function selectedSuggestion(result) {
        //Remove previously selected suggestions from the map.
        map.entities.clear();

        //Show the suggestion as a pushpin and center map over it.
        var pin = new Microsoft.Maps.Pushpin(result.location);
        map.entities.push(pin);
        map.setView({ bounds: result.bestView });
        console.log(result.location);
    }
    </script>
    <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AhO6VkXEIQTcXbjoOjyr_NhlzmClTcjbUa8goazcGx7e7rr9exfP3QEkHGr9Xz5u' async defer></script>
</head>
<body>
    <div id='searchBoxContainer'>
        <input type='text' id='searchBox'/>
    </div>

    <div id="myMap" style="position:relative;width:400px;height:300px;"></div>
</body>
</html>