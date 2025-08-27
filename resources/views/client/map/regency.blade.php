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
    </style>

    <div class="my-5 py-4">
        <div class="d-flex justify-content-between align-items-center p-2">
            <div>
                <a class="text-white" href="{{ route('map.province', strtolower(str_replace(' ', '_', $province))) }}"><i
                        class="fas fa-arrow-left fs-4"></i></a>
            </div>
            <div>
                <h3 class="text-center">Map {{ $regency }}</h3>
            </div>
            <div></div>
        </div>

        <div id="map"></div>
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

                let layer = L.geoJson(geojsonData, {
                    style: styleFeature
                });

                allLayers.addLayer(layer);

                overlayMaps[0].layers.push({
                    name: name,
                    icon: panelCostumIconColor(getRandomColorForPolygon()),
                    active: false,
                    layer: layer
                });
            }

            const geojsonDB = @json($geojsonData);
            console.log(geojsonDB);
            geojsonDB.forEach(item => {
                if (!item.geometry) return;

                let layer = L.geoJson(item.geometry, {
                    style: styleFeature
                });
                allLayers.addLayer(layer);

                overlayMaps[0].layers.push({
                    name: item.name,
                    icon: panelCostumIconColor(getRandomColorForPolygon()),
                    active: false,
                    layer: layer
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
