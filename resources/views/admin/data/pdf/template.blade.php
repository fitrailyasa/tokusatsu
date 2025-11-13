<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Export Data</title>
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
    <h2>Daftar Data</h2>
    <p>Total: {{ $datas->count() }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                {{-- <th>Gambar</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $item)
                <tr>
                    <td>{{ $loop->iteration + (($page ?? 1) - 1) * ($perPage ?? 10) }}</td>
                    <td>{{ $item->name ?? '-' }}</td>
                    <td>
                        {{ $item->category->name ?? '-' }}
                    </td>
                    {{-- <td>
                        @php
                            $imgPath = $item->img
                                ? public_path('storage/' . $item->img)
                                : public_path('assets/profile/default.png');
                        @endphp
                        @if (file_exists($imgPath))
                            <img src="{{ $imgPath }}" alt="{{ $item->name }}">
                        @else
                            Tidak ada
                        @endif
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
