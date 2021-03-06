@extends('layouts/main')
@section('title', 'Daftar Kategori')
@section('container')
<div id="app">
    <div class="container mt-5 bg-light">
        <div class="card col-lg-12">
            <div class="card-header bg-primary text-white text-center">
                <h3>Form Tambah Produk</h3>
            </div>
            <form method="post" action="/product">
                @csrf
                <div class="card-body mt-4">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-lg-4">
                            <select class="form-select form-select-md" aria-label=".form-select-md example" name="product_category_id">
                                <option selected class="text-center">-- Pilih Kategori --</option>
                                @foreach($getProductCategory as $gp)
                                <option value="{{$gp->id}}">{{$gp->name ?? '-'}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Produk" value="{{old('name')}}" autocomplete="off">
                            @error('name')
                            <div class=" invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" name="stock" placeholder="Stok" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">
                            Ukuran
                        </label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="size" placeholder="Ukuran" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-outline-success" onclick="return confirm('Anda yakin akan menambahkan data?')">Save</button>
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
</div>
@endsection
@section('pagescript')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>

<script>
    new Vue({
        el: '#app',
        data: {

        },
        methods: {

        }
    })
</script>
@endsection