@extends('layouts/main')
@section('title', 'Daftar Kategori')
@section('container')
<div class="container mt-5">
    <div class="card col-lg-12">
        <div class="card-header bg-primary text-white text-center">
            <h3>Form Tambah Produk</h3>
        </div>
        <form method="post" action="/product/{{$products->id}}">
            @method('patch')
            @csrf
            <div class="card-body mt-4">
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Kode Produk</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="product_code" placeholder="Kode Produk" value="{{$products->product_code}}">
                    </div>
                    <label class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="name" placeholder="Nama Produk" value="{{$products->name}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-lg-10">
                        <select class="form-select form-select-md" aria-label=".form-select-md example" name="product_category_id">
                            @foreach($productCategories as $productCategory)
                            <option class="text-center" {{ $products->productCategory->id == $productCategory->id ? 'selected' : ''  }} value="{{$productCategory->id}}">
                                {{$productCategory->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">
                        Ukuran
                    </label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="size" placeholder="Ukuran" value="{{$products->size}}">
                    </div>
                    <label class="col-sm-2 col-form-label">Harga Beli</label>
                    <div class="col-lg-4">
                        <input type="number" class="form-control" name="purchase_price" placeholder="Harga Beli" value="{{$products->purchase_price}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-lg-4">
                        <input type="number" class="form-control" name="stock" placeholder="Stok" value="{{$products->stock}}">
                    </div>
                    <label class="col-sm-2 col-form-label">Harga Jual</label>
                    <div class="col-lg-4">
                        <input type="number" class="form-control" name="selling_price" placeholder="Harga Jual" value="{{$products->selling_price}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-outline-success">Save</button>
                        <a href="{{url('/product')}}" class="btn btn-outline-danger">Cancel</a>
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