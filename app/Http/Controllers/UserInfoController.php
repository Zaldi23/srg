<?php

namespace App\Http\Controllers;

use App\Komoditas;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class UserInfoController extends Controller
{
    public function jsonPetani()
    {
        return DataTables::of(UserInfo::with('user','desa.kecamatan','kelompok_tani'))
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $id = $row->id;

                $action = '
                    <a class="btn btn-xs btn-info" href="petani/'.$id.'">Detail</a>
                ';
                return $action; 
            })
            ->rawColumns([
                'action'
            ])
            ->make(true);
                
    }
    
    public function jsonPetaniDetail($id)
    {
        switch (Auth::user()->role_id) {
            case 2:                         //LPK
                # code...
                break;
            case 3:                         //PENGELOLA GUDANG
                return DataTables::of(Komoditas::where('user_info_id',$id)->with('kategori_komoditas_detail')->get())
                    ->addIndexColumn()
                    ->addColumn('status_pengajuan', function($row){
                        switch ($row->status_pengajuan) {
                            case 1:
                                $action = '<a class="btn btn-xs btn-secondary" href="#">Belum diperiksa</a>';
                                break;
                            case 2:
                                $action = '<a class="btn btn-xs btn-warning" href="#">Menunggu</a>';
                                break;
                            case 3:
                                $action = '<a class="btn btn-xs btn-success" href="#">Disetujui</a>';
                                break;
                            
                            default:
                                $action = '<a class="btn btn-xs btn-danger" href="#">Undefined</a>';
                                break;
                        }
                        
                        return $action;
                    })
                    ->addColumn('status_uji_kualitas', function($row){
                        switch ($row->status_uji_kualitas) {
                            case 1:
                                $action = '<a class="btn btn-xs btn-secondary" href="#">Belum diperiksa</a>';
                                break;
                            case 2:
                                $action = '<a class="btn btn-xs btn-info" href="#">Disetujui</a>';
                                break;
                            
                            default:
                                $action = '<a class="btn btn-xs btn-danger" href="#">Undefined</a>';
                                break;
                        }
                        
                        return $action;
                    })
                    ->addColumn('action', function($row){
                        $id = $row->id;
                        $detailKomoditasUrl = route('komoditas.show',$id);
                        $editKomoditasUrl = route('komoditas.edit',$id);

                        if ($row->status_pengajuan == 1) {
                            $action = '
                                <a class="btn btn-xs btn-info" href="'.$detailKomoditasUrl.'">Detail</a>
                                <a class="btn btn-xs btn-secondary" href="'.$editKomoditasUrl.'">Edit</a>
                                <a class="btn btn-xs btn-danger hapus" id="'.$id.'">Hapus</a>
                            ';
                        } elseif($row->status_pengajuan == 2) {
                            $action = '
                                <a class="btn btn-xs btn-info" href="'.$detailKomoditasUrl.'">Detail</a>
                            ';
                        }elseif($row->status_pengajuan == 3){
                            if ($row->status_uji_kualitas == 2) {
                                $action = '
                                    <a class="btn btn-xs btn-info" href="'.$detailKomoditasUrl.'">Detail</a>
                                    <a class="btn btn-xs btn-dark" href="komoditas/cetak-surat-mutu/'.$id.'">Cetak</a>
                                ';
                            }else{
                                $action = '
                                    <a class="btn btn-xs btn-info" href="'.$detailKomoditasUrl.'">Detail</a>
                                ';
                            }
                        }else{
                            $action = '
                                <a class="btn btn-xs btn-danger hapus" id="'.$id.'>Hapus</a>
                            ';
                        }
                        
                        return $action; 
                    })
                    ->rawColumns([
                        'action','status_pengajuan','status_uji_kualitas'
                    ])
                    ->make(true);
                break;
            default:
                Auth::logout();
                return redirect()->route('login');
                break;
        }
    }
    
    public function index()
    {
        return view('user.petani.index');
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
        $userInfo = UserInfo::findOrFail($id);

        return view('user.petani.show',compact(
            'userInfo'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
