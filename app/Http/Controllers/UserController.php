<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Kecamatan;
use App\KelompokTani;
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
                $desa = Desa::findOrFail(Auth::user()->user_gudang->desa_id);
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
                $userDetail->desa()->associate($desa);
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
        $kelompokTani = KelompokTani::where('desa_id', $user->user_info->desa_id)->get();
        // dd($kelompokTani);
        return view('user.petani.akun',compact(
            'petani',
            'kelompokTani'
        ));
    }

    public function updatePetani(Request $request, $id)
    {
        try {
            DB::transaction(function () use($request,$id){
                $detailAkun = UserInfo::findOrFail($id);
                $detailAkun->user->nomor_hp = '62'.substr($request->nomor_hp,1);
                $detailAkun->user->save();
                $detailAkun->luas_lahan = $request->luas_lahan;
                $detailAkun->kelompok_tani_id = $request->kelompok_tani;
                $detailAkun->save();
            });
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert','Update akun petani gagal');
        }
        return redirect()->back()->with('alert','Update akun petani berhasil');
    }

    public function resetPassword(Request $request, $id)
    {
        try {
            DB::transaction(function () use($id) {
                $user = User::findOrFail($id);
                $user->password = Hash::make('petanicabai');
                $user->save();
            });
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert','Reset password gagal dilakukan');
        }
        return redirect()->back()->with('alert','Reset password berhasil dilakukan');
    }
}
