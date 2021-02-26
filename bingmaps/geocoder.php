<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
	<script type='text/javascript'>
    function GetMap() {
        Microsoft.Maps.loadModule('Microsoft.Maps.AutoSuggest', {
            callback: function () {
                var manager = new Microsoft.Maps.AutosuggestManager({
                    placeSuggestions: false
                });
                manager.attachAutosuggest('#searchBox', '#searchBoxContainer', selectedSuggestion);
            },
            errorCallback: function(msg){
                alert(msg);
            },
            credentials: 'AhO6VkXEIQTcXbjoOjyr_NhlzmClTcjbUa8goazcGx7e7rr9exfP3QEkHGr9Xz5u' 
        });
    }

    function selectedSuggestion(result) {
        //Populate the address textbox values.
        document.getElementById('addressLineTbx').value = result.address.addressLine || '';
        document.getElementById('cityTbx').value = result.address.locality || '';
        document.getElementById('countyTbx').value = result.address.district || '';
        document.getElementById('stateTbx').value = result.address.adminDistrict || '';
        document.getElementById('postalCodeTbx').value = result.address.postalCode || '';
        document.getElementById('countryTbx').value = result.address.countryRegion || '';
    }
    </script>
    <style>
        #searchBox {
            width: 400px;
        }
        
        .addressForm {
            margin-top:10px;
            background-color: #008272;
            color: #fff;
            border-radius:10px;
            padding: 10px;
        }

        .addressForm input{
            width:265px;
        }
    </style>
    <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AhO6VkXEIQTcXbjoOjyr_NhlzmClTcjbUa8goazcGx7e7rr9exfP3QEkHGr9Xz5u' async defer></script>
</head>
<body>
    <div id='searchBoxContainer'>
        <input type='text' id='searchBox'/>
    </div>

    <table class="addressForm">
        <tr><td>Street Address:</td><td><input type="text" id="addressLineTbx"/></td></tr>
        <tr><td>City:</td><td><input type="text" id="cityTbx"/></td></tr>
        <tr><td>County:</td><td><input type="text" id="countyTbx"/></td></tr>
        <tr><td>State:</td><td><input type="text" id="stateTbx"/></td></tr>
        <tr><td>Zip Code:</td><td><input type="text" id="postalCodeTbx"/></td></tr>
        <tr><td>Country:</td><td><input type="text" id="countryTbx"/></td></tr>
    </table>
</body>
</html>