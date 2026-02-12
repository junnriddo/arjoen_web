@extends('layouts.app')
@section('content')
@include('includes.navbar')

<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="col-8">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">Data Penjualan</div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a class="btn btn-primary" href="{{ route('penjualan.create') }}">Tambah Penjualan</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Faktur</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Penjualan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($penjualans as $item)
                                <tr>
                                    <td>{{ $item->faktur }}</td>
                                    <td>{{ $item->pelanggan->nama_pelanggan ?? '-' }}</td>
                                    <td>{{ $item->tanggal_penjualan }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Tidak ada data penjualan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $penjualans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection