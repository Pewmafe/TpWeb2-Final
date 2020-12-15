/************************MAPA**********************************/
function moveMapToArgentina(map) {
    map.setCenter({ lat: -34.60372097922263, lng: -58.38157026170721 });
    map.setZoom(12);
}

/**
 * Boilerplate map initialization code starts below:
 */

//Step 1: initialize communication with the platform
// In your own code, replace variable window.apikey with your own apikey
var platform = new H.service.Platform({
    apikey: 'NDO-x9Q1-wRAQe2VukMxSHEhNY4ue8C5Y9ESpD_XwCk'
});
var defaultLayers = platform.createDefaultLayers();

//Step 2: initialize a map - this map is centered over Europe
var map = new H.Map(document.getElementById('map'),
    defaultLayers.vector.normal.map, {
        center: { lat: 50, lng: 5 },
        zoom: 4,
        pixelRatio: window.devicePixelRatio || 1
    });
// add a resize listener to make sure that the map occupies the whole container
window.addEventListener('resize', () => map.getViewPort().resize());

//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Create the default UI components
var ui = H.ui.UI.createDefault(map, defaultLayers);

function addMarkersToMap(map, lat, lng) {
    var argentinaMarker = new H.map.Marker({lat: lat, lng: lng});
    map.addObject(argentinaMarker);
}

function partidaYDestino(map, lat, lng , letra){

    var svgMarkup = '<svg width="24" height="24" ' +
        'xmlns="http://www.w3.org/2000/svg">' +
        '<rect stroke="white" fill="#1b468d" x="1" y="1" width="22" ' +
        'height="22" /><text x="12" y="18" font-size="12pt" ' +
        'font-family="Arial" font-weight="bold" text-anchor="middle" ' +
        'fill="white">'+ letra +'</text></svg>';

    var icon = new H.map.Icon(svgMarkup),
        coords = {lat: lat, lng: lng},
        marker = new H.map.Marker(coords, {icon: icon});
    map.addObject(marker);
}

window.onload = function () {
    moveMapToArgentina(map);
    alert(document.getElementById("latitud_partida").value);
    lat = document.getElementById("latitud_partida").value;
    lng = document.getElementById("longitud_partida").value;
    lat2 = document.getElementById("longitud_destino").value;
    lng2 = document.getElementById("longitud_destino").value;
    partidaYDestino(map, lat, lng , "P");
    partidaYDestino(map, lat2, lng2, "D");
    addMarkersToMap(map, lat2, lng2);
}


/********/

// Create an icon, an object holding the latitude and longitude, and a marker:
var icon = new H.map.Icon('../img/camionardo.ico');
coords = { lat: -34.6050, lng: -58.3836 },
    marker = new H.map.Marker(coords, { icon: icon });

// Add the marker to the map and center the map at the location of the marker:
map.addObject(marker);