<!-- resources/views/detail.blade.php -->
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
        
    justify-content: flex-end;
    }
    .product-image img {
        width: 100%;
        border-radius: 8px;
    }
    .btn-warning {
        background-color: #ff9800;
        color: white;
    }

    .container{
        margin-bottom: 50px;
     
    }

    .horizontal-line {
    
    width:-90px;
    border-top: 3px solid #ccc; /* Warna dan ketebalan garis */
    margin: 20px 0; /* Jarak atas dan bawah */
}

.text-orange {
    color: orange;
}
</style>

<div class="container mt-5 product-container">
    <div class="product-detail">
        <div class="product-image">
            <img src="{{ asset('storage/' . $barang->gambar) }}" alt="{{ $barang->nama }}">
        </div>
        <div class="product-attributes ">
    <div class="row">
        <div class="col-md-6">
            <h2>{{ $barang->nama }}</h2>
            <p class="text-muted">Merek: {{ $barang->merek }}</p>
            <p class="card-text">Ukuran: {{ $barang->ukuran }}</p>
            <p class="card-text">Warna: {{ $barang->warna }}</p>
            <h4 class="text-danger">Rp. {{ number_format($barang->harga, 0, ',', '.') }}</h4>
            <p>{{ $barang->deskripsi }}</p>
            <hr class="horizontal-line">
            <p>Stok: 
                @if($barang->stok_barang > 0)
                    <span class="badge bg-success">Tersedia</span>
                @else
                    <span class="badge bg-danger">Habis</span>
                @endif
            </p>
        </div>
        <div class="col-md-6 d-flex align-items-end justify-content-end">
            <form action="{{ route('keranjang.add', $barang->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">Beli Sekarang</button>
            </form>
        </div>
    </div>
</div>
    </div>
</div>

@endsection
