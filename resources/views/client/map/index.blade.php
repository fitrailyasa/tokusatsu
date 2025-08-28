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

        .legend-container {
            position: absolute;
            bottom: 20px;
            left: 25px;
            background: rgba(255, 255, 255, 0.95);
            padding: 10px;
            border-radius: 8px;
            max-height: 300px;
            overflow-y: auto;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            font-size: 14px;
            color: #000;
            z-index: 1000;
        }

        .legend-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 3px;
            color: #000;
        }

        .legend-color {
            width: 16px;
            height: 16px;
            border: 1px solid #000;
            margin-right: 5px;
        }
    </style>

    <div class="mt-5 mx-3 mx-md-4 pt-3">
        <div id="map"></div>
        <div class="legend-container" id="legend-container">
            <div id="legend-prov" class="legend-section"></div>
            <div id="legend-regency" class="legend-section"></div>
        </div>
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

        function panelCostumIconColor(color) {
            let div = document.createElement("div");
            div.style.width = "16px";
            div.style.height = "16px";
            div.style.backgroundColor = color;
            div.style.border = "1px solid #000";
            return div;
        }

        function generateColorMap(features, field) {
            const colors = {};
            const letters = '0123456789ABCDEF';
            features.forEach(f => {
                const name = f.properties[field] || "N/A";
                if (!colors[name]) {
                    let color = "#";
                    for (let i = 0; i < 6; i++) color += letters[Math.floor(Math.random() * 16)];
                    colors[name] = color;
                }
            });
            return colors;
        }

        function styleFeatureGenerator(colorMap, field) {
            return function(feature) {
                const name = feature.properties[field] || "N/A";
                return {
                    color: colorMap[name],
                    weight: 2,
                    fillOpacity: 0.6
                };
            }
        }

        function updateLegend(layer, container, title, field, colorMap) {
            container.innerHTML = `<div class="legend-title">${title}</div>`;
            layer.eachLayer(f => {
                if (f.feature && f.feature.properties) {
                    const name = f.feature.properties[field] || "N/A";
                    const color = colorMap[name] || "#3388ff";

                    const item = document.createElement('div');
                    item.classList.add('legend-item');

                    const colorDiv = document.createElement('div');
                    colorDiv.classList.add('legend-color');
                    colorDiv.style.backgroundColor = color;

                    item.appendChild(colorDiv);
                    item.appendChild(document.createTextNode(name));

                    container.appendChild(item);
                }
            });
        }

        document.addEventListener('DOMContentLoaded', async function() {
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

            // Load GeoJSON
            const provGeoJSON = await getGeoJSON("{{ asset('assets/geojson/province.json') }}");
            const regencyGeoJSON = await getGeoJSON("{{ asset('assets/geojson/regency.json') }}");

            // Generate color maps
            const provColorMap = generateColorMap(provGeoJSON.features, "PROVINSI");
            const regencyColorMap = generateColorMap(regencyGeoJSON.features, "WADMKK");

            const provLayer = L.geoJson(provGeoJSON, {
                style: styleFeatureGenerator(provColorMap, "PROVINSI")
            }).addTo(map);
            const regencyLayer = L.geoJson(regencyGeoJSON, {
                style: styleFeatureGenerator(regencyColorMap, "WADMKK")
            });

            // Bind popup
            provLayer.eachLayer(layer => {
                layer.bindPopup("<b>Provinsi:</b> " + layer.feature.properties.PROVINSI);
            });
            regencyLayer.eachLayer(layer => {
                layer.bindPopup("<b>Kabupaten/Kota:</b> " + layer.feature.properties.WADMKK);
            });

            // Overlay for Panel Layers
            const overlayMaps = [{
                group: "Batas Administrasi Umum",
                collapsed: false,
                layers: [{
                        name: "Provinsi",
                        icon: panelCostumIconColor(provColorMap[Object.keys(provColorMap)[0]]),
                        active: true,
                        layer: provLayer
                    },
                    {
                        name: "Kabupaten/Kota",
                        icon: panelCostumIconColor(regencyColorMap[Object.keys(regencyColorMap)[
                            0]]),
                        active: false,
                        layer: regencyLayer
                    }
                ]
            }];

            const control = L.control.panelLayers(baseMap, overlayMaps, {
                selectorGroup: true,
                collapsibleGroups: true
            });
            map.addControl(control);

            // Legend containers
            const legendProv = document.getElementById('legend-prov');
            const legendRegency = document.getElementById('legend-regency');

            updateLegend(provLayer, legendProv, "Provinsi Indonesia", "PROVINSI", provColorMap);
            provLayer.on('add', () => updateLegend(provLayer, legendProv, "Provinsi Indonesia", "PROVINSI",
                provColorMap));
            provLayer.on('remove', () => legendProv.innerHTML = "");

            regencyLayer.on('add', () => updateLegend(regencyLayer, legendRegency, "Kabupaten/Kota Indonesia",
                "WADMKK", regencyColorMap));
            regencyLayer.on('remove', () => legendRegency.innerHTML = "");
        });
    </script>
@endsection
