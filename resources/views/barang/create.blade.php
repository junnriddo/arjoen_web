@extends('layouts.app')
@section('content')
@include('includes.navbar')
  <div class="countainer">
    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">Tambah Barang</div>
                    <div class="card-body">
                        <form action="/barang/store" method="POST">
                            @csrf
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" @error('nama_barang')
                            is-invalid
                        @enderror name="nama_barang">
                        @error('nama_barang')
                            <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga_barang">Harga Barang</label>
                            <input type="number" name="harga_barang" class="form-control" @error('harga_barang')
                            is-invalid
                            @enderror>
                            @error('harga_barang')
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