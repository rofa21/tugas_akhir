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
                <tr>
                    <td>1</td>
                    <td>Ahmad Subarjo/td>
                    <td>Sepati Sports</td>
                    <td>JNE</td>
                    <td>BRI</td>
                    <td>1</td>
                    <td>Rp.150.000</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <button class="btn btn-success btn-sm">Detail</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
            
                <!-- Tambahkan lebih banyak data sesuai kebutuhan -->
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
                <form id="addForm">
                    <div class="form-group">
                        <label for="namaBarang">Nama Barang</label>
                        <input type="text" class="form-control" id="namaBarang" required>
                    </div>
                    <div class="form-group">
                        <label for="kategoriBarang">Kategori</label>
                        <select class="form-control" id="kategoriBarang" required>
                            <option value="elektronik">Elektronik</option>
                            <option value="fashion">Fashion</option>
                            <!-- Tambahkan lebih banyak kategori sesuai kebutuhan -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hargaBarang">Harga</label>
                        <input type="number" class="form-control" id="hargaBarang" required>
                    </div>
                    <div class="form-group">
                        <label for="stokBarang">Stok</label>
                        <input type="number" class="form-control" id="stokBarang" required>
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

<script src="{{ asset('js/admin/fresh.js') }}"></script>

@endsection