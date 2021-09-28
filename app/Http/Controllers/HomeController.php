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
                $totalKomoditas = Komoditas::where('status_pengajuan',3)->where('status_uji_kualitas',1)->count();
                return view('user.index',compact(
                    'totalKomoditas'
                ));
                break;
            case 3: //PENGELOLA GUDANG
                $desa = Auth::user()->user_gudang->desa;
                $totalKomoditas = Komoditas::where('status',true)->where('desa_id',$desa->id)->count();
                $totalPetani = UserInfo::where('desa_id',$desa->id)->count();
                // $totalKecamatan = Kecamatan::all()->count();
                // $totalDesa = Desa::all()->count();
                $totalGudang = Gudang::where('desa_id',$desa->id)->count();
                $totalKelompokTani = KelompokTani::where('desa_id',$desa->id)->count();
                $totalJenisCabai = KategoriKomoditasDetail::all()->count();
                return view('user.index', compact(
                    'totalKomoditas',
                    'totalPetani',
                    'totalGudang',
                    'totalKelompokTani',
                    'totalJenisCabai',
                    'desa',
                ));
                break;
            default:
                Auth::logout();
                return redirect()->route('login');
                break;
        }
    }
}
