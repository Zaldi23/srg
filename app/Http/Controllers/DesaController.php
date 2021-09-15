<?php

namespace App\Http\Controllers;

use App\Desa;
use Illuminate\Http\Request;
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
        return view('user.desa.index');
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
