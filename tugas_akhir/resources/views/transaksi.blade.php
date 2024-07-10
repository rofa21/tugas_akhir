@extends('layouts.master')

@section('container')

<div class="container mt-5">
    <h2>Transaksi</h2>
    <form id="transaksiForm" action="{{ route('transaksi.selesai') }}" method="POST">
        @csrf
        @foreach($barangs as $barang)
        <div class="row mb-4 barang-item" data-harga="{{ $barang->harga }}">
            <div class="col-md-4">
                <img src="{{ asset('img/' . $barang->gambar) }}" alt="Product Image" class="product-image">
            </div>
            <div class="col-md-8">
                <h5>Nama Barang: {{ $barang->nama }}</h5>
                <p>Merek: {{ $barang->merek }}</p>
                <p>Harga: RP. {{ number_format($barang->harga, 0, ',', '.') }}</p>
                <p>Warna: {{ $barang->warna ?? 'N/A' }}</p>
                <p>Ukuran: {{ $barang->ukuran ?? 'N/A' }}</p>
            </div>
            <div class="form-group col-md-2">
                <label for="jumlah_{{ $barang->id }}">Jumlah:</label>
                <input type="number" class="form-control jumlah" id="jumlah_{{ $barang->id }}" name="jumlah[{{ $barang->id }}]" value="1" min="1" data-harga="{{ $barang->harga }}">
            </div>
        </div>
        @endforeach

        <div class="form-group">
            <label for="alamat">Alamat Pengiriman:</label>
            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
        </div>

        <div class="form-group">
            <label for="metodePembayaran">Metode Pembayaran:</label>
            <select class="form-control" id="metodePembayaran" name="metode_pembayaran" required>
                <option value="bank_transfer">Bank Transfer</option>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>

        <div class="form-group">
            <label for="pengiriman">Metode Pengiriman:</label>
            <select class="form-control" id="pengiriman" name="metode_pengiriman" required>
                <option value="jne">JNE</option>
                <option value="pos">POS</option>
                <option value="tiki">TIKI</option>
            </select>
        </div>

        <div class="form-group">
            <label for="total">Total:</label>
            <input type="text" class="form-control" id="total" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Selesai</button>
    </form>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/carousel.js') }}"></script>
@endsection