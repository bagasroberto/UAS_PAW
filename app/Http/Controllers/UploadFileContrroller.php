<?php

namespace App\Http\Controllers;

use App\Models\TransactionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadFileContrroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $product = TransactionModel::select('transaction.id', 'transaction.jumlah_pembelian', 'transaction.total_harga', 'transaction.gambar_bukti', 'product.nama_product', 'product.harga_product')->join('product', 'product.id', 'transaction.id_product')->find($id);
        return view('uploadgambar', ['product' => $product]);
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
            'alamat' => 'required|min:1',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);
        $upload = TransactionModel::select('*')->find($id);

        File::delete('images/' . $upload->gambar_bukti);
        // images 1
        $file1 = $request->file('gambar');
        $nama_file1 = time() . "_" . $file1->getClientOriginalName();
        //$save_upload = 'data_file';
        $file1->move(\base_path() . "/public/images", $nama_file1);
        $upload->gambar_bukti = $nama_file1;
        $upload->alamat = $request->alamat;
        $upload->status = 'menunggu';
        $upload->save();

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
        $upload = TransactionModel::select('*')->find($id);
        $upload->status = 'list';
        File::delete('images/' . $upload->gambar_bukti);
        $upload->gambar_bukti = '';
        $upload->save();

        return redirect('productlist');
    }
}
