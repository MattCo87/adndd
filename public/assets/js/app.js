var mymap = L.map('map').setView([46.1655469,1.8708914], 18);
var marker = L.marker([46.1655469,1.8708914],).addTo(mymap);
marker.bindPopup("<b>Ah! D & Dédé</b><br>22 Avenue de la Senatorerie, 23000 Guéret").openPopup();
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoibmljb2xhc3ZhdWNoZSIsImEiOiJja2YybDFleDcwdnNvMnNtajIweHhiMnkyIn0.XY8fFHFVAqUF2OiKpnH9-g'
}).addTo(mymap);