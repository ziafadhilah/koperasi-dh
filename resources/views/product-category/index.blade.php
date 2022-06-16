@extends('layouts/main')
@section('title', 'Daftar Kategori')
@section('container')
<div class="container mt-5">
    @if (session('status'))
    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <a href="{{url('/product-category/create')}}" class="btn btn-outline-success"><i class="fa fa-plus">&nbsp; Tambah Baru</i></a>
    <table id="myTable" class="table table-striped mt-3">
        <thead class="text-center table-header">
            <tr class="bg-dark text-white">
                <th scope="col" width="10%">No</th>
                <th scope="col" width="30%">Kode Kategori</th>
                <th scope="col">Nama</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($categories as $category)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$category->category_code}}</td>
                <td>{{$category->name}}</td>
                <td class="w-25">
                    <!-- Trigger modal -->
                    <a href="{{url('/product-category/show',$category->id)}}" class="btn btn-outline-primary btn-sm fa fa-eye"></a>
                    <!-- Close modal -->
                    <form action="/product-category/{{$category->id}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm fa fa-trash" onclick="return confirm('Anda yakin mau menghapus?')">
                        </button>
                    </form>
                    <a href="{{url('/product-category/edit',$category->id)}}" class="btn btn-outline-warning btn-sm fa fa-edit d-inline"></a>
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