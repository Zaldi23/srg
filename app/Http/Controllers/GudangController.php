<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Gudang;
use App\Kecamatan;
use App\Komoditas;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GudangController extends Controller
{
    public function jsonGudangByDesa($id)
    {
        return DataTables::of(Gudang::where('desa_id',$id)->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $id = $row->id;
                $url = route('gudang.show', $id);
                
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

    public function getGudangByDesa($desaId)
    {
        return json_encode(
            Gudang::where('desa_id',$desaId)->get()
        );
    }

    public function jsonGudangDetail($id)
    {
        return DataTables::of(Komoditas::with('kategori_komoditas_detail','user_info')->where('gudang_id',$id))
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $id = $row->id;
                $url = route('komoditas.show', $id);
                
                switch ($row->status_komoditas_di_gudang) {
                    case 3:
                        $action = '
                            <a class="btn btn-xs btn-info" href="'.$url.'">Detail</a>
                        ';
                        break;
                    case 2:
                        $action = '
                            <a class="btn btn-xs btn-info" href="'.$url.'">Detail</a>
                            <a class="btn btn-xs btn-warning kosongkan" id="'.$id.'">Kosongkan</a>
                        ';
                        break;
                    case 1:
                        $action = '
                            <a class="btn btn-xs btn-info" href="'.$url.'">Detail</a>
                        ';
                        break;
                    default:
                        # code...
                        break;
                }

                return $action;
            })
            ->addColumn('status_di_gudang',function($row){
                switch ($row->status_komoditas_di_gudang) {
                    case 3:
                        $action = '
                            <a class="btn btn-xs btn-secondary" disabled>Sudah dikosongkan</a>
                        ';
                        break;
                    case 2:
                        $action = '
                            <a class="btn btn-xs btn-success" disabled>Masih tersimpan</a>
                        ';
                        break;
                    default:
                        # code...
                        break;
                }

                return $action;
            })
            ->rawColumns([
                'action',
                'status_di_gudang'
            ])
            ->make(true);
    }

    public function jsonGudang()
    {
        return DataTables::of(Gudang::with('desa.kecamatan'))
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $id = $row->id;

                $action = '
                    <a class="btn btn-xs btn-info" href="gudang/'.$id.'">Detail</a>
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
        return view('user.gudang.index');
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('user.gudang.create',compact(
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
                'kuota' => 'required|numeric',
            ],
            [
                'required' => 'Harap isi',
                'numeric' => 'tidak valid'
            ]
        );

        $desa = Desa::findOrFail($request->desa);

        $gudang = new Gudang;
        $gudang->nama_gudang = $request->keterangan;
        $gudang->kuota = $request->kuota;
        $gudang->desa()->associate($desa);
        $saved = $gudang->save();

        if ($saved) {
            return redirect()->route('gudang.index')->with('alert','Pembuatan gudang dengan nama '.$request->keterangan.' berhasil');
        }

        return redirect()->route('gudang.index')->with('alert','Pembuatan gudang dengan nama '.$request->keterangan.' gagal');

    }

    public function show($id)
    {
        $gudang = Gudang::findOrFail($id);
        return view('user.gudang.show',compact(
            'gudang'
        ));
    }

    public function edit(Gudang $gudang)
    {
        //
    }

    public function update(Request $request, Gudang $gudang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gudang $gudang)
    {
        //
    }
}
