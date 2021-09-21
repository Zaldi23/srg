<?php

namespace App\Http\Controllers;

use App\KategoriKomoditasDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class KategoriKomoditasDetailController extends Controller
{
    public function jsonJenisCabai()
    {
        switch (Auth::user()->role_id) {
            case 3:                         //PENGELOLA GUDANG
                return DataTables::of(KategoriKomoditasDetail::with('kategori_komoditas')->get())
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $action = '
                            <a class="btn btn-xs btn-danger hapus" id="'.$row->id.'">Hapus</a>
                        ';
                        return $action; 
                    })
                    ->rawColumns([
                        'action'
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
        return view('user.jenis-cabai.index');
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
        request()->validate(
            [
                'jenis_cabai' => 'required',
            ],
            [
                'required' => 'Harap isi',
            ]
        );

        try {
            DB::transaction(function () use($request){
              $jenisCabai = new KategoriKomoditasDetail();
              $jenisCabai->kategori_komoditas_id = 1;
              $jenisCabai->keterangan = $request->jenis_cabai;
              $jenisCabai->save();
            });
        } catch (\Throwable $th) {
            return redirect()->route('jenis-cabai.index')->with('alert','Tambah jenis cabai gagal dilakukan');
        }

        return redirect()->route('jenis-cabai.index')->with('alert','Tambah jenis cabai berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KategoriKomoditasDetail  $KategoriKomoditasDetail
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriKomoditasDetail $KategoriKomoditasDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriKomoditasDetail  $KategoriKomoditasDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriKomoditasDetail $KategoriKomoditasDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KategoriKomoditasDetail  $KategoriKomoditasDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriKomoditasDetail $KategoriKomoditasDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriKomoditasDetail  $KategoriKomoditasDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriKomoditasDetail $KategoriKomoditasDetail)
    {
        //
    }
}
