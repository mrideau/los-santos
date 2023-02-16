<div {{ $attributes->merge(['class' => 'z-0 h-full']) }} id="map"></div>

@push('styles')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin=""/>
  <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css"/>
  <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css"/>

{{--  <style>--}}
{{--    #map {--}}
{{--      min-height: 500px;--}}
{{--    }--}}
{{--  </style>--}}
@endpush

@push('scripts')
  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
          integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
          crossorigin=""></script>
  <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

  <script>
    const center_x = 117.3;
    const center_y = 172.8;
    const scale_x = 0.02072;
    const scale_y = 0.0205;

    CUSTOM_CRS = L.extend({}, L.CRS.Simple, {
      projection: L.Projection.LonLat,
      scale: function (zoom) {

        return Math.pow(2, zoom);
      },
      zoom: function (sc) {

        return Math.log(sc) / 0.6931471805599453;
      },
      distance: function (pos1, pos2) {
        var x_difference = pos2.lng - pos1.lng;
        var y_difference = pos2.lat - pos1.lat;
        return Math.sqrt(x_difference * x_difference + y_difference * y_difference);
      },
      transformation: new L.Transformation(scale_x, center_x, -scale_y, center_y),
      infinite: true
    });

    const SateliteStyle = L.tileLayer('/images/mapStyles/styleSatelite/{z}/{x}/{y}.jpg', {minZoom: 0,maxZoom: 8,noWrap: true,continuousWorld: false,attribution: 'Online map GTA V',id: 'Satelite',}),
      AtlasStyle	= L.tileLayer('/images/mapStyles/styleAtlas/{z}/{x}/{y}.jpg', {minZoom: 0,maxZoom: 5,noWrap: true,continuousWorld: false,attribution: 'Online map GTA V',id: 'Atlas map',}),
      GridStyle	= L.tileLayer('/images/mapStyles/styleGrid/{z}/{x}/{y}.png', {minZoom: 0,maxZoom: 5,noWrap: true,continuousWorld: false,attribution: 'Online map GTA V',id: 'Grid map',});

    const southWest = L.latLng(8427.74, -5661.19),
      northEast = L.latLng(-4058.53, 6690.99),
      bounds = L.latLngBounds(southWest, northEast);

    const map = L.map('map', {
      crs: CUSTOM_CRS,
      maxBounds: bounds,
      minZoom: 3,
      maxZoom: 5,
      Zoom: 5,
      maxNativeZoom: 5,
      preferCanvas: true,
      layers: [SateliteStyle],
      center: [0, 0],
      zoom: 3,
      zoomControl: false
    });

    // 8427.743902439024, -5661.196911196911

    // -4058.5365853658527, 6690.999034749035

    // map.setMaxBounds(map.getBounds());

    // const layersControl = L.control.layers({ "Satelite": SateliteStyle,"Atlas": AtlasStyle,"Grid":GridStyle}).addTo(map);

    // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //   maxZoom: 19,
    //   attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    // }).addTo(map);
  </script>
@endpush
