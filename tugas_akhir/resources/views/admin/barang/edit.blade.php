@extends('admin.layout.masterad')

@section('content')


<div class="content">
    <h1>Edit Barang</h1>
                <form action="/upload/{{$barang->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
               
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_nama">Nama Barang</label>
                            <input type="text" class="form-control" id="edit_nama" name="nama" value="{{ $barang->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_merek">Merek</label>
                            <input type="text" class="form-control" id="edit_merek" name="merek" value="{{ $barang->merek }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_harga">Harga</label>
                            <input type="number" class="form-control" id="edit_harga" name="harga" value="{{ $barang->harga }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_gambar">Gambar</label>
                            <input type="file" class="form-control-file" id="edit_gambar" name="gambar" accept="image/*">
                            <img src="{{ url('storage/uploads/'.$barang->gambar) }}" alt="{{ $barang->nama }}" height="100px" width="100px">
                        </div>
                        <div class="form-group">
                            <label for="edit_ukuran">Ukuran</label>
                            <input type="text" class="form-control" id="edit_ukuran" name="ukuran" value="{{ $barang->ukuran }}">
                        </div>
                        <div class="form-group">
                            <label for="edit_warna">Warna</label>
                            <input type="text" class="form-control" id="edit_warna" name="warna" value="{{ $barang->warna }}">
                        </div>
                        <div class="form-group">
                            <label for="edit_stok_barang">Stok Barang</label>
                            <input type="number" class="form-control" id="edit_stok_barang" name="stok_barang" value="{{ $barang->stok_barang }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3">{{ $barang->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
</div>         

<script src="{{ asset('js/admin/fresh.js') }}"></script>
@endsection