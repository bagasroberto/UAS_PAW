<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = ProductModel::all();
        return view('product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:3',
            'deskripsi' => 'required|min:3',
            'jumlah' => 'required|integer',
            'harga' => 'required|integer',
            'gambar1' => 'required|file|image|mimes:jpeg,png,jpg',
            'gambar2' => 'required|file|image|mimes:jpeg,png,jpg',
            'gambar3' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        // encrypte file 1 in form input as enctype="multipart/form-data"
        $file1 = $request->file('gambar1');
        $nama_file1 = time() . "_" . $file1->getClientOriginalName();
        //$save_upload = 'data_file';
        $file1->move(\base_path() . "/public/images", $nama_file1);

        // encrypte file 2 in form input as enctype="multipart/form-data"
        $file2 = $request->file('gambar2');
        $nama_file2 = time() . "_" . $file2->getClientOriginalName();
        //$save_upload = 'data_file';
        $file2->move(\base_path() . "/public/images", $nama_file2);

        // encrypte file 2 in form input as enctype="multipart/form-data"
        $file3 = $request->file('gambar3');
        $nama_file3 = time() . "_" . $file3->getClientOriginalName();
        //$save_upload = 'data_file';
        $file3->move(\base_path() . "/public/images", $nama_file3);


        ProductModel::create([
            'nama_product' => $request->nama,
            'deskripsi_product' => $request->deskripsi,
            'jumlah_product' => $request->jumlah,
            'harga_product' => $request->harga,
            'gambar_product1' => $nama_file1,
            'gambar_product2' => $nama_file2,
            'gambar_product3' => $nama_file3
        ]);

        return redirect('productlistme');
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
        $product = ProductModel::select('*')->find($id);
        return view('editproduct', ['editproduct' => $product]);
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
            'nama' => 'required|min:3',
            'deskripsi' => 'required|min:3',
            'jumlah' => 'required|integer',
            'harga' => 'required|integer',
            'gambar1' => 'required|file|image|mimes:jpeg,png,jpg',
            'gambar2' => 'required|file|image|mimes:jpeg,png,jpg',
            'gambar3' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);

        $product = ProductModel::select('*')->find($id);

        File::delete('images/' . $product->gambar_product1, 'images/' . $product->gambar_product2, 'images/' . $product->gambar_product3);

        $product->nama_product = $request->nama;
        $product->deskripsi_product = $request->deskripsi;

        $product->jumlah_product = $request->jumlah;
        $product->harga_product = $request->harga;

        // images 1
        $file1 = $request->file('gambar1');
        $nama_file1 = time() . "_" . $file1->getClientOriginalName();
        //$save_upload = 'data_file';
        $file1->move(\base_path() . "/public/images", $nama_file1);

        // images 2
        $file2 = $request->file('gambar2');
        $nama_file2 = time() . "_" . $file2->getClientOriginalName();
        //$save_upload = 'data_file';
        $file2->move(\base_path() . "/public/images", $nama_file2);

        // images 3
        $file3 = $request->file('gambar3');
        $nama_file3 = time() . "_" . $file3->getClientOriginalName();
        //$save_upload = 'data_file';
        $file3->move(\base_path() . "/public/images", $nama_file3);

        $product->gambar_product1 = $nama_file1;
        $product->gambar_product2 = $nama_file2;
        $product->gambar_product3 = $nama_file3;
        $product->save();
        return redirect('productlistme');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ProductModel::select('*')->find($id);
        File::delete('images/' . $product->gambar_product1, 'images/' . $product->gambar_product2, 'images/' . $product->gambar_product3);

        $product->delete();

        return redirect('productlistme');
    }
}
