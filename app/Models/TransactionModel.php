<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $fillable = [
        'id',
        'id_user',
        'id_product',
        'jumlah_pembelian',
        'total_harga',
        'gambar_bukti',
        'status',
        'alamat',
        'tanggal_transaksi'
    ];
}
