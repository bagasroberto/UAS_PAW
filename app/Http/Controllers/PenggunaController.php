<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        // dd('berhasil');
        $product = ProductModel::all();
        return view('welcome', compact('product'));
    }
}
