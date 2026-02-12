@extends('layouts.app')
@section('content')
@include('includes.navbar')

<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="col-8">

                <div class="card">
                    <div class="card-header">
                        Edit Data barang
                    </div>

                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <form action="{{ route('barang.update', $barang->kode_barang) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- <div class="mb-3">
                                <label class="form-label">Nomor barang</label>
                                <input type="number" 
                                       class="form-control"
                                       name="kode_barang"
                                       value="{{ $barang->kode_barang }}">
                            </div> -->
                            
                            <div class="mb-3">
                                <label class="form-label">Nama barang</label>
                                <input type="text" 
                                       class="form-control"
                                       name="nama_barang"
                                       value="{{ $barang->nama_barang }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Harga Barang</label>
                                <input type="number" 
                                       class="form-control"
                                       name="harga_barang"
                                       value="{{ $barang->harga_barang }}">
                            </div>


                            <div class="d-flex justify-content-between">
                                <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                                    Kembali
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    Update Data
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection