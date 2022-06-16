@extends('layouts/main')
@section('title', 'Daftar Kategori')
@section('container')
<div class="container mt-5">
    <div class="card col-lg-12">
        <div class="card-header bg-primary text-white text-center">
            <h3>Form Edit Kategori</h3>
        </div>
        <form method="post" action="/product-category/{{$categories->id}}">
            @method('patch')
            @csrf
            <div class="card-body mt-4">
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Kode Kategori</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="category_code" placeholder="Kode Kategori" value="{{$categories->category_code}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nama Kategori</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="name" placeholder="Nama Kategori" value="{{$categories->name}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-outline-success">Save</button>
                        <a href="{{url('/product-category/')}}" class="btn btn-outline-danger">Cancel</a>
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