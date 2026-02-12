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
                    <div class="card-header">Data
                        Barang</div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a class="btn btn-primary" href="/barang/create">Tambah Barang</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($barangs as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->harga_barang }}</td>
                                   <td>
                                        <a href="{{ route('barang.edit', $item->kode_barang) }}" 
                                        class="btn btn-warning">
                                            Edit
                                        </a>
                                        <form action="{{ route('barang.destroy', $item->kode_barang) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Tidak ada data barang</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $barangs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection