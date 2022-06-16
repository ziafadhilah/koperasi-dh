@extends('layouts/main')
@section('title', 'Daftar Produk')
@section('container')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>Anjay mantap</h3>
        </div>
        <div class="card-body">
            {{$products->name}}
        </div>
    </div>
</div>
@endsection