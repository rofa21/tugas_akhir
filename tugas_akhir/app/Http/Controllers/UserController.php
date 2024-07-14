<?php

// app/Http/Controllers/YourController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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


    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'telepon' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buat user baru
        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman login atau dashboard
        return redirect('/kembali')->with('data berhasil dihapus'); 
    }


    
public function destroy($id)
{
    $transaksis = Transaksi::where('id_user', $id)->get();

    // Menghapus setiap transaksi
    foreach ($transaksis as $transaksi) {
        $transaksi->delete();
    }


   $user= User::find($id);
   $user->delete();
   return redirect('/user')->with('data berhasil dihapus'); 
}
 
}

