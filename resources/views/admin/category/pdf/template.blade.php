<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Export Category</title>
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
    <h2>Daftar Kategori</h2>
    <p>Total: {{ $categories->count() }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Era</th>
                <th>Franchise</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration + (($page ?? 1) - 1) * ($perPage ?? 10) }}</td>
                    <td>{{ $category->name ?? '-' }}</td>
                    <td>
                        @php
                            $imgPath = $category->img
                                ? public_path('storage/' . $category->img)
                                : public_path('assets/profile/default.png');
                        @endphp
                        @if (file_exists($imgPath))
                            <img src="{{ $imgPath }}" alt="{{ $category->name }}">
                        @else
                            Tidak ada
                        @endif
                    </td>
                    <td>{{ $category->desc ?? '-' }}</td>
                    <td>
                        {{ $category->era->name ?? '-' }}
                    </td>
                    <td>
                        {{ $category->franchise->name ?? '-' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
