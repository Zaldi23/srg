<?php

namespace App\Http\Controllers;

use App\Komoditas;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $komoditas = Komoditas::where('status_pengajuan',3)->where('status_uji_kualitas',2)->get();
        return view('toko.index',compact(
            'komoditas'
        ));
    }
}
