<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        table,
        th,
        td {
            border: 1px solid;
            border-collapse: collapse;
            width: 100%;
        }
    </style>
</head>

<body>
    <table>
        <thead class="text-center">
            <tr>
                <th>Kategori</th>
                <th>Produk</th>
                <th>Ukuran</th>
                <th>Total Terjual</th>
                <th>Tanggal Terjual</th>
            </tr>
        </thead>
        <tbody>
            <tr>
        <tbody class="text-center">
            @foreach($centralSale as $cs)
            <tr>
                <td>{{$cs->productCategory->name ?? '-'}}</td>
                <td>{{$cs->product->name ?? '-'}}</td>
                <td>{{$cs->product->size ?? '-'}}</td>
                <td>{{$cs->qty ?? '-'}}</td>
                <td>{{date_format($cs->created_at ?? '-', 'd/M/Y')}}</td>
            </tr>
            @endforeach
        </tbody>
        </tr>
        </tbody>
    </table>
</body>

</html>