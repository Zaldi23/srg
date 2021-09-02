<?php

namespace App\Http\Controllers;

use App\KategoriKomoditas;
use App\KategoriKomoditasDetail;
use App\Komoditas;
use Illuminate\Http\Request;

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
     public function index(){
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriKomoditas::all();
        return view ('komoditas.create', compact(
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
        //
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
