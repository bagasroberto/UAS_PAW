<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'product';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nama_product',
        'deskripsi_product',
        'jumlah_product',
        'harga_product',
        'gambar_product1',
        'gambar_product2',
        'gambar_product3'
    ];
}
