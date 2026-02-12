@extends('layouts.app')
@section('content')
@include('includes.navbar')

<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">Tambah Penjualan</div>
                    <div class="card-body">
                        <form action="{{ route('penjualan.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="no_pelanggan">Pelanggan</label>
                                <select class="form-control @error('no_pelanggan') is-invalid @enderror"
                                    name="no_pelanggan">
                                    <option value="">Pilih Pelanggan</option>
                                    @foreach ($pelanggans as $pelanggan)
                                    <option value="{{ $pelanggan->no_pelanggan }}"
                                        {{ old('no_pelanggan') == $pelanggan->no_pelanggan ? 'selected' : '' }}>
                                        {{ $pelanggan->nama_pelanggan }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('no_pelanggan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggal_penjualan">Tanggal Penjualan</label>
                                <input type="date" class="form-control @error('tanggal_penjualan') is-invalid @enderror"
                                    name="tanggal_penjualan" value="{{ old('tanggal_penjualan') }}">
                                @error('tanggal_penjualan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection