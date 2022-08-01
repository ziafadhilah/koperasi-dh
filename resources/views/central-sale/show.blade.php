@extends('layouts/main')
@section('title', 'Daftar Produk')
@section('container')
<div class="container">
    <div class="card">
        {{$centralSale->product_category_id ?? '-'}}
        {{$centralSale->product_id ?? '-'}}
        {{$centralSale->total_item ?? '-'}}
    </div>
</div>
@endsection