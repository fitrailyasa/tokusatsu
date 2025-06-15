@extends('layouts.admin.app')

@section('title', 'Address')

@section('content')
    <div class="container mb-5">
        @include('components.alert')
        <form action="{{ route('address.store') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Province -->
                <div class="mb-3 col-md-6">
                    <label>Provinsi</label>
                    <select name="province_id" id="province" class="form-control">
                        <option value="">Pilih Provinsi</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Regency -->
                <div class="mb-3 col-md-6">
                    <label>Kabupaten/Kota</label>
                    <select name="regency_id" id="regency" class="form-control">
                        <option value="">Pilih Kabupaten/Kota</option>
                    </select>
                </div>

                <!-- District -->
                <div class="mb-3 col-md-6">
                    <label>Kecamatan</label>
                    <select name="district_id" id="district" class="form-control">
                        <option value="">Pilih Kecamatan</option>
                    </select>
                </div>

                <!-- Village -->
                <div class="mb-3 col-md-6">
                    <label>Desa/Kelurahan</label>
                    <select name="village_id" id="village" class="form-control">
                        <option value="">Pilih Desa/Kelurahan</option>
                    </select>
                </div>

                <!-- Detail Alamat -->
                <div class="mb-3 col-12">
                    <label>Detail Alamat</label>
                    <textarea name="name" class="form-control" rows="3" placeholder="Jl. Garuda No. 1">{{ old('name') }}</textarea>
                </div>

                <!-- Peta -->
                <div class="mb-3 col-12">
                    <label>Tag Lokasi di Peta</label>
                    <div id="map" style="height: 400px;"></div>
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- Leaflet & jQuery -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Dropdown chaining
        $('#province').on('change', function() {
            let id = $(this).val();
            $('#regency').html('<option value="">Loading...</option>');
            $('#district, #village').html('<option value="">-</option>');

            $.get('/api/regencies/' + id, function(res) {
                if (res.status) {
                    let opt = '<option value="">Pilih Kabupaten/Kota</option>';
                    res.data.forEach(item => opt += `<option value="${item.id}">${item.name}</option>`);
                    $('#regency').html(opt);
                }
            });
        });

        $('#regency').on('change', function() {
            let id = $(this).val();
            $('#district').html('<option value="">Loading...</option>');
            $('#village').html('<option value="">-</option>');

            $.get('/api/districts/' + id, function(res) {
                if (res.status) {
                    let opt = '<option value="">Pilih Kecamatan</option>';
                    res.data.forEach(item => opt += `<option value="${item.id}">${item.name}</option>`);
                    $('#district').html(opt);
                }
            });
        });

        $('#district').on('change', function() {
            let id = $(this).val();
            $('#village').html('<option value="">Loading...</option>');

            $.get('/api/villages/' + id, function(res) {
                if (res.status) {
                    let opt = '<option value="">Pilih Desa/Kelurahan</option>';
                    res.data.forEach(item => opt += `<option value="${item.id}">${item.name}</option>`);
                    $('#village').html(opt);
                }
            });
        });

        // Peta dan Marker
        let map = L.map('map').setView([-6.2, 106.816666], 10); // Default: Jakarta
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        let marker;

        function setMarkerAndReverseGeocode(lat, lng) {
            if (marker) {
                marker.setLatLng([lat, lng]);
            } else {
                marker = L.marker([lat, lng], {
                    draggable: true
                }).addTo(map);
            }

            $('#latitude').val(lat);
            $('#longitude').val(lng);

            // Reverse Geocoding
            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
                .then(res => res.json())
                .then(data => {
                    if (data.display_name) {
                        $('textarea[name="name"]').val(data.display_name);
                    }
                });

            // Handle drag
            marker.on('dragend', function(e) {
                const pos = e.target.getLatLng();
                $('#latitude').val(pos.lat);
                $('#longitude').val(pos.lng);
                fetch(`https://nominatim.openstreetmap.org/reverse?lat=${pos.lat}&lon=${pos.lng}&format=json`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.display_name) {
                            $('textarea[name="name"]').val(data.display_name);
                        }
                    });
            });
        }

        // Klik Peta
        map.on('click', function(e) {
            setMarkerAndReverseGeocode(e.latlng.lat, e.latlng.lng);
        });

        // Zoom ke koordinat desa jika tersedia
        $('#village').on('change', function() {
            let id = $(this).val();
            if (!id) return;

            $.get('/api/address/' + id, function(res) {
                if (res.status && res.data.lat && res.data.lng) {
                    map.setView([res.data.lat, res.data.lng], 14);
                    setMarkerAndReverseGeocode(res.data.lat, res.data.lng);
                }
            });
        });
    </script>
@endsection
