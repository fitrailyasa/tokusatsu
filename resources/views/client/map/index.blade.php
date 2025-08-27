@extends('layouts.client.app')

@section('title', 'Map')

@section('textHome', 'rounded aktif')

@section('content')

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="{{ asset('assets/maps/leaflet/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/maps/leaflet-panel-layers.css') }}">
    <style>
        #map {
            height: 100vh;
            width: 100%;
        }
    </style>

    <div class="card mx-3 mx-md-4 my-5 pt-3">
        <div id="map"></div>
    </div>

    <!-- Leaflet JS -->
    <script src="{{ asset('assets/maps/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('assets/maps/leaflet-panel-layers.js') }}"></script>
    <script src="{{ asset('assets/maps/helper.js') }}"></script>

    <script>
        async function getGeoJSON(url) {
            const response = await fetch(url);
            return await response.json();
        }

        function panelCostumIcon(iconUrl) {
            let img = document.createElement("img");
            img.src = iconUrl;
            img.style.width = "16px";
            img.style.height = "16px";
            return img;
        }

        function panelCostumIconColor(color) {
            let div = document.createElement("div");
            div.style.width = "16px";
            div.style.height = "16px";
            div.style.backgroundColor = color;
            div.style.border = "1px solid #000";
            return div;
        }

        function featureCostumIcon(iconUrl) {
            return L.icon({
                iconUrl: iconUrl,
                iconSize: [24, 24]
            });
        }

        var map = L.map('map').setView([-2.5, 118], 5);

        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var esriWorldImagery = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Esri World Imagery'
            });

        var esriStreets = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Esri Streets'
            });

        var baseMap = [{
                name: "OpenStreetMap",
                layer: osm
            },
            {
                name: "Esri World Imagery",
                layer: esriWorldImagery
            },
            {
                name: "Esri Streets",
                layer: esriStreets
            }
        ];

        async function initializeMaps() {
            overlayMaps = [{
                group: "Batas Administrasi Umum",
                collapsed: false,
                layers: [{
                        name: "Batas Administrasi Provinsi",
                        icon: panelCostumIconColor(getRandomColorForPolygon()),
                        legend: true,
                        active: true,
                        legendProperties: {
                            title: "Provinsi Indonesia",
                            field: "Provinsi",
                        },
                        layer: L.geoJson(await getGeoJSON(
                            "{{ asset('assets/geojson/province.json') }}"
                        ), {
                            style: styleFeature,
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.PROVINSI) {
                                    layer.bindPopup("<b>Provinsi:</b> " + feature.properties
                                        .PROVINSI);
                                }
                            }
                        })
                    },
                    {
                        name: "Batas Administrasi Kabupaten/Kota",
                        icon: panelCostumIconColor(getRandomColorForPolygon()),
                        legend: true,
                        active: false,
                        legendProperties: {
                            title: "Kabupaten/Kota Indonesia",
                            field: "Kabupaten/Kota",
                        },
                        layer: L.geoJson(await getGeoJSON(
                            "{{ asset('assets/geojson/regency.json') }}"
                        ), {
                            style: styleFeature,
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.WADMKK) {
                                    layer.bindPopup("<b>Kabupaten/Kota:</b> " + feature
                                        .properties
                                        .WADMKK);
                                }
                            }
                        })
                    },
                ]
            }, ];

            var control = L.control.panelLayers(baseMap, overlayMaps, {
                selectorGroup: true,
                collapsibleGroups: true
            });
            map.addControl(control);
        }

        initializeMaps();
    </script>
@endsection
