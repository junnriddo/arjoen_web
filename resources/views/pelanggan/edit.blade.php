@extends('layouts.app')
@section('content')
@include('includes.navbar')

<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="col-8">

                <div class="card">
                    <div class="card-header">
                        Edit Data Pelanggan
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
                        
                        <form action="{{ route('pelanggan.update', $pelanggan->no_pelanggan) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Nama Pelanggan</label>
                                <input type="text" 
                                       class="form-control"
                                       name="nama_pelanggan"
                                       value="{{ $pelanggan->nama_pelanggan }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" 
                                          name="alamat"
                                          rows="3">{{ $pelanggan->alamat }}</textarea>
                            </div>


                            <div class="d-flex justify-content-between">
                                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
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