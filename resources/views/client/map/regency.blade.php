@extends('layouts.client.app')

@section('title', "Map $regency - $province")

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
                <h3 class="text-center">Map {{ $regency }}</h3>
            </div>
            <div></div>
        </div>

        <div id="map"></div>
        <div id="village-legend">
            <h6 id="village-legend-title"></h6>
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

        function updateVillageLegend() {
            const title = document.getElementById('village-legend-title');
            title.textContent = "Kelurahan/Desa";
            const container = document.getElementById('village-layers-container');
            container.innerHTML = "";

            for (const layerName in activeLayers) {
                const {
                    layer,
                    colorMap
                } = activeLayers[layerName];

                const title = document.createElement('div');
                title.classList.add('layer-title');
                title.textContent = layerName;
                container.appendChild(title);

                const ul = document.createElement('ul');

                layer.eachLayer(function(featureLayer) {
                    if (featureLayer.feature && featureLayer.feature.properties) {
                        const villageName = featureLayer.feature.properties.village || "N/A";
                        const color = colorMap[villageName] || '#3388ff';

                        const li = document.createElement('li');
                        li.classList.add('village-item');

                        const colorDiv = document.createElement('div');
                        colorDiv.classList.add('village-color');
                        colorDiv.style.backgroundColor = color;

                        li.appendChild(colorDiv);
                        li.appendChild(document.createTextNode(villageName));

                        ul.appendChild(li);
                    }
                });

                container.appendChild(ul);
            }
        }

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
                group: "Batas Adm {{ $regency }}",
                collapsed: false,
                layers: []
            }];

            const files = @json($geojsonFiles);
            const folder = "{{ $regFolder }}";

            let allLayers = L.featureGroup();

            for (const file of files) {
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

                overlayMaps[0].layers.push({
                    name: name,
                    icon: panelCostumIconColor(getRandomColorForPolygon()),
                    active: false,
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

            const geojsonDB = @json($geojsonData);
            geojsonDB.forEach(item => {
                if (!item.geometry) return;

                let colorMap = {};
                if (item.geometry && item.name) colorMap[item.name] = getRandomColorForPolygon();

                let layer = L.geoJson(item.geometry, {
                    style: {
                        color: colorMap[item.name] || '#3388ff',
                        weight: 2,
                        fillOpacity: 0.6
                    }
                });
                allLayers.addLayer(layer);

                overlayMaps[0].layers.push({
                    name: item.name,
                    icon: panelCostumIconColor(getRandomColorForPolygon()),
                    active: false,
                    layer: layer
                });

                layer.on('add', function() {
                    activeLayers[item.name] = {
                        layer: layer,
                        colorMap: colorMap
                    };
                    updateVillageLegend();
                });
                layer.on('remove', function() {
                    delete activeLayers[item.name];
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
