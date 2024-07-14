<?php

// app/Models/Transaksi.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis'; // Jika nama tabel tidak default
    protected $primaryKey = 'id_transaksi'; // Tentukan primary key yang benar


    protected $fillable = [
        
        'id_user',
        'id_barang',
        'pengiriman',
        'metode_pembayaran',
        'tanggal',
        'jumlah',
    ];
}


