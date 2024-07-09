

@extends('layouts.master')

@section('container')
<div class="container mt-5">
    <h1>Daftar Barang</h1>
    <div class="row">
        @foreach($barangs as $barang)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('img/' . $barang->gambar) }}" class="card-img-top" alt="{{ $barang->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $barang->nama }}</h5>
                        <p class="card-text">{{ $barang->merek }}</p>
                        <p class="card-text">Harga: RP.{{ $barang->harga }}</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
