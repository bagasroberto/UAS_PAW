<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_product', 150);
            $table->longText('deskripsi_product');
            $table->integer('jumlah_product')->lenght(11);
            $table->integer('harga_product')->lenght(11);
            $table->string('gambar_product1', 255);
            $table->string('gambar_product2', 255);
            $table->string('gambar_product3', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
