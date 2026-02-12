@extends('layouts.app')
@section('content')
@include('includes.navbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-4">
                <div class="card-body text-center">
                    <h3 class="mb-3">Selamat Datang di Web Penjualan Barang</h3>
                    <p class="lead">Silakan pilih menu di bawah untuk mengelola data:</p>
                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <a href="{{ route('barang.index') }}" class="btn btn-primary">Barang</a>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-success">Pelanggan</a>
                        <a href="{{ route('penjualan.index') }}" class="btn btn-warning">Penjualan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection