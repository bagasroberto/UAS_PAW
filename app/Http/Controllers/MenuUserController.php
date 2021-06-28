<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuUserController extends Controller
{
    public function myprofile()
    {
        return view('myprofile');
    }

    public function productlist()
    {
        return view('listkeranjang');
    }

    public function transaction()
    {
        return view('transaksi');
    }

    public function history()
    {
        return view('history');
    }
}
