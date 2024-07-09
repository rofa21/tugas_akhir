<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        // Data contoh
        $barang = [
            'nama' => 'Adidas Running Shoes',
            'gambar' => 'adidas.jpg',
            'merek' => 'Adidas',
            'harga' => 1200000,
            'jumlah' => 1
        ];

        return view('transaksi', compact('barang'));
    }
}
