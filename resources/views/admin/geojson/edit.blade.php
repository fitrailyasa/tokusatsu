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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $geojson->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Type<span class="text-danger">*</span></label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">Pilih Type</option>
                                    <option value="file" {{ $geojson->type == 'file' ? 'selected' : '' }}>
                                        File
                                    </option>
                                    <option value="geometry" {{ $geojson->type == 'geometry' ? 'selected' : '' }}>
                                        Geometry
                                    </option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Description') }}</label>
                                <textarea class="form-control" name="description" rows="2">{{ old('description', $geojson->description) }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Provinsi<span class="text-danger">*</span></label>
                                <select id="edit_province-{{ $geojson->id }}" class="form-control" required>
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}"
                                            {{ $province->id == optional(optional(optional($geojson->district)->regency)->province)->id ? 'selected' : '' }}>
                                            {{ $province->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('province_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Kabupaten/Kota<span class="text-danger">*</span></label>
                                <select id="edit_regency-{{ $geojson->id }}" class="form-control" required>
                                    <option value="">Pilih Kabupaten/Kota</option>
                                    @foreach ($regencies->where('province_id', optional(optional(optional($geojson->district)->regency)->province)->id) as $regency)
                                        <option value="{{ $regency->id }}"
                                            {{ $regency->id == optional(optional($geojson->district)->regency)->id ? 'selected' : '' }}>
                                            {{ $regency->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('regency_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Kecamatan<span class="text-danger">*</span></label>
                                <select name="district_id" id="edit_district-{{ $geojson->id }}" class="form-control"
                                    required>
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($districts->where('regency_id', optional(optional($geojson->district)->regency)->id) as $district)
                                        <option value="{{ $district->id }}"
                                            {{ $district->id == $geojson->district_id ? 'selected' : '' }}>
                                            {{ $district->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Geometry') }}</label>
                            <div id="map-{{ $geojson->id }}" style="height:420px;"></div>
                            <textarea class="form-control mt-2" name="geometry" id="geometry-{{ $geojson->id }}" rows="3">{{ old('geometry', json_encode($geojson->geometry)) }}</textarea>
                            @error('geometry')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const mapId = "map-{{ $geojson->id }}";
        const geometryId = "geometry-{{ $geojson->id }}";
        const modalSelector = ".formEdit{{ $geojson->id }}";
        const map = L.map(mapId).setView([-6.2, 106.8], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);

        const drawnItems = new L.FeatureGroup().addTo(map);
        const drawControl = new L.Control.Draw({
            edit: {
                featureGroup: drawnItems
            },
            draw: {
                marker: true,
                polygon: true,
                polyline: true,
                rectangle: true,
                circle: true,
                circlemarker: true
            }
        });
        map.addControl(drawControl);

        const textarea = document.getElementById(geometryId);
        let geomData = {};
        try {
            geomData = JSON.parse(textarea.value);
        } catch (e) {
            geomData = {
                type: "FeatureCollection",
                features: []
            };
        }

        let features = [];

        if (geomData.type === "FeatureCollection" && Array.isArray(geomData.features)) {
            geomData.features.forEach(f => {
                if (f.geometry && f.geometry.type === "FeatureCollection" && Array.isArray(f.geometry
                        .features)) {
                    f.geometry.features.forEach(innerF => features.push(innerF));
                } else {
                    features.push(f);
                }
            });
        } else if (geomData.type === "Feature") {
            features = [geomData];
        } else if (geomData.type) {
            features = [{
                type: "Feature",
                geometry: geomData
            }];
        }

        features.forEach(f => {
            L.geoJSON(f).eachLayer(layer => {
                drawnItems.addLayer(layer);
            });
        });

        if (drawnItems.getLayers().length > 0) {
            try {
                map.fitBounds(drawnItems.getBounds(), {
                    padding: [20, 20]
                });
            } catch (e) {
                const geom = features[0].geometry;
                if (geom.type === "Point") {
                    map.setView([geom.coordinates[1], geom.coordinates[0]], 14);
                }
            }
        }

        function updateTextarea() {
            const features = [];
            drawnItems.eachLayer(layer => {
                const geojson = layer.toGeoJSON();
                if (geojson.type === "FeatureCollection" && Array.isArray(geojson.features)) {
                    geojson.features.forEach(innerF => features.push(innerF));
                } else {
                    features.push(geojson);
                }
            });

            const geojsonCollection = {
                type: "FeatureCollection",
                features: features
            };
            textarea.value = JSON.stringify(geojsonCollection);
        }

        map.on(L.Draw.Event.CREATED, function(e) {
            drawnItems.addLayer(e.layer);
            updateTextarea();
        });
        map.on(L.Draw.Event.EDITED, updateTextarea);
        map.on(L.Draw.Event.DELETED, updateTextarea);

        const modalEl = document.querySelector(modalSelector);
        if (modalEl) {
            modalEl.addEventListener('shown.bs.modal', function() {
                map.invalidateSize();
            });
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const province = $('#edit_province-{{ $geojson->id }}');
        const regency = $('#edit_regency-{{ $geojson->id }}');
        const district = $('#edit_district-{{ $geojson->id }}');

        province.on('change', function() {
            let id = $(this).val();
            regency.html('<option value="">Loading...</option>');
            district.html('<option value="">-</option>');

            $.get('/api/regencies/' + id, function(res) {
                if (res.status) {
                    let opt = '<option value="">Pilih Kabupaten/Kota</option>';
                    res.data.forEach(item => {
                        opt += `<option value="${item.id}">${item.name}</option>`;
                    });
                    regency.html(opt);
                }
            });
        });

        regency.on('change', function() {
            let id = $(this).val();
            district.html('<option value="">Loading...</option>');

            $.get('/api/districts/' + id, function(res) {
                if (res.status) {
                    let opt = '<option value="">Pilih Kecamatan</option>';
                    res.data.forEach(item => {
                        opt += `<option value="${item.id}">${item.name}</option>`;
                    });
                    district.html(opt);
                }
            });
        });
    });
</script>
