<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Gudang;
use App\KategoriKomoditas; //DELETE SOON
use App\KategoriKomoditasDetail;
use App\Kecamatan;
use App\KelompokTani;
use App\Komoditas;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        return view('toko.index');
    }

    public function beranda()
    {
        switch (Auth::user()->role_id) {
            case 1: //PETANI
                return view('user.index');
                break;
            case 2: //LPK
                # code...
                break;
            case 3: //PENGELOLA GUDANG
                $totalKomoditas = Komoditas::all()->count();
                $totalPetani = UserInfo::all()->count();
                $totalKecamatan = Kecamatan::all()->count();
                $totalDesa = Desa::all()->count();
                $totalGudang = Gudang::all()->count();
                $totalKelompokTani = KelompokTani::all()->count();
                $totalJenisCabai = KategoriKomoditasDetail::all()->count();
                return view('user.index', compact(
                    'totalKomoditas',
                    'totalPetani',
                    'totalKecamatan',
                    'totalDesa',
                    'totalGudang',
                    'totalKelompokTani',
                    'totalJenisCabai',
                ));
                break;
            default:
                Auth::logout();
                return redirect()->route('login');
                break;
        }
    }
}
