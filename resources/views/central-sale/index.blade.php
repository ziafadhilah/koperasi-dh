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
    <a href="{{url('/central-sale/create')}}" class="btn btn-outline-success">
        <i class="fa fa-plus">&nbsp; Tambah Baru</i>
    </a>
    <div class="table-responsive">
        <table class="table table-striped table-fixed mt-3">
            <thead class="text-center table-header">
                <tr class="bg-dark text-white">
                    <th scope="col" width="5%">No</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Total Item</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($centralSale as $cs)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$cs->product_category_id}}</td>
                    <td>{{$cs->product_id}}</td>
                    <td>{{$cs->total_item}}</td>
                    <td>
                        <a href="{{url('/central-sale/show',$cs->id)}}" class="btn btn-outline-primary btn-sm fa fa-eye"></a>
                        <form action="/central-sale/{{$cs->id}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm fa fa-trash" onclick="return confirm('Anda yakin ingin menghapus?')">
                            </button>
                        </form>
                        <a href="{{url('/central-sale/edit',$cs->id)}}" class="btn btn-outline-warning btn-sm fa fa-edit d-inline"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection