@extends('layouts.master')

@section('container')

<div class="container mt-5">
    <h2 class="mb-4">Keranjang Belanja</h2>
    
    <!-- Header -->
    <div class="cart-header">
        <div>
            <input type="checkbox" id="select-all">
            <label for="select-all">Pilih Semua</label>
        </div>
        <button class="btn btn-danger btn-sm" id="remove-selected">Hapus</button>
    </div>

    <!-- Cart Items -->
    @foreach($items as $item)
    <div class="cart-item">
        <div>
            <input type="checkbox" class="select-item" data-id="{{ $item['id'] }}">
            <img src="{{ asset('img/' . $item['gambar']) }}" alt="{{ $item['nama'] }}">
        </div>
        <div class="product-details">
            <span class="product-name">{{ $item['nama'] }}</span>
            <span class="product-brand">{{ $item['merek'] }}</span>
            <span class="product-size">{{ $item['ukuran'] }}</span>
            <span class="product-color">{{ $item['warna'] ?? 'N/A' }}</span> <!-- Pastikan ini ada -->
            <span class="product-price">Rp. {{ number_format($item['harga'], 0, ',', '.') }}</span>
            
            <button class="btn btn-danger btn-sm remove-button" data-id="{{ $item['id'] }}">Hapus</button>
        </div>
    </div>
    @endforeach

    <!-- Footer -->
    <div class="cart-footer">
        <div>
            <input type="checkbox" id="select-all-footer">
            <label for="select-all-footer">Pilih Semua</label>
        </div>
        <button class="btn btn-danger btn-sm" id="remove-selected-footer">Hapus</button>
    </div>

    <!-- Summary -->
    <div class="summary">
        <h3>Ringkasan Belanja</h3>
        <div class="total">
            <span>Total Beli:</span>
            <span>Rp. {{ number_format(collect($items)->sum('harga'), 0, ',', '.') }}</span>
        </div>
        <form action="{{ route('keranjang.purchase') }}" method="POST">
            @csrf
            <input type="hidden" name="selected_items" id="selected-items">
            <button type="submit" class="btn btn-success">Beli</button>
        </form>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/carousel.js') }}"></script>
@endsection