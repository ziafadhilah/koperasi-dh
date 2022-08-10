@extends('layouts/main')
@section('title', 'Daftar Produk')
@section('container')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>Detail Produk {{$products->name ?? '-'}}</h3>
        </div>
        <div class="card-body">
            Nama : {{$products->name ?? '-'}}<br>
            Produk Kategori : {{$products->productCategory->name ?? '-'}} <br>
            Produk Kode : {{$products->productCategory->code ?? '-'}} <br>
            Stock : {{$products->stock ?? '-'}}
        </div>
    </div>
</div>
@endsection