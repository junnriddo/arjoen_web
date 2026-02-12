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
                        Pelanggan</div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a class="btn btn-primary" href="/pelanggan/create">Tambah Pelanggan</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pelanggans as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_pelanggan }}</td>
                                    <td>{{ $item->alamat }}</td>
                                   <td>
                                        <a href="{{ route('pelanggan.edit', $item->no_pelanggan) }}" 
                                        class="btn btn-warning">
                                            Edit
                                        </a>
                                        <form action="{{ route('pelanggan.destroy', $item->no_pelanggan) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Tidak ada data pelanggan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $pelanggans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection