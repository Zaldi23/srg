<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class KecamatanController extends Controller
{
    public function jsonKecamatan()
    {
        return DataTables::of(Kecamatan::all())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $id = $row->id;
                $showKecamatanUrl = route('kecamatan.show',$row->id);
                $action = '
                    <a class="btn btn-xs btn-info" href="'.$showKecamatanUrl.'">Detail</a>
                ';
                return $action; 
            })
            ->rawColumns([
                'action'
            ])
            ->make(true);
    }

    public function jsonDesaByKecamatan($id)
    {
        return DataTables::of(Desa::where('kecamatan_id',$id)->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $id = $row->id;
                $url = route('desa.show', $id);
                
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

    public function index()
    {
        return view('user.kecamatan.index');
    }

    public function create()
    {
        return redirect()->back();
    }

    public function store(Request $request)
    {
        request()->validate(
            [
                'nama_kecamatan' => 'required',
            ],
            [
                'required' => 'Harap isi',
            ]
        );
        
        try {
            DB::transaction(function () use($request) {
                $kecamatan = new Kecamatan();
                $kecamatan->nama_kecamatan = $request->nama_kecamatan;
                $kecamatan->save(); 
            });
        } catch (\Throwable $th) {
            return redirect()->route('kecamatan.index')->with('alert','Pembuatan kecamatan '.$request->nama_kecamatan.' gagal');
        }

        return redirect()->route('kecamatan.index')->with('alert','Pembuatan kecamatan '.$request->nama_kecamatan.' berhasil');
    }

    public function show($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        return view('user.kecamatan.show',compact(
            'kecamatan'
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
