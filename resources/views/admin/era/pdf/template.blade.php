<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Export Era</title>
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
    <h2>Daftar Era</h2>
    <p>Total: {{ $eras->count() }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eras as $era)
                <tr>
                    <td>{{ $loop->iteration + (($page ?? 1) - 1) * ($perPage ?? 10) }}</td>
                    <td>{{ $era->name ?? '-' }}</td>
                    <td>
                        @php
                            $imgPath = $era->img
                                ? public_path('storage/' . $era->img)
                                : public_path('assets/profile/default.png');
                        @endphp
                        @if (file_exists($imgPath))
                            <img src="{{ $imgPath }}" alt="{{ $era->name }}">
                        @else
                            Tidak ada
                        @endif
                    </td>
                    <td>{{ $era->desc ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
