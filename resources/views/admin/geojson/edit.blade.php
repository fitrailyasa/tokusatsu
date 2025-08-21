<!-- Button to open modal -->
<button role="button" class="btn btn-sm m-1 btn-warning" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $geojson->id }}"><i class="fas fa-edit"></i><span class="d-none d-sm-inline">
        {{ __('Edit') }}</span></button>

<!-- Modal -->
<div class="modal fade formEdit{{ $geojson->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.geojson.update', $geojson->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Edit Data') }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body text-left">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name"
                            value="{{ old('name', $geojson->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Description') }}</label>
                        <textarea class="form-control" name="desc" rows="2">{{ old('desc', $geojson->desc) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Geometry') }}</label>
                        <div id="map-{{ $geojson->id }}" style="height:420px;"></div>
                        <textarea class="form-control mt-2" name="geometry" id="geometry-{{ $geojson->id }}" rows="3">{{ old('geometry', json_encode($geojson->geometry)) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Properties') }}</label>
                        <textarea class="form-control" name="properties" id="properties-{{ $geojson->id }}" rows="3">{{ old('properties', $geojson->properties ? json_encode($geojson->properties) : '') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-button.close />
                    <x-button.save />
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const map = L.map("map-{{ $geojson->id }}").setView([-6.2, 106.8], 11);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);

        const drawnItems = new L.FeatureGroup().addTo(map);
        const drawControl = new L.Control.Draw({
            edit: {
                featureGroup: drawnItems
            },
            draw: {
                circle: false,
                circlemarker: false
            }
        });
        map.addControl(drawControl);

        const textarea = document.getElementById("geometry-{{ $geojson->id }}");
        let geom = null;
        try {
            geom = JSON.parse(textarea.value);
        } catch (e) {}
        if (geom) {
            const feat = {
                type: "Feature",
                geometry: geom,
                properties: {}
            };
            const layer = L.geoJSON(feat).addTo(drawnItems);
            try {
                map.fitBounds(layer.getBounds(), {
                    padding: [20, 20]
                });
            } catch (e) {
                if (geom.type === "Point") {
                    const c = geom.coordinates;
                    if (Array.isArray(c)) map.setView([c[1], c[0]], 14);
                }
            }
        }

        function updateTextarea() {
            let gj = null;
            drawnItems.eachLayer(l => {
                if (!gj) gj = l.toGeoJSON();
            });
            textarea.value = gj ? JSON.stringify(gj.geometry) : "";
        }
        map.on(L.Draw.Event.CREATED, function(e) {
            drawnItems.clearLayers();
            drawnItems.addLayer(e.layer);
            updateTextarea();
        });
        map.on(L.Draw.Event.EDITED, updateTextarea);
        map.on(L.Draw.Event.DELETED, updateTextarea);
    });
</script>
