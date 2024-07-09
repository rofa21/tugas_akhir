@extends('layouts.master')

@section('container')


<style>
    .product-container {
    border: 1px solid #ddd;
    padding: 2rem;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.product-detail {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: flex-start;
    gap: 2rem;
   
}
.product-image {
    flex: 1;
    max-width: 100%;
}
.product-attributes {
    flex: 1;
    max-width: 500px;
    padding: 1.5rem;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
}
.product-image img {
    width: 100%;
    border-radius: 8px;
}
.btn-warning {
    background-color: #ff9800;
    color: white;
}
</style>
<div class="container mt-5 product-container">
    <div class="product-detail">
        <div class="product-image">
            <img src="{{ asset('img/' . $barang->gambar) }}" alt="{{ $barang->nama }}">
        </div>
        <div class="product-attributes">
            <h2>{{ $barang->nama }}</h2>
            <p class="text-muted">Merek: {{ $barang->merek }}</p>
            <p class="card-text">Ukuran : {{ $barang->ukuran }}</p>
                        <p class="card-text">Warna :{{ $barang->warna }}</p>
            <h4 class="text-danger">Rp. {{ number_format($barang->harga, 0, ',', '.') }}</h4>
            <p>{{ $barang->deskripsi }}</p>
            <p>Stok: 
                @if($barang->stok > 0)
                    <span class="badge bg-success">Tersedia</span>
                @else
                    <span class="badge bg-danger">Habis</span>
                @endif
            </p>
            <div class="form-group">
                <label for="exampleNumber">Masukkan Jumlah:</label>
                <input type="number" class="form-control" id="exampleNumber" placeholder="Masukkan angka" min="0" max="100">
                <small id="numberHelp" class="form-text text-muted">Masukkan jumlah barang yang dibeli.</small>
            </div>
            <button type="button" class="btn btn-warning">Beli Sekarang</button>
        </div>
    </div>
</div>

@endsection
