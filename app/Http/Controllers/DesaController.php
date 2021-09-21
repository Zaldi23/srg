<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DesaController extends Controller
{
    public function getDesaByKecamatan($id)
    {
        return json_encode(
            Desa::where('kecamatan_id',$id)->get()
        );
    }

    public function jsonDesa()
    {
        return DataTables::of(Desa::with('kecamatan')->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $showDesaUrl = route('desa.show',$row->id);
                $action = '
                    <a class="btn btn-xs btn-info" href="'.$showDesaUrl.'">Detail</a>
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
        $kecamatan = Kecamatan::all();
        return view('user.desa.index',compact(
            'kecamatan'
        ));
    }

    public function create()
    {
        return redirect()->back();
    }

    public function store(Request $request)
    {
        request()->validate(
            [
                'nama_desa' => 'required',
                'kecamatan' => 'required|numeric',
            ],
            [
                'required' => 'Harap isi',
                'numeric' => 'tidak valid'
            ]
        );
        
        try {
            DB::transaction(function ()use($request) {
                $desa = new Desa();
                $desa->nama_desa = $request->nama_desa;
                $desa->kecamatan_id = $request->kecamatan;
                $desa->save();
            });
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert','Desa gagal dibuat');
        }
        return redirect()->back()->with('alert','Desa berhasil dibuat');
    }

    public function show($id)
    {
        $desa = Desa::findOrFail($id);
        return view('user.desa.show', compact(
            'desa'
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
