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
                        <select class="form-select form-select-md" aria-label=".form-select-md example" name="product_id">
                            <option selected class="text-center">-- Pilih Produk --</option>
                            @foreach($product as $products)
                            <option value="{{$products->id}}">{{$products->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- <div class="col-lg-4">
                        <select class="form-select" id="select-tags" multiple placeholder="Nama Produk">
                            <optgroup label="Ketik Untuk Mencari Produk" name="product_id">
                                @foreach($product as $products)
                                <option value="{{$products->name}}"></option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div> -->
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-lg-4">
                        <select class="form-select form-select-md" aria-label=".form-select-md example" name="product_category_id">
                            <option selected class="text-center">-- Pilih Kategori --</option>
                            @foreach($productCategories as $productCategory)
                            <option value="{{$productCategory->id}}">{{$productCategory->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Harga Jual</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="pay_amount" placeholder="Harga Jual">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Terjual</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="qty" placeholder="Total Terjual">
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
@section('pagescript')
<script>
    new TomSelect("#select-tags", {
        plugins: ['remove_button'],
        create: true,
        // onItemAdd: function() {
        //     this.setTextboxValue('');
        //     this.refreshOptions();
        // },
        render: {
            option: function(data, escape) {
                return '<div class="d-flex"><span>' + escape(data.value) + '</span><span class="ms-auto text-muted">' + '</span></div>';
            },
            item: function(data, escape) {
                return '<div>' + escape(data.value) + '</div>';
            }
        }
    });
</script>
@endsection