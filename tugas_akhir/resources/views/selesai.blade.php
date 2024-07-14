@extends('layouts.master')

@section('container')
<style>
    .custom-message {
            margin: 10px 30px;
            padding: 20px;
            background: linear-gradient(45deg, black, orange);
            color: white;
            text-align: center;
            font-size: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .detail-transaksi {
            margin: 10px 30px;
            padding: 20px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .detail-transaksi img {
            max-width: 100px;
            margin-right: 20px;
        }
        .detail-transaksi h5, .detail-transaksi p {
            margin: 0;
        }
        .total-row {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .text-orange {
    color: orange;
}
</style>

<div class="container mt-5">
    <div class="custom-message">
        PESANANMU SEDANG DALAM PROSES MOHON UNTUK DITUNGGU<br>
        Terimakasih telah membeli produk kami
    </div>

    <div class="collapse show mt-4" id="detailTransaksi">
        <div class="card card-body">
            <h4>Detail Transaksi</h4>
            <p><strong>Alamat Pengiriman:</strong> {{ $alamat }}</p>
            @foreach($barangs as $barang)
            <div class="detail-transaksi mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Product Image" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h5>Nama Barang: {{ $barang->nama }}</h5>
                        <p>Merek: {{ $barang->merek }}</p>
                        <p>Harga: RP. {{ number_format($barang->harga, 0, ',', '.') }}</p>
                        <p>Ukuran: {{ $barang->ukuran ?? 'N/A' }}</p>
                        <p>Warna: {{ $barang->warna ?? 'N/A' }}</p>
                        <p>Jumlah: {{ $jumlah[$barang->id] }}</p>
                    </div>
                </div>
                <hr>
                <div class="total-row">
                    <h6>Detail Transaksi</h6>
                    <p>Metode Pembayaran: {{ ucfirst($metodePembayaran) }}</p>
                    <p>Metode Pengiriman: RP. {{ number_format($metodePengiriman, 0, ',', '.') }}</p>
                </div>
                <div class="total-row">
                    <p>Subtotal: RP. {{ number_format($barang->harga * $jumlah[$barang->id], 0, ',', '.') }}</p>
                </div>
                <div class="total-row">
                    <p>Biaya Pengiriman: RP. {{ number_format($metodePengiriman, 0, ',', '.') }}</p>
                </div>
                <div class="total-row">
                    <p>Total Bayar: RP. {{ number_format($total, 0, ',', '.') }}</p>
                </div>
            </div>
            @endforeach
            <a class="btn btn-primary" href="/home" role="button">Kembali</a>
        </div>
       
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@endsection





