<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil IDs barang dari request atau session
        $barangIds = $request->input('barang_ids', session('checkout_items', []));

        // Dapatkan data barang dari database berdasarkan IDs
        $barangs = Barang::whereIn('id', $barangIds)->get();
        dd($barangs);
        // Simpan IDs ke dalam session
        session(['checkout_items' => $barangIds]);

        // Tampilkan data untuk debugging
        // dd($barangs); // Uncomment ini jika ingin men-debug data yang diterima

        return view('transaksi', compact('barangs'));
    }

    public function checkout(Request $request)
    {
        // Ambil IDs barang dari input request
        $barangIds = $request->input('barang_ids');

        // Dapatkan data barang dari database berdasarkan IDs
        $barangs = Barang::whereIn('id', $barangIds)->get();

        // Simpan data barang ke dalam session
        session(['checkout_items' => $barangIds]);

        return redirect()->route('transaksi');
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
