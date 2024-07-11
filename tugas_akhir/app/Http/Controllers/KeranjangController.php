<?php
// app/Http/Controllers/KeranjangController.php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $items = session()->get('cart', []);
        return view('keranjang', compact('items'));
    }

    public function addToCart(Request $request, $id)
    {
        $item = Barang::find($id);

        if (!$item) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan.');
        }

        $cart = session()->get('cart', []);

        $cart[$id] = [
            "id" => $item->id,
            "nama" => $item->nama,
            "merek" => $item->merek,
            "ukuran" => $item->ukuran,
            "warna" => $item->warna, // Pastikan ini ada
            "gambar" => $item->gambar,
            "harga" => $item->harga,
            "jumlah" => $request->input('jumlah')
        ];

        session()->put('cart', $cart);

        return redirect()->route('keranjang.index')->with('success', 'Barang berhasil ditambahkan ke keranjang.');
    }

    public function purchase(Request $request)
    {
        $selectedItems = $request->input('selected_items', []);

        // Simpan data barang yang dipilih ke dalam session
        session(['checkout_items' => $selectedItems]);

        return redirect()->route('transaksi.index')->with('success', 'Pembelian berhasil diproses.');
    }

    
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true]);
    }

    public function removeMultiple(Request $request)
    {
        $ids = $request->input('ids', []);
        $cart = session()->get('cart', []);

        foreach ($ids as $id) {
            if (isset($cart[$id])) {
                unset($cart[$id]);
            }
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }
}






