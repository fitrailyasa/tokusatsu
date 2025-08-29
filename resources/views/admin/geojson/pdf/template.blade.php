<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Export geojson</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #eee;
        }

        img {
            width: 60px;
            height: auto;
        }
    </style>
</head>

<body>
    <h2>Daftar geojson</h2>
    <p>Total: {{ $geojsons->count() }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Geometry</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($geojsons as $geojson)
                <tr>
                    <td>{{ $loop->iteration + (($page ?? 1) - 1) * ($perPage ?? 10) }}</td>
                    <td>{{ $geojson->name ?? '-' }}</td>
                    <td>{{ Illuminate\Support\Str::words($geojson->description ?? '-', 10, '...') }}</td>
                    <td>
                        <pre class="mb-0" style="white-space: pre-wrap; word-wrap: break-word; max-width: 250px;">
                            {{ json_encode($geojson->geometry, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}
                        </pre>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
