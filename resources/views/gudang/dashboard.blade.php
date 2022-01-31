@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Dashboard</li>
@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body text-center">
                <h1>Selamat Datang</h1>
                <h2>Anda login sebagai GUDANG</h2>
                <br><br>
                <a class="btn btn-success btn-lg">Tambah Barang</a>
                <br><br><br>
            </div>
        </div>
    </div>
</div>
<!-- /.row (main row) -->
@endsection