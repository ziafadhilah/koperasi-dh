@extends('layouts/main')
@section('title', 'Daftar Produk')
@section('container')
<div class="height-100">
    @if (session('status'))
    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <a href="{{url('/product/create')}}" class="btn btn-outline-success"><i class="fa fa-plus">&nbsp; Tambah Baru</i></a>
    <table id="myTable" class="table table-striped mt-3">
        <thead class="text-center table-header">
            <tr class="bg-dark text-white">
                <th scope="col" width="5%">No</th>
                <th scope="col">Kode Produk</th>
                <th scope="col">Kategori</th>
                <th scope="col">Nama</th>
                <th scope="col">Ukuran</th>
                <th scope="col">Stok</th>
                <th scope="col">Harga Beli</th>
                <th scope="col">Harga Jual</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($products as $product)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$product->product_code}}</td>
                <td>{{$product->productCategory->name}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->size}}</td>
                <td>{{$product->stock}}</td>
                <td>{{number_format($product->purchase_price,0,',','.')}}</td>
                <td>{{number_format($product->selling_price,0,',','.')}}</td>
                <td class="w-25">
                    <!-- Trigger modal -->
                    <a href="{{url('/product/show',$product->id)}}" class="btn btn-outline-primary btn-sm fa fa-eye"></a>
                    <!-- Close modal -->
                    <form action="/product/{{$product->id}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm fa fa-trash" onclick="return confirm('Anda yakin ingin menghapus?')">
                        </button>
                    </form>
                    <a href="{{url('/product/edit',$product->id)}}" class="btn btn-outline-warning btn-sm fa fa-edit d-inline"></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<style>
    .table-header {
        position: sticky;
        top: 0;
    }
</style>