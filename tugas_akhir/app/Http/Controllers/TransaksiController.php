<?php
// app/Http/Controllers/TransaksiController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

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



    public function create()
    {
        $users = User::all();
        $barang = Barang::all();
        return view('admin.laporan', compact('users', 'barang'));
    }

    public function store(Request $request)
    {
        
    
        // Insert data ke tabel transaksis
        $query = DB::table('transaksis')->insert([
            'id_user' => $request['user_id'],
            'id_barang' =>  $request['barang_id'],
            'jumlah' =>  $request['jumlah_beli'],
            'pengiriman' =>  $request['metode_pengiriman'],
            'metode_pembayaran' =>  $request['metode_pembayaran'],
            'tanggal' => $request['tanggal'],
        ]);
    
        // Debugging: Periksa apakah query berhasil
        if($query) {
            // Redirect kembali ke halaman admin dengan pesan sukses
            return redirect('/laporan')->with('success', 'Transaksi berhasil ditambahkan');
        } else {
            // Debugging: Jika insert gagal
            dd('Insert gagal');
        }
    }


    public function edit($id)
    {
        
        
        // Mengambil transaksi berdasarkan id_transaksi
        $transaksi = Transaksi::where('id_transaksi', $id)->firstOrFail();
    
        // Mengambil semua data user dan barang
        $users = User::all();
        $barang = Barang::all();
         
       
       
        // Mengembalikan view edit dengan data yang diperoleh
        return view('admin.transaksi.edit', compact('transaksi', 'users', 'barang'));
    }
    
    public function update(Request $request, $id)
{
   
 try {
   
   
    $request->validate([
        'id_user' => 'required|exists:users,id',
        'id_barang' => 'required|exists:barang,id',
        'pengiriman' => 'required|string',
        'metode_pembayaran' => 'required|string',
        'tanggal' => 'required|date',
        'jumlah' => 'required|integer|min:1',
    ]);

    // Mengambil transaksi berdasarkan id
    $transaksi = Transaksi::where('id_transaksi', $id)->firstOrFail();
   
    $transaksi->update([
        
        'id_user' => $request->id_user,
        'id_barang' => $request->id_barang,
        'pengiriman' => $request->pengiriman,
        'metode_pembayaran' => $request->metode_pembayaran,
        'tanggal' => $request->tanggal,
        'jumlah' => $request->jumlah
    ]);
   
    // Simpan perubahan
    $transaksi->save();
    // Redirect ke halaman admin
    return redirect('/laporan')->with('success', 'Transaksi berhasil diperbarui');

} catch (\Exception $e) {

    dd($e->getMessage());
}

}

    

public function hapus($id)
{
   $transaksi= Transaksi::find($id);
   $transaksi->delete();
   return redirect('/laporan')->with('data berhasil dihapus'); 
}
    
    
    
public function rampung(Request $request)
    {
        // Ambil data barang yang dipilih berdasarkan ID
        $barangs = Barang::whereIn('id', array_keys($request->jumlah))->get();

        // Hitung total harga
        $total = 0;
        foreach ($barangs as $barang) {
            $total += $barang->harga * $request->jumlah[$barang->id];
        }
        $total += $request->metode_pengiriman;

        // Kirim data ke tampilan selesai
        return view('selesai', [
            'barangs' => $barangs,
            'alamat' => $request->alamat,
            'metodePembayaran' => $request->metode_pembayaran,
            'metodePengiriman' => $request->metode_pengiriman,
            'total' => $total,
            'jumlah' => $request->jumlah,
        ]);
    }

    
}



