

@extends('layouts.master')

@section('container')

<h1 class="eshop-title">
            <span class="text-orange">E</span>-SHOP
        </h1>

<div class="container mt-5 custom-mt-10">
<button type="button" class="btn btn-success float-end custom-margin-right">Success</button>
    <h4>List Barang</h4>
    

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
