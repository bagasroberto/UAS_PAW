<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\TransactionModel;
use Illuminate\Http\Request;

class ListPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = TransactionModel::select('*', 'product.id AS idProduct', 'transaction.id AS idTrans')->join('product', 'product.id', 'transaction.id_product')->get();
        return view('listpembelian', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = TransactionModel::select('transaction.id', 'transaction.jumlah_pembelian', 'transaction.total_harga', 'transaction.gambar_bukti', 'product.nama_product', 'product.harga_product', 'product.jumlah_product', 'users.name')->join('product', 'product.id', 'transaction.id_product')->join('users', 'users.id', 'transaction.id_user')->find($id);
        return view('viewtransactiondetail', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = TransactionModel::select('*')->find($id);
        $id2 = $product->id_product;
        $product2 = ProductModel::select('*')->find($id2);
        $date = date('Y-m-d');
        $product2->jumlah_product = $product2->jumlah_product - $product->jumlah_pembelian;
        $product->status = 'konfirmasi';
        $product->tanggal_transaksi = $date;
        $product->save();
        $product2->save();
        return redirect('viewtransaction');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = TransactionModel::select('*')->find($id);
        $path = public_path('images/' . $product->gambar_bukti);
        return response()->download($path, $product->gambar_bukti);
    }

    public function batal()
    {
    }
}
