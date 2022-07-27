@extends('layouts/main')
@section('title', 'Daftar Produk')
@section('container')
<div class="container mt-5">
    @if (session('status'))
    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="mb-3">
        <a href="{{url('/central-purchase/create')}}" class="btn btn-outline-success">
            <i class="fa fa-plus">&nbsp; Tambah Baru</i>
        </a>
    </div>
    <div class="table-responsive">
        <table class="table display" id="central-purchase">
            <thead>
                <tr>
                    <th class="text-center" scope="col" width="5%">No</th>
                    <th class="text-center" scope="col">Kategori</th>
                    <th class="text-center" scope="col">Produk</th>
                    <th class="text-center" scope="col">Ukuran</th>
                    <th class="text-center" scope="col">Total Terjual</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($getProduct as $cs)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$cs->productCategory->name}}</td>
                    <td>{{$cs->product->name}}</td>
                    <td>{{$cs->product->size}}</td>
                    <td>{{$cs->qty}}</td>
                    <td>
                        <a href="{{url('/central-purchase/show',$cs->id)}}" class="btn btn-outline-primary btn-sm fa fa-eye"></a>
                        <form action="/central-purchase/{{$cs->id}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm fa fa-trash" onclick="return confirm('Anda yakin ingin menghapus?')">
                            </button>
                        </form>
                        <a href="{{url('/central-purchase/edit',$cs->id)}}" class="btn btn-outline-warning btn-sm fa fa-edit d-inline"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('pagescript')
<script>
    $(document).ready(function() {
        $('#central-purchase').DataTable({
            paging: false,
            bInfo: false,
        });
    });
</script>
@endsection