@extends('layouts.app')
@section('content')
@include('includes.navbar')

<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">Tambah Pelanggan</div>
                    <div class="card-body">
                        <form action="{{ route('pelanggan.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror"
                                    name="nama_pelanggan" value="{{ old('nama_pelanggan') }}">
                                @error('nama_pelanggan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat" rows="3" cols="10">{{ old('alamat') }}</textarea>
                                @error('alamat')
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