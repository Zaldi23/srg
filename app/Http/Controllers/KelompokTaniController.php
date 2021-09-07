<?php

namespace App\Http\Controllers;

use App\KelompokTani;
use App\UserInfo;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KelompokTaniController extends Controller
{
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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $kelompokTani = KelompokTani::findOrFail($id);
        return view('user.kelompok-tani.show',compact(
            'kelompokTani'
        ));
    }

    public function edit(KelompokTani $kelompokTani)
    {
        //
    }
    
    public function update(Request $request, KelompokTani $kelompokTani)
    {
        //
    }

    public function destroy(KelompokTani $kelompokTani)
    {
        //
    }
}
