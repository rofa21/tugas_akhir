@include('admin.bagian.sidebarad')
@include('admin.bagian.headerad')

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
                    <th>Nama Barang</th>
                    <th>Gambar</th>
                    <th>Merek</th>
                    <th>Harga</th>
                    <th>Ukuran</th>
                    <th>Warna</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td><img src="{{ asset('storage/uploads/' . $item->gambar) }}" alt="{{ $item->nama }}" height="100px" width="100px"></td>
                        <td>{{ $item->merek }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->ukuran }}</td>
                        <td>{{ $item->warna }}</td>
                        <td>{{ $item->stok_barang }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                        <a class="btn btn-primary ml-3" href="/update/{{$item->id}}" role="button">Edit</a>
                            <button class="btn btn-success btn-sm">Detail</button>
                            <a class="btn btn-danger ml-3" href="/delete/{{$item->id}}" role="button">Hapus</a> 
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
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="merek">Merek</label>
                        <input type="text" class="form-control" id="merek" name="merek" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="ukuran">Ukuran</label>
                        <input type="text" class="form-control" id="ukuran" name="ukuran">
                    </div>
                    <div class="form-group">
                        <label for="warna">Warna</label>
                        <input type="text" class="form-control" id="warna" name="warna">
                    </div>
                    <div class="form-group">
                        <label for="stok_barang">Stok Barang</label>
                        <input type="number" class="form-control" id="stok_barang" name="stok_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="{{ asset('js/admin/fresh.js') }}"></script>
@yield('content')
