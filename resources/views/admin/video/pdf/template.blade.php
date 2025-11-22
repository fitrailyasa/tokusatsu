<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Export Video</title>
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
    <h2>Daftar Video</h2>
    <p>Total: {{ $videos->count() }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tipe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $item)
                <tr>
                    <td>{{ $loop->iteration + (($page ?? 1) - 1) * ($perPage ?? 10) }}</td>
                    <td>{{ $item->title ?? '-' }}</td>
                    <td>{{ $item->category->name ?? '-' }}</td>
                    <td>{{ $item->type ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
