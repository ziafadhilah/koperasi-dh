@extends('layouts/main')
@section('title', 'Daftar Kategori')
@section('container')
<div class="container mt-5" id="product-category">
    @if (session('status'))
    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="mb-3">
        <a href="{{url('/product-category/create')}}" class="btn btn-outline-success"><i class="fa fa-plus">&nbsp; Tambah Baru</i></a>
    </div>
    <table id="product_category" class="table table-striped mt-3">
        <thead class="table-header">
            <tr>
                <th class="text-center" scope="col" width="10%">No</th>
                <th class="text-center" scope="col" width="30%">Kode Kategori</th>
                <th class="text-center" scope="col">Nama</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($categories as $category)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$category->code}}</td>
                <td>{{$category->name}}</td>
                <td class="w-25">
                    <!-- <a href="{{url('/product-category/show',$category->id)}}" class="btn btn-outline-primary btn-sm fa fa-eye"></a> -->
                    <a href="{{url('/product-category/edit',$category->id)}}" class="btn btn-outline-info btn-sm fa fa-edit d-inline"> Edit</a>
                    <form action="/product-category/{{$category->id}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm fa fa-trash-alt" onclick="return confirm('Anda yakin mau menghapus?')"> Delete
                        </button>
                    </form>
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
@section('pagescript')
<script>
    $(document).ready(function() {
        $('#product_category').DataTable({
            paging: false,
            bInfo: false,
        });
    });
</script>
@endsection