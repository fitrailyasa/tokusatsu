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
                        <div class="mb-3 col-md-6">
                            <label>Provinsi<span class="text-danger">*</span></label>
                            <select name="create__id" id="create_province" class="form-control">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Kabupaten/Kota<span class="text-danger">*</span></label>
                            <select name="regency_id" id="create_regency" class="form-control">
                                <option value="">Pilih Kabupaten/Kota</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Kecamatan<span class="text-danger">*</span></label>
                            <select name="district_id" id="create_district" class="form-control">
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Geometry') }}</label>
                                <div id="map"></div>
                                <textarea class="form-control @error('geometry') is-invalid @enderror" placeholder="geometry" name="geometry"
                                    id="geometry" rows="3">{{ old('geometry') }}</textarea>
                                @error('geometry')
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const mapId = "map";
        const geometryId = "geometry";
        const modalSelector = ".formCreate";
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

        function updateTextarea() {
            const features = [];
            drawnItems.eachLayer(l => {
                features.push(l.toGeoJSON());
            });

            const geojson = {
                type: "FeatureCollection",
                features: features
            };
            document.getElementById(geometryId).value = JSON.stringify(geojson);
        }

        map.on(L.Draw.Event.CREATED, function(e) {
            drawnItems.addLayer(e.layer);
            updateTextarea();
        });
        map.on(L.Draw.Event.EDITED, updateTextarea);
        map.on(L.Draw.Event.DELETED, updateTextarea);

        const modalEl = document.querySelector(modalSelector);
        modalEl.addEventListener('shown.bs.modal', function() {
            map.invalidateSize();
        });
    });
</script>
<script>
    $('#create_province').on('change', function() {
        let id = $(this).val();
        $('#create_regency').html('<option value="">Loading...</option>');
        $('#create_district').html('<option value="">-</option>');

        $.get('/api/regencies/' + id, function(res) {
            if (res.status) {
                let opt = '<option value="">Pilih Kabupaten/Kota</option>';
                res.data.forEach(item => opt += `<option value="${item.id}">${item.name}</option>`);
                $('#create_regency').html(opt);
            }
        });
    });

    $('#create_regency').on('change', function() {
        let id = $(this).val();
        $('#create_district').html('<option value="">Loading...</option>');

        $.get('/api/districts/' + id, function(res) {
            if (res.status) {
                let opt = '<option value="">Pilih Kecamatan</option>';
                res.data.forEach(item => opt += `<option value="${item.id}">${item.name}</option>`);
                $('#create_district').html(opt);
            }
        });
    });
</script>
