<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Export Film</title>
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
    <h2>Daftar Film</h2>
    <p>Total: {{ $films->count() }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Tipe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($films as $film)
                <tr>
                    <td>{{ $loop->iteration + (($page ?? 1) - 1) * ($perPage ?? 10) }}</td>
                    <td>{{ $film->name ?? '-' }}</td>
                    <td>{{ $film->category->name ?? '-' }}</td>
                    <td>{{ $film->type ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
