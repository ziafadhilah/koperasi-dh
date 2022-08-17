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
        <a href="{{url('/central-sale/create')}}" class="btn btn-outline-success">
            <i class="fa fa-plus">&nbsp; Tambah Baru</i>
        </a>
        <!-- <a href="{{url('/central-sale/export')}}" class="btn btn-outline-primary">
            <i class="fa fa-file-excel">&nbsp; Export Excel</i>
        </a> -->
        <a href="{{url('/central-sale/export-pdf')}}" class="btn btn-outline-danger" target="_blank">
            <i class="fa fa-file-pdf">&nbsp; Export PDF</i>
        </a>
    </div>
    <div class="table-responsive">
        <table class="table display" id="central-sale">
            <thead>
                <tr>
                    <th class="text-center" scope="col" width="5%">No</th>
                    <th class="text-center" scope="col">Kategori</th>
                    <th class="text-center" scope="col">Produk</th>
                    <th class="text-center" scope="col">Ukuran</th>
                    <th class="text-center" scope="col">Harga Jual</th>
                    <th class="text-center" scope="col" style="width: 20px;">Terjual</th>
                    <th class="text-center" scope="col">Tanggal Terjual</th>
                    <th class="text-center" scope="col" style="width: 100px;">Status Retur</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($getProduct as $cs)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$cs->productCategory->name ?? '-'}}</td>
                    <td>{{$cs->product->name ?? '-'}}</td>
                    <td>{{$cs->product->size ?? '-'}}</td>
                    <td>Rp. {{number_format($cs->pay_amount ?? '-')}}</td>
                    <td>{{$cs->qty ?? '-'}}pcs</td>
                    <td>{{date_format($cs->created_at ?? '-', 'd/M/Y')}}</td>
                    <td>
                        @if($cs->status == 0)
                        Di Retur
                        @else
                        Tidak di Retur
                        @endif
                    </td>
                    <td>
                        <a href="{{url('/central-sale/show',$cs->id)}}" class="btn btn-outline-info btn-sm fa fa-eye"> Detail</a>
                        <a href="{{url('/central-sale/retur',$cs->id)}}" class="btn btn-outline-warning btn-sm fa fa-arrow-right d-inline"> Retur</a>
                        <form action="/central-sale/{{$cs->id}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm fa fa-trash-alt" onclick="return confirm('Anda yakin ingin menghapus?')"> Hapus
                            </button>
                        </form>
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
        $('#central-sale').DataTable({
            paging: false,
            "bInfo": false
        });
    });
</script>
@endsection