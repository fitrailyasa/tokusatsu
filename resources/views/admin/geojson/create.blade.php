<!-- Button to open modal -->
<button role="button" class="btn btn-sm m-1 btn-primary" data-bs-toggle="modal" data-bs-target=".formCreate"><i
        class="fas fa-plus"></i><span class="d-none d-sm-inline"> {{ __('Add') }}</span></button>

<!-- Modal -->
<div class="modal fade formCreate" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.geojson.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">{{ __('Add Data') }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="name" name="name" id="name" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="description" name="description"
                                    id="description" rows="3"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Geometry') }}</label>
                                <div id="map"></div>
                                <textarea class="form-control @error('geometry') is-invalid @enderror" placeholder="geometry" name="geometry"
                                    id="geometry" rows="3">{{ old('geometry') }}</textarea>
                                <div class="form-text">Disimpan sebagai <code>GeoJSON geometry</code>. Contoh:
                                    {"type":"Point","coordinates":[106.8,-6.2]}</div>
                                @error('geometry')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Properties') }}</label>
                                <textarea class="form-control @error('properties') is-invalid @enderror" placeholder="properties" name="properties"
                                    id="properties" rows="3">{{ old('properties') }}</textarea>
                                @error('properties')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
        const map = L.map('map').setView([-6.2, 106.8], 11);
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

        function updateTextarea() {
            let gj = null;
            drawnItems.eachLayer(l => {
                if (!gj) gj = l.toGeoJSON();
            });
            document.getElementById('geometry').value = gj ? JSON.stringify(gj.geometry) : '';
        }

        map.on(L.Draw.Event.CREATED, function(e) {
            drawnItems.clearLayers();
            drawnItems.addLayer(e.layer);
            updateTextarea();
        });
        map.on(L.Draw.Event.EDITED, updateTextarea);
        map.on(L.Draw.Event.DELETED, updateTextarea);

        const modalEl = document.querySelector('.formCreate');
        modalEl.addEventListener('shown.bs.modal', function() {
            map.invalidateSize();
        });
    });
</script>
