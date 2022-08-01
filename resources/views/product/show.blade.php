@extends('layouts/main')
@section('title', 'Daftar Produk')
@section('container')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>Slebeww</h3>
        </div>
        <div class="card-body">
            Nama :{{$products->name ?? '-'}}<br>
            Produk Kategori :{{$products->product_category_id ?? '-'}} <br>
            Produk Kode :{{$products->product_code ?? '-'}}
        </div>
    </div>
</div>
@endsection