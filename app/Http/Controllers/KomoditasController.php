<?php

namespace App\Http\Controllers;

use App\KategoriKomoditas;
use App\KategoriKomoditasDetail;
use App\Komoditas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;

class KomoditasController extends Controller
{
    public function jsonKomoditas()
    {
        return DataTables::of(Komoditas::with('kategori_komoditas_detail','user_info'))
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $id = Crypt::encrypt($row->id);
                        $action = '
                            <a  class="btn btn-xs btn-secondary" href="komoditas/'.$id.'/edit">Edit</a>
                        ';
                        return $action; 
                        })
                    ->make(true);
    }

    public function getDetailKategoriKomoditas($id)
    {
        return json_encode(
            KategoriKomoditasDetail::where('kategori_komoditas_id',$id)->get()
        );
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch (Auth::user()->role_id) {
            case 1:
                return view('user.komoditas.index');
                break;
            case 2:
                return view('user.komoditas.index');
                break;
            case 3:
                return view('user.komoditas.index');
                break;
            default:
                Auth::logout();
                return redirect()->route('login');
                break;
        }
        // $komoditas = Auth::user()->user_info->komoditas_disetujui;
        // dd($komoditas); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriKomoditas::all();
        return view('user.komoditas.create', compact(
            'kategori'
        ));
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
                'kuantitas' => 'required|numeric',
                'kategori' => 'numeric',
                'detail_kategori' => 'numeric',
                'harga' => 'required|numeric',
            ],
            [
                'kuantitas.required' => 'Harap isi.',
                'kategori.numeric' => 'Harap pilih salah satu',
                'detail_kategori.numeric' => 'Harap pilih salah satu',
                'harga.required' => 'Harap isi',
            ]
        );

        $detailKomoditas = KategoriKomoditasDetail::findOrFail($request->detail_kategori);

        $komoditas = new Komoditas;
        $komoditas->harga_harapan = $request->harga;
        $komoditas->kuantitas = $request->kuantitas;
        $komoditas->kategori_komoditas_detail()->associate($detailKomoditas);
        $komoditas->user_info()->associate(Auth::user()->user_info);
        $saved = $komoditas->save();

        if ($saved) {
            return redirect()->route('komoditas.index')->with('alert','Pengajuan Komoditas '.$detailKomoditas->keterangan.' berhasil');
        }

        return redirect()->route('komoditas.index')->with('alert','Pengajuan Komoditas '.$detailKomoditas->keterangan.' gagal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Komoditas  $Komoditas
     * @return \Illuminate\Http\Response
     */
    public function show(Komoditas $Komoditas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Komoditas  $Komoditas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $komoditas = Komoditas::findOrFail($id);
        $kategori = KategoriKomoditas::all();
        return view('user.komoditas.edit', compact(
            'komoditas',
            'kategori',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Komoditas  $Komoditas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Komoditas $Komoditas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Komoditas  $Komoditas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komoditas $Komoditas)
    {
        //
    }
}
