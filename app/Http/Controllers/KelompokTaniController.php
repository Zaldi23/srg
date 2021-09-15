<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Kecamatan;
use App\KelompokTani;
use App\UserInfo;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KelompokTaniController extends Controller
{
    public function jsonKelompokTaniByDesa($id)
    {
        return DataTables::of(KelompokTani::with('user_info')->where('desa_id',$id)->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $id = $row->id;
                $url = route('kelompok-tani.show', $id);
                
                $action = '
                    <a class="btn btn-xs btn-info" href="'.$url.'">Detail</a>
                ';

                return $action;
            })
            ->rawColumns([
                'action',
            ])
            ->make(true);
    }

    public function jsonKelompokTaniDetail($id)
    {
        return DataTables::of(UserInfo::where('kelompok_tani_id',$id)->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $id = $row->id;
                $url = route('petani.show', $id);
                
                $action = '
                    <a class="btn btn-xs btn-info" href="'.$url.'">Detail</a>
                ';

                return $action;
            })
            ->rawColumns([
                'action',
            ])
            ->make(true);
    }

    public function jsonKelompokTani()
    {
        return DataTables::of(KelompokTani::with('desa.kecamatan'))
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $id = $row->id;

                $action = '
                    <a class="btn btn-xs btn-info" href="kelompok-tani/'.$id.'">Detail</a>
                ';
                return $action; 
            })
            ->rawColumns([
                'action'
            ])
            ->make(true);
    }

    public function index()
    {
        return view('user.kelompok-tani.index');
    }
    
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('user.kelompok-tani.create',compact(
            'kecamatan'
        ));
    }

    public function store(Request $request)
    {
        request()->validate(
            [
                'kecamatan' => 'required|numeric',
                'desa' => 'numeric',
                'keterangan' => 'required',
            ],
            [
                'required' => 'Harap isi',
                'numeric' => 'tidak valid'
            ]
        );

        $desa = Desa::findOrFail($request->desa);

        $kelompokTani = new KelompokTani();
        $kelompokTani->keterangan = $request->keterangan;
        $kelompokTani->desa()->associate($desa);
        $saved = $kelompokTani->save();

        if ($saved) {
            return redirect()->route('kelompok-tani.index')->with('alert','Pembuatan kelompok tani dengan nama '.$request->keterangan.' berhasil');
        }

        return redirect()->route('kelompok-tani.index')->with('alert','Pembuatan kelompok tani dengan nama '.$request->keterangan.' gagal');
    }

    public function show($id)
    {
        $kelompokTani = KelompokTani::findOrFail($id);
        return view('user.kelompok-tani.show',compact(
            'kelompokTani'
        ));
    }

    public function edit($id)
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
