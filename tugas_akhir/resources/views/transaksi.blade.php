@extends('layouts.master')

@section('container')

<div class="container mt-5">
        <h2>Transaksi</h2>
        <form>
            <div class="row mb-4">
                <div class="col-md-4">
                    <img src="{{ asset('img/' . $barang['gambar']) }}" alt="Product Image" class="product-image">
                </div>
                <div class="col-md-8">
                    <h5>Nama Barang: {{ $barang['nama'] }}</h5>
                    <p>Merek: {{ $barang['merek'] }}</p>
                    <p>Harga: RP. {{ number_format($barang['harga'], 0, ',', '.') }}</p>
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" class="form-control" id="jumlah" value="{{ $barang['jumlah'] }}" min="1">
            </div>

            <div class="form-group">
                <label for="metodePembayaran">Metode Pembayaran:</label>
                <select class="form-control" id="metodePembayaran">
                    <option value="bank_transfer">Bank Transfer</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>

            <div class="form-group">
                <label for="pengiriman">Metode Pengiriman:</label>
                <select class="form-control" id="pengiriman">
                    <option value="jne">JNE</option>
                    <option value="pos">POS</option>
                    <option value="tiki">TIKI</option>
                </select>
            </div>

            <div class="form-group">
                <label for="total">Total:</label>
                <input type="text" class="form-control" id="total" value="RP. {{ number_format($barang['harga'] * $barang['jumlah'], 0, ',', '.') }}" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Beli</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>



@endsection