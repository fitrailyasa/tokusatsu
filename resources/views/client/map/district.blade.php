@extends('layouts.client.app')

@section('title', "Map $district - $regency - $province")

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/maps/leaflet/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/maps/leaflet-panel-layers.css') }}">
    <style>
        #map {
            height: 100vh;
            width: 100%;
        }

        #village-legend {
            color: #000;
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.95);
            padding: 10px;
            border-radius: 8px;
            max-height: 300px;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            font-size: 14px;
        }

        #village-legend h6 {
            margin: 0 0 5px 0;
        }

        #village-legend ul {
            margin: 0;
            padding-left: 0;
            list-style: none;
            margin-bottom: 10px;
        }

        .village-item {
            display: flex;
            align-items: center;
            margin-bottom: 3px;
        }

        .village-color {
            width: 16px;
            height: 16px;
            border: 1px solid #000;
            margin-right: 5px;
        }

        .layer-title {
            font-weight: bold;
            margin-top: 5px;
        }
    </style>

    <div class="mt-5 pt-4">
        <div class="d-flex justify-content-between align-items-center p-2">
            <div>
                <a class="text-white px-2" href="{{ route('map.province', strtolower(str_replace(' ', '_', $province))) }}">
                    <i class="fas fa-arrow-left fs-4"></i>
                </a>
            </div>
            <div>
                <h3 class="text-center">Map {{ $district }}</h3>
            </div>
            <div></div>
        </div>

        <div id="map"></div>
        <div id="village-legend">
            <input type="checkbox" id="master-checkbox">
            <span class="fw-bold" id="village-legend-title"></span>
            <div id="village-layers-container"></div>
        </div>
    </div>

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

        let activeLayers = {};
        let villageState = {};

        function updateVillageLegend() {
            const legendTitle = document.getElementById('village-legend-title');
            legendTitle.textContent = "Kelurahan/Desa";
            const container = document.getElementById('village-layers-container');

            container.innerHTML = "";

            for (const layerName in activeLayers) {
                const {
                    layer,
                    colorMap
                } = activeLayers[layerName];

                const layerTitle = document.createElement('div');
                layerTitle.classList.add('layer-title');
                layerTitle.textContent = layerName;
                container.appendChild(layerTitle);

                const ul = document.createElement('ul');

                layer.eachLayer(function(featureLayer) {
                    if (!featureLayer.feature || !featureLayer.feature.properties) return;

                    const props = featureLayer.feature.properties;
                    const villageName = props.village || "N/A";
                    const color = colorMap[villageName] || '#3388ff';

                    const li = document.createElement('li');
                    li.classList.add('village-item');

                    const uniqueKey = `${layerName}__${featureLayer._leaflet_id}`;

                    if (villageState[uniqueKey] === undefined) villageState[uniqueKey] = true;

                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.checked = !!villageState[uniqueKey];
                    checkbox.style.marginRight = "5px";

                    checkbox.addEventListener('change', function() {
                        villageState[uniqueKey] = this.checked;

                        if (featureLayer.setStyle) {
                            featureLayer.setStyle({
                                color: color,
                                opacity: this.checked ? 1 : 0,
                                fillOpacity: this.checked ? 0.6 : 0
                            });
                        }

                        const allCbs = container.querySelectorAll('input[type="checkbox"]');
                        const master = document.getElementById('master-checkbox');
                        master.checked = Array.from(allCbs).every(cb => cb.checked);
                    });

                    if (featureLayer.setStyle) {
                        featureLayer.setStyle({
                            color: color,
                            opacity: villageState[uniqueKey] ? 1 : 0,
                            fillOpacity: villageState[uniqueKey] ? 0.6 : 0
                        });
                    }

                    const colorDiv = document.createElement('div');
                    colorDiv.classList.add('village-color');
                    colorDiv.style.backgroundColor = color;

                    li.appendChild(checkbox);
                    li.appendChild(colorDiv);
                    li.appendChild(document.createTextNode(villageName));
                    ul.appendChild(li);
                });

                container.appendChild(ul);
            }

            const allCbs = container.querySelectorAll('input[type="checkbox"]');
            const master = document.getElementById('master-checkbox');
            master.checked = allCbs.length > 0 && Array.from(allCbs).every(cb => cb.checked);
        }

        document.getElementById('master-checkbox').addEventListener('change', function() {
            const checked = this.checked;

            for (const layerName in activeLayers) {
                const {
                    layer,
                    colorMap
                } = activeLayers[layerName];
                layer.eachLayer(function(featureLayer) {
                    if (!featureLayer.feature || !featureLayer.feature.properties) return;

                    const villageName = featureLayer.feature.properties.village || "N/A";
                    const color = colorMap[villageName] || '#3388ff';
                    const uniqueKey = `${layerName}__${featureLayer._leaflet_id}`;

                    villageState[uniqueKey] = checked;

                    if (featureLayer.setStyle) {
                        featureLayer.setStyle({
                            color: color,
                            opacity: checked ? 1 : 0,
                            fillOpacity: checked ? 0.6 : 0
                        });
                    }
                });
            }

            const checkboxes = document.querySelectorAll('#village-layers-container input[type="checkbox"]');
            checkboxes.forEach(cb => cb.checked = checked);
        });

        var map = L.map('map');

        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var esriWorldImagery = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: '© Esri World Imagery'
            });

        var esriStreets = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                attribution: '© Esri Streets'
            });

        var baseMaps = [{
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
            let overlayMaps = [{
                group: "Batas Kec. {{ $district }}",
                collapsed: false,
                layers: []
            }];

            const files = @json($geojsonFiles);
            const folder = "{{ $regFolder }}";
            const geojsons = @json($geojsons);

            let allLayers = L.featureGroup();

            // ===============================
            // 1. Load dari file .geojson
            // ===============================
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const geojsonData = await getGeoJSON(folder + "/" + file);

                let name = file.replace(".geojson", "");
                if (name.includes("_")) {
                    name = name.split("_").slice(1).join("_");
                }
                name = name.replace(/_/g, " ").replace(/\b\w/g, l => l.toUpperCase());

                let colorMap = {};
                geojsonData.features.forEach(f => {
                    const village = f.properties.village || "N/A";
                    colorMap[village] = getRandomColorForPolygon();
                });

                let layer = L.geoJson(geojsonData, {
                    style: f => ({
                        color: colorMap[f.properties.village] || '#3388ff',
                        weight: 2,
                        fillOpacity: 0.6
                    }),
                    onEachFeature: (feature, layerFeature) => {
                        if (feature.properties && feature.properties.district) {
                            let villageName = feature.properties.village || "N/A";
                            layerFeature.bindPopup(
                                `<b>Province:</b> ${feature.properties.province}<br>
                                <b>Regency:</b> ${feature.properties.regency}<br>
                                <b>District:</b> ${feature.properties.district}<br>
                                <b>Village:</b> ${villageName}`
                            );
                        }
                    }
                });

                allLayers.addLayer(layer);

                let groupIndex = (i === 0) ? 0 : 1;

                overlayMaps[groupIndex].layers.push({
                    name: name,
                    icon: panelCostumIconColor(getRandomColorForPolygon()),
                    active: true,
                    layer: layer
                });

                layer.on('add', function() {
                    activeLayers[name] = {
                        layer: layer,
                        colorMap: colorMap
                    };
                    updateVillageLegend();
                });
                layer.on('remove', function() {
                    delete activeLayers[name];
                    updateVillageLegend();
                });
            }

            // ===============================
            // 2. Load dari database
            // ===============================
            geojsons.forEach((g, index) => {
                const geojsonData = g.geometry;
                let name = g.name || `Data ${index+1}`;

                let colorMap = {};
                geojsonData.features.forEach(f => {
                    const village = f.properties.village || "N/A";
                    colorMap[village] = getRandomColorForPolygon();
                });

                let layer = L.geoJson(geojsonData, {
                    style: f => ({
                        color: colorMap[f.properties.village] || '#3388ff',
                        weight: 2,
                        fillOpacity: 0.6
                    }),
                    onEachFeature: (feature, layerFeature) => {
                        if (feature.properties && feature.properties.district) {
                            let villageName = feature.properties.village || "N/A";
                            layerFeature.bindPopup(
                                `<b>Province:</b> ${feature.properties.province}<br>
                                <b>Regency:</b> ${feature.properties.regency}<br>
                                <b>District:</b> ${feature.properties.district}<br>
                                <b>Village:</b> ${villageName}`
                            );
                        }
                    }
                });

                allLayers.addLayer(layer);

                overlayMaps[0].layers.push({
                    name: name,
                    icon: panelCostumIconColor(getRandomColorForPolygon()),
                    active: true,
                    layer: layer
                });

                layer.on('add', function() {
                    activeLayers[name] = {
                        layer: layer,
                        colorMap: colorMap
                    };
                    updateVillageLegend();
                });
                layer.on('remove', function() {
                    delete activeLayers[name];
                    updateVillageLegend();
                });
            });

            var control = L.control.panelLayers(baseMaps, overlayMaps, {
                selectorGroup: true,
                collapsibleGroups: true
            });
            map.addControl(control);

            if (allLayers.getLayers().length > 0) {
                map.fitBounds(allLayers.getBounds());
            } else {
                map.setView([-2.5, 118], 5);
            }
        }

        initializeMaps();
    </script>
@endsection
