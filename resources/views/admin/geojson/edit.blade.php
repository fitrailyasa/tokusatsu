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
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $geojson->name) }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Description') }}</label>
                                <textarea class="form-control" name="description" rows="2">{{ old('description', $geojson->description) }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Provinsi<span class="text-danger">*</span></label>
                            <select name="province_id" id="edit_province-{{ $geojson->id }}" class="form-control">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}"
                                        {{ $province->id == $geojson->province_id ? 'selected' : '' }}>
                                        {{ $province->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Kabupaten/Kota<span class="text-danger">*</span></label>
                            <select name="regency_id" id="edit_regency-{{ $geojson->id }}" class="form-control">
                                <option value="">Pilih Kabupaten/Kota</option>
                                @foreach ($regencies->where('province_id', $geojson->province_id) as $regency)
                                    <option value="{{ $regency->id }}"
                                        {{ $regency->id == $geojson->regency_id ? 'selected' : '' }}>
                                        {{ $regency->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Kecamatan<span class="text-danger">*</span></label>
                            <select name="district_id" id="edit_district-{{ $geojson->id }}" class="form-control">
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($districts->where('regency_id', $geojson->regency_id) as $district)
                                    <option value="{{ $district->id }}"
                                        {{ $district->id == $geojson->district_id ? 'selected' : '' }}>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Geometry') }}</label>
                            <div id="map-{{ $geojson->id }}" style="height:420px;"></div>
                            <textarea class="form-control mt-2" name="geometry" id="geometry-{{ $geojson->id }}" rows="3">{{ old('geometry', json_encode($geojson->geometry)) }}</textarea>
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
        const geomData = JSON.parse(textarea.value);
        let features = [];

        if (geomData.type === "FeatureCollection" && Array.isArray(geomData.features)) {
            features = geomData.features;
        } else if (geomData.type) {
            features = [{
                type: "Feature",
                geometry: geomData,
            }];
        }

        features.forEach(f => {
            L.geoJSON(f).addTo(drawnItems);
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
                if (!geojson.type || geojson.type !== "Feature") {
                    features.push({
                        type: "Feature",
                        geometry: geojson.geometry || geojson,
                    });
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
