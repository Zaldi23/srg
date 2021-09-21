<?php

namespace App\Http\Controllers;

use App\Komoditas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 
        if ($user) {
            return redirect()->route('beranda');
        }
        $komoditas = Komoditas::where('status_pengajuan',3)->where('status_uji_kualitas',2)->where('status',true)->get();
        return view('toko.index',compact(
            'komoditas'
        ));
    }
}
