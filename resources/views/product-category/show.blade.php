@extends('layouts/main')
@section('title', 'Daftar Kategori')
@section('container')
<div class="container">
    {{$categories->name}}
</div>
@endsection