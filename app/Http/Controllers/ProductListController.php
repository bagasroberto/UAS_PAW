<?php

namespace App\Http\Controllers;

use App\Models\TransactionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Product;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = TransactionModel::select('*', 'product.id AS idProduct', 'transaction.id AS idTrans')->join('product', 'product.id', 'transaction.id_product')->get();
        return view('listkeranjang', compact('product'));
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
        $product = TransactionModel::select('*', 'product.id AS idProduct', 'transaction.id AS idTrans')->join('product', 'product.id', 'transaction.id_product')->find($id);
        return view('editdataproductkeranjang', ['product' => $product]);
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
        $this->validate($request, [
            'jumlah' => 'required|integer',
        ]);
        $transaksi = TransactionModel::select('transaction.id', 'transaction.jumlah_pembelian', 'transaction.total_harga', 'product.harga_product')->join('product', 'product.id', 'transaction.id_product')->find($id);

        $harga = $transaksi->harga_product * $request->jumlah;
        $transaksi->jumlah_pembelian = $request->jumlah;
        $transaksi->total_harga = $harga;
        $transaksi->save();
        return redirect('productlist');
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

        $product->delete();

        return redirect('productlist');
    }
}
