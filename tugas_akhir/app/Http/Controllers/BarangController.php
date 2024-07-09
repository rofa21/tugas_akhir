<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{   
    public function create()
    {
        return view('home');
    }

    public function index()
    {
        // Ambil data barang dari database
        $barangs = Barang::all();

        // Kirim data ke view
        return view('home', compact('barangs'));
    }

    public function show($id)
{
    $barang = Barang::findOrFail($id);
    return view('detail', compact('barang'));
}
}
