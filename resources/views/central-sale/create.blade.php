@extends('layouts/main')
@section('title', 'Daftar Kategori')
@section('container')
<div class="container mt-5">
    <div class="card col-lg-12">
        <div class="card-header bg-primary text-white text-center">
            <h3>Form Penjualan</h3>
        </div>
        <form method="post" action="/central-sale">
            @csrf
            <div class="card-body mt-4">
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="product_id" placeholder="Nama Produk">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="product_category_id" placeholder=" Kategori">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Terjual</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="total_item" placeholder="Total Terjual">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-outline-success">Save</button>
                        <a href="{{url('/central-sale')}}" class="btn btn-outline-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="card-footer bg-primary">
            &nbsp;
        </div>
    </div>
</div>
@endsection