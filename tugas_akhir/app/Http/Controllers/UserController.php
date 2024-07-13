<?php

// app/Http/Controllers/YourController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  
    public function tabeltransaksi()
    {
        $users = User::all(); // Mengambil semua data pengguna dari tabel users
        $barang = Barang::all();
        $transaksis = DB::table('transaksis')
            ->join('users', 'transaksis.id_user', '=', 'users.id')
            ->join('barang', 'transaksis.id_barang', '=', 'barang.id')
            ->select(
                'transaksis.id_transaksi',
                'users.nama as nama_pelanggan',
                'barang.nama as nama_barang',
                'transaksis.pengiriman',
                'transaksis.metode_pembayaran',
                'transaksis.jumlah',
                DB::raw('transaksis.jumlah * barang.harga as total_bayar')
            )
            ->get();
    
    
        return view('admin.laporan', compact('transaksis','users','barang'));
    }
}

