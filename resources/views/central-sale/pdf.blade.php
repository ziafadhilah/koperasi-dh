<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        table {
            margin-top: 2rem;
        }

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
    <?php
    foreach ($centralSale as $cs) {
        $stock = $cs->product->stock;
        $date = date('d/M/Y');
    }
    ?>
    <center>
        <h2>Laporan Penjualan</h2>
        <p>
            Tanggal : {{$date}}
        </p>
    </center>
    <br>

    Stok di gudang : {{$stock}}
    <table>
        <thead class="text-center">
            <tr>
                <th style="width: 20px;">No</th>
                <th>Kategori</th>
                <th>Produk</th>
                <th>Ukuran</th>
                <th>Total Terjual</th>
                <th>Harga Jual</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
        <tbody class="text-center">
            @foreach($centralSale as $cs)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$cs->productCategory->name ?? '-'}}</td>
                <td>{{$cs->product->name ?? '-'}}</td>
                <td>{{$cs->product->size ?? '-'}}</td>
                <td>{{$cs->qty ?? '-'}}</td>
                <td>Rp. {{number_format($cs->pay_amount ?? '-')}}</td>
                <td>{{date_format($cs->created_at ?? '-', 'd/M/Y')}}</td>
            </tr>
            @endforeach
        </tbody>
        </tr>
        </tbody>
    </table>
</body>

</html>