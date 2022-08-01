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
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-lg-4">
                        <select class="form-select form-select-md" aria-label=".form-select-md example" name="product_category_id">
                            <option selected class="text-center">-- Pilih Kategori --</option>
                            @foreach($getProductCategories as $gpc)
                            <option value="{{$gpc->id}}">{{$gpc->name ?? '-'}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Produk</label>
                    <div class="col-lg-4">
                        <select class="form-select form-select-md text-center" aria-label=".form-select-md example" name="product_id">
                            <option selected>-- Pilih Produk --</option>
                            @foreach($getProduct as $gp)
                            <option value="{{$gp->id}}">{{$gp->name ?? '-'}} ({{$gp->size ?? '-'}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Harga Beli</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="pay_amount" placeholder="Harga Beli" autocomplete="off">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Total Pembelian</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="qty" placeholder="Total Pembelian" autocomplete="off">
                    </div>
                    <label class="col-sm-2 col-form-label">Stock Gudang : {{$gp->stock ?? '-'}}</label>
                </div>
                <div class="mb-3 row">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-outline-success">Save</button>
                        <a href="{{url('/central-purchase')}}" class="btn btn-outline-danger">Cancel</a>
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
@section('pagescript')
<script>
    $(document).ready(function() {
        $('.form-select').select2();
    });
</script>
@endsection