<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createPetani(Request $request)
    {
        request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
                'name' => 'required',
            ],
            [
                'required' => 'Harap Isi',
                'email' => 'masukkan email',
            ]
        );

        try {
            DB::transaction(function () use($request){
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->username = $request->name;
                $user->role_id = 1;
                $user->save();

                $userDetail = new UserInfo();
                $userDetail->user()->associate($user);
                $userDetail->nama = $request->name;
                $userDetail->save();
            });
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert','Pembuatan akun petani gagal');
        }

        return redirect()->back()->with('alert','Pembuatan akun petani berhasil');
    }

    public function showPetani()
    {
        $user = Auth::user();
        $petani = $user->user_info;
        // dd($petani);
        $kecamatan = Kecamatan::all();
        return view('user.petani.akun',compact(
            'petani',
            'kecamatan'
        ));
    }

    public function updatePetani(Request $request, $id)
    {
        try {
            DB::transaction(function () use($request,$id){
                $detailAkun = UserInfo::findOrFail($id);
                $detailAkun->desa_id = $request->desa;
                $detailAkun->luas_lahan = $request->luas_lahan;
                $detailAkun->kelompok_tani_id = $request->kelompok_tani;
                $detailAkun->save();
            });
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert','Update akun petani gagal');
        }
        return redirect()->back()->with('alert','Update akun petani berhasil');
    }
}
