<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Log;

class BarangadController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('admin.homead', compact('barang'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ukuran' => 'nullable|string|max:255',
            'warna' => 'nullable|string|max:255',
            'stok_barang' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        // Upload gambar
        $gambarPath = $request->file('gambar')->store('uploads');

        // Simpan data barang ke dalam database
        $barang = new Barang();
        $barang->nama = $validatedData['nama'];
        $barang->merek = $validatedData['merek'];
        $barang->harga = $validatedData['harga'];
        $barang->gambar = $gambarPath;
        $barang->ukuran = $validatedData['ukuran'];
        $barang->warna = $validatedData['warna'];
        $barang->stok_barang = $validatedData['stok_barang'];
        $barang->deskripsi = $validatedData['deskripsi'];
        $barang->save();

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan.');
    }
}
