<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        // Ambil data barang dari database
        $barangs = Barang::all();

        // Kirim data ke view
        return view('home', compact('barangs'));
    }
}
