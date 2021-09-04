<?php

namespace App\Http\Controllers;

use App\KategoriKomoditas;
use App\KategoriKomoditasDetail;
use App\Komoditas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomoditasController extends Controller
{
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
        $komoditas = Auth::user()->user_info->komoditas_disetujui;
        dd($komoditas);
        return view('user.komoditas.index', compact(
            'komoditas'
        )); 
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
    public function edit(Komoditas $Komoditas)
    {
        //
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
