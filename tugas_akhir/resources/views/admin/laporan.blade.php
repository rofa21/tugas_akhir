@extends('admin.layout.masterad')

@section('content')

<body>
<div class="content">
    <h1>Data Barang</h1>
    <div class="row mb-3">
        <div class="col-md-4">
            <input id="search" type="text" class="form-control" placeholder="Cari Barang...">
        </div>
        <div class="col-md-4">
            <select id="categoryFilter" class="form-control">
                <option value="all">Semua Kategori</option>
                <option value="elektronik">Elektronik</option>
                <option value="fashion">Fashion</option>
                <!-- Tambahkan lebih banyak kategori sesuai kebutuhan -->
            </select>
        </div>
        <div class="col-md-4 text-right">
            <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Tambah Barang</button>
        </div>
    </div>
    <div class="table-wrapper">
        <table id="barangTable" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Barang</th>
                    <th>Metode Pengiriman</th>
                    <th>Metode Pembayaran</th>
                    <th>Jumlah Beli</th>
                    <th>Total Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
        @foreach($transaksis as $transaksi)
        <tr>
            <td>{{ $transaksi->id_transaksi }}</td>
            <td>{{ $transaksi->nama_pelanggan }}</td>
            <td>{{ $transaksi->nama_barang }}</td>
            <td>{{ $transaksi->pengiriman }}</td>
            <td>{{ $transaksi->metode_pembayaran }}</td>
            <td>{{ $transaksi->jumlah }}</td>
            <td>Rp.{{ number_format($transaksi->total_bayar, 0, ',', '.') }}</td>
            <td>
            <a href="{{ route('transaksi.edit', $transaksi->id_transaksi) }}" class="btn btn-primary btn-sm">Edit</a>
                <button class="btn btn-success btn-sm">Detail</button>
                <button class="btn btn-danger btn-sm">Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Barang -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- resources/views/admin/laporan.blade.php -->

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form id="addForm" action="/transaksi" method="POST">
    @csrf
    <div class="form-group">
        <label for="namaPelanggan">Nama Pelanggan</label>
        <select class="form-control" id="namaPelanggan" name="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="namaBarang">Nama Barang</label>
        <select class="form-control" id="namaBarang" name="barang_id" required>
           @foreach($barang as $barangl)
                <option value="{{ $barangl->id }}">{{ $barangl->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="metodePengiriman">Metode Pengiriman</label>
        <select class="form-control" id="metodePengiriman" name="metode_pengiriman" required>
            <option value="jne">JNE</option>
            <option value="jt">J&T</option>
            <!-- Tambahkan lebih banyak kategori sesuai kebutuhan -->
        </select>
    </div>
    <div class="form-group">
        <label for="metodePembayaran">Metode Pembayaran</label>
        <select class="form-control" id="metodePembayaran" name="metode_pembayaran" required>
            <option value="cod">COD</option>
            <option value="bri">BRI</option>
            <option value="dana">DANA</option>
            <option value="bni">BNI</option>
            <option value="bca">BCA</option>
            <!-- Tambahkan lebih banyak kategori sesuai kebutuhan -->
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
    </div>
    <div class="form-group">
        <label for="jumlahBeli">Jumlah Beli</label>
        <input type="number" class="form-control" id="jumlahBeli" name="jumlah_beli" required>
    </div>
   
    <button type="submit" class="btn btn-success">Tambah</button>
</form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
   

</body>
</html>



@endsection