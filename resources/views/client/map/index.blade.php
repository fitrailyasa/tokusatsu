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
            margin-left: 15px;
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

        .layer-title {
            font-weight: bold;
            margin-top: 5px;
        }

        .regency-item {
            display: flex;
            align-items: center;
            margin-bottom: 3px;
        }

        .regency-color {
            width: 14px;
            height: 14px;
            border: 1px solid #000;
            margin: 0 5px;
        }

        #regency-layers-container ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }
    </style>

    <div class="mt-5 mx-3 mx-md-4 pt-3">
        <div id="map"></div>
        <div class="legend-container" id="legend-container">
            <div id="legend-prov" class="legend-section"></div>
            <div id="legend-regency" class="legend-section">
                <div class="fw-bold" id="regency-legend-title"></div>
                <div id="regency-layers-container"></div>
            </div>
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

        let activeLayers = {};
        let regencyState = {};

        function updateRegencyLegend() {
            const legendTitle = document.getElementById('regency-legend-title');
            legendTitle.textContent = "Kabupaten/Kota";
            const container = document.getElementById('regency-layers-container');
            container.innerHTML = "";

            for (const provName in activeLayers) {
                const {
                    layer,
                    colorMap
                } = activeLayers[provName];

                const provTitle = document.createElement('div');
                provTitle.classList.add('layer-title');
                provTitle.textContent = 'Provinsi ' + provName;
                container.appendChild(provTitle);

                const ul = document.createElement('ul');

                layer.eachLayer(function(featureLayer) {
                    if (!featureLayer.feature || !featureLayer.feature.properties) return;

                    const props = featureLayer.feature.properties;
                    const regencyName = props.WADMKK || "N/A";
                    const color = colorMap[regencyName] || '#3388ff';

                    const li = document.createElement('li');
                    li.classList.add('regency-item');

                    const uniqueKey = `${provName}__${featureLayer._leaflet_id}`;
                    if (regencyState[uniqueKey] === undefined) regencyState[uniqueKey] = true;

                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.checked = !!regencyState[uniqueKey];

                    checkbox.addEventListener('change', function() {
                        regencyState[uniqueKey] = this.checked;
                        if (featureLayer.setStyle) {
                            featureLayer.setStyle({
                                color: color,
                                opacity: this.checked ? 1 : 0,
                                fillOpacity: this.checked ? 0.6 : 0
                            });
                        }
                    });

                    if (featureLayer.setStyle) {
                        featureLayer.setStyle({
                            color: color,
                            opacity: regencyState[uniqueKey] ? 1 : 0,
                            fillOpacity: regencyState[uniqueKey] ? 0.6 : 0
                        });
                    }

                    const colorDiv = document.createElement('div');
                    colorDiv.classList.add('regency-color');
                    colorDiv.style.backgroundColor = color;

                    li.appendChild(checkbox);
                    li.appendChild(colorDiv);
                    li.appendChild(document.createTextNode(regencyName));
                    ul.appendChild(li);
                });

                container.appendChild(ul);
            }
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

            const provGeoJSON = await getGeoJSON("{{ asset('assets/geojson/province.json') }}");
            const regencyGeoJSON = await getGeoJSON("{{ asset('assets/geojson/regency.json') }}");

            const provColorMap = generateColorMap(provGeoJSON.features, "PROVINSI");
            const regencyColorMap = generateColorMap(regencyGeoJSON.features, "WADMKK");

            const provLayer = L.geoJson(provGeoJSON, {
                style: styleFeatureGenerator(provColorMap, "PROVINSI")
            }).addTo(map);

            const regencyByProv = {};
            regencyGeoJSON.features.forEach(f => {
                const provName = f.properties.WADMPR;
                if (!regencyByProv[provName]) regencyByProv[provName] = [];
                regencyByProv[provName].push(f);
            });

            const overlayMaps = [{
                group: "Batas Administrasi",
                collapsed: false,
                layers: [{
                    name: "Provinsi",
                    icon: panelCostumIconColor(provColorMap[Object.keys(provColorMap)[0]]),
                    active: true,
                    layer: provLayer
                }]
            }];

            Object.keys(regencyByProv).forEach(provName => {
                let layer = L.geoJson(regencyByProv[provName], {
                    style: f => ({
                        color: regencyColorMap[f.properties.WADMKK],
                        weight: 2,
                        fillOpacity: 0.6
                    }),
                    onEachFeature: (feature, layer) => {
                        layer.bindPopup(
                            "<b>Provinsi:</b> " + feature.properties.WADMPR + "<br>" +
                            "<b>Kabupaten/Kota:</b> " + feature.properties.WADMKK
                        );
                    }
                });

                layer.on('add', function() {
                    activeLayers[provName] = {
                        layer: layer,
                        colorMap: regencyColorMap
                    };
                    updateRegencyLegend();
                });
                layer.on('remove', function() {
                    delete activeLayers[provName];
                    updateRegencyLegend();
                });

                overlayMaps[0].layers.push({
                    name: provName,
                    icon: panelCostumIconColor(provColorMap[provName] || "#3388ff"),
                    active: false,
                    layer: layer
                });
            });

            const control = L.control.panelLayers(baseMap, overlayMaps, {
                selectorGroup: true,
                collapsibleGroups: true
            });
            map.addControl(control);

            const legendProv = document.getElementById('legend-prov');

            function updateProvLegend() {
                legendProv.innerHTML = `<div class="legend-title">Provinsi Indonesia</div>`;
                provLayer.eachLayer(f => {
                    const name = f.feature.properties.PROVINSI || "N/A";
                    const color = provColorMap[name] || "#3388ff";
                    const item = document.createElement('div');
                    item.classList.add('regency-item');
                    const colorDiv = document.createElement('div');
                    colorDiv.classList.add('regency-color');
                    colorDiv.style.backgroundColor = color;
                    item.appendChild(colorDiv);
                    item.appendChild(document.createTextNode(name));
                    legendProv.appendChild(item);
                });
            }
            updateProvLegend();
            provLayer.on('add', updateProvLegend);
            provLayer.on('remove', () => legendProv.innerHTML = "");
        });
    </script>
@endsection
