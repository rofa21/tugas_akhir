<?php
// app/Http/Controllers/TransaksiController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil IDs barang dari session
        $barangIds = session('checkout_items', []);

        if (empty($barangIds)) {
            return redirect()->route('keranjang.index')->with('error', 'Tidak ada barang yang dipilih.');
        }

        // Dapatkan data barang dari database berdasarkan IDs
        $barangs = Barang::whereIn('id', $barangIds)->get();

        return view('transaksi', compact('barangs'));
    }

    public function selesai(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'jumlah' => 'required|array',
            'jumlah.*' => 'required|integer|min:1',
            'alamat' => 'required|string',
            'metode_pembayaran' => 'required|string',
            'metode_pengiriman' => 'required|string',
        ]);

        // Logika untuk menyimpan transaksi ke database atau memprosesnya
        // ...

        return redirect()->route('home')->with('success', 'Transaksi berhasil diselesaikan!');
    }
}



