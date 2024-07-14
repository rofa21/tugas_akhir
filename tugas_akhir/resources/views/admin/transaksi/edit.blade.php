@extends('admin.layout.masterad')

@section('content')
<div class="content">
    <form id="editForm" action="/transaksi/{{$transaksi->id_transaksi}}"  method="POST">
        @csrf
        
        <div class="modal-body">
            <div class="form-group">
                <label for="namaPelanggan">Nama Pelanggan</label>
                <select class="form-control" id="namaPelanggan" name="id_user" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id}}" {{ $transaksi->id_user == $user->id ? 'selected' : '' }}>{{ $user->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="namaBarang">Nama Barang</label>
                <select class="form-control" id="namaBarang" name="id_barang" required>
                   @foreach($barang as $barangl)
                        <option value="{{ $barangl->id}}" {{ $transaksi->id_barang == $barangl->id ? 'selected' : '' }}>{{ $barangl->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="metodePengiriman">Metode Pengiriman</label>
                <select class="form-control" id="metodePengiriman" name="pengiriman" required>
                    <option value="jne" {{ $transaksi->pengiriman == 'jne' ? 'selected' : '' }}>JNE</option>
                    <option value="jt" {{ $transaksi->pengiriman == 'jt' ? 'selected' : '' }}>J&T</option>
                    <!-- Tambahkan lebih banyak kategori sesuai kebutuhan -->
                </select>
            </div>
            <div class="form-group">
                <label for="metodePembayaran">Metode Pembayaran</label>
                <select class="form-control" id="metodePembayaran" name="metode_pembayaran" required>
                    <option value="cod" {{ $transaksi->metode_pembayaran == 'cod' ? 'selected' : '' }}>COD</option>
                    <option value="bri" {{ $transaksi->metode_pembayaran == 'bri' ? 'selected' : '' }}>BRI</option>
                    <option value="dana" {{ $transaksi->metode_pembayaran == 'dana' ? 'selected' : '' }}>DANA</option>
                    <option value="bni" {{ $transaksi->metode_pembayaran == 'bni' ? 'selected' : '' }}>BNI</option>
                    <option value="bca" {{ $transaksi->metode_pembayaran == 'bca' ? 'selected' : '' }}>BCA</option>
                    <!-- Tambahkan lebih banyak kategori sesuai kebutuhan -->
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $transaksi->tanggal }}" required>
            </div>
            <div class="form-group">
                <label for="jumlahBeli">Jumlah Beli</label>
                <input type="number" class="form-control" id="jumlahBeli" name="jumlah" value="{{ $transaksi->jumlah }}" required>
            </div>

            <button type="submit" class="btn btn-success">Perbarui</button>
        </div>
    </form>
</div>

@endsection
