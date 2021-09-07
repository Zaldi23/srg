<?php

namespace App\Http\Controllers;

use App\Gudang;
use App\KategoriKomoditas;
use App\KategoriKomoditasDetail;
use App\Komoditas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class KomoditasController extends Controller
{
    public function jsonKomoditas()
    {
        switch (Auth::user()->role_id) {
            case 1:                         //PETANI
                $user_info_id = Auth::user()->user_info->id;

                return DataTables::of(Komoditas::where('user_info_id',$user_info_id)->with('kategori_komoditas_detail')->get())
                    ->addIndexColumn()
                    ->addColumn('status_pengajuan', function($row){
                        switch ($row->status_pengajuan) {
                            case 1:
                                $action = '<a class="btn btn-xs btn-secondary" href="#">Belum diperiksa</a>';
                                break;
                            case 2:
                                $action = '<a class="btn btn-xs btn-warning" href="#">Menunggu</a>';
                                break;
                            case 3:
                                $action = '<a class="btn btn-xs btn-success" href="#">Disetujui</a>';
                                break;
                            
                            default:
                                $action = '<a class="btn btn-xs btn-danger" href="#">Undefined</a>';
                                break;
                        }
                        
                        return $action;
                    })
                    ->addColumn('status_uji_kualitas', function($row){
                        switch ($row->status_uji_kualitas) {
                            case 1:
                                $action = '<a class="btn btn-xs btn-secondary" href="#">Belum diperiksa</a>';
                                break;
                            case 2:
                                $action = '<a class="btn btn-xs btn-info" href="#">Disetujui</a>';
                                break;
                            
                            default:
                                $action = '<a class="btn btn-xs btn-danger" href="#">Undefined</a>';
                                break;
                        }
                        
                        return $action;
                    })
                    ->addColumn('action', function($row){
                        $id = $row->id;

                        if ($row->status_pengajuan == 1) {
                            $action = '
                                <a class="btn btn-xs btn-info" href="komoditas/'.$id.'">Detail</a>
                                <a class="btn btn-xs btn-secondary" href="komoditas/'.$id.'/edit">Edit</a>
                                <a class="btn btn-xs btn-danger hapus" id="'.$id.'">Hapus</a>
                            ';
                        } elseif($row->status_pengajuan == 2) {
                            $action = '
                                <a class="btn btn-xs btn-secondary" href="komoditas/'.$id.'">Detail</a>
                            ';
                        }elseif($row->status_pengajuan == 3){
                            if ($row->status_uji_kualitas == 2) {
                                $action = '
                                    <a class="btn btn-xs btn-info" href="komoditas/'.$id.'">Detail</a>
                                    <a class="btn btn-xs btn-dark" href="komoditas/cetak-surat-mutu/'.$id.'">Cetak</a>
                                ';
                            }else{
                                $action = '
                                    <a class="btn btn-xs btn-info" href="komoditas/'.$id.'">Detail</a>
                                ';
                            }
                        }else{
                            $action = '
                                <a class="btn btn-xs btn-danger hapus" id="'.$id.'>Hapus</a>
                            ';
                        }
                        
                        return $action; 
                    })
                    ->rawColumns([
                        'action','status_pengajuan','status_uji_kualitas'
                    ])
                    ->make(true);
                break;
            case 2:                         //LPK
                # code...
                break;
            case 3:                         //PENGELOLA GUDANG
                return DataTables::of(Komoditas::with('kategori_komoditas_detail','user_info'))
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $id = $row->id;

                        if ($row->status_pengajuan == 1) {
                            $action = '
                                <a class="btn btn-xs btn-info" href="komoditas/'.$id.'">Detail</a>
                                <a class="btn btn-xs btn-danger hapus" id="'.$id.'">Hapus</a>
                            ';
                        } elseif($row->status_pengajuan == 2) {
                            $action = '
                                <a class="btn btn-xs btn-secondary" href="komoditas/'.$id.'">Detail</a>
                            ';
                        }elseif($row->status_pengajuan == 3){
                            if ($row->status_uji_kualitas == 2) {
                                $action = '
                                    <a class="btn btn-xs btn-info" href="komoditas/'.$id.'">Detail</a>
                                    <a class="btn btn-xs btn-dark" href="komoditas/cetak-surat-mutu/'.$id.'">Cetak</a>
                                ';
                            }else{
                                $action = '
                                    <a class="btn btn-xs btn-info" href="komoditas/'.$id.'">Detail</a>
                                ';
                            }
                        }else{
                            $action = '
                                <a class="btn btn-xs btn-danger hapus" id="'.$id.'>Hapus</a>
                            ';
                        }
                        
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

    public function getDetailKategoriKomoditas($id)
    {
        return json_encode(
            KategoriKomoditasDetail::where('kategori_komoditas_id',$id)->get()
        );
    }

    public function getKomoditasById($id)
    {
        $result = Komoditas::with('kategori_komoditas_detail','gudang')->where('id',$id)->first();
        return response()->json($result);
    }
    
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
    }

    public function create()
    {
        $kategori = KategoriKomoditas::all();
        return view('user.komoditas.create', compact(
            'kategori'
        ));
    }

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

    public function show($id)
    {
        $komoditas = Komoditas::findOrFail($id);

        return view('user.komoditas.show',compact(
            'komoditas'
        ));
    }

    public function edit($id)
    {
        $komoditas = Komoditas::findOrFail($id);
        if ($komoditas->status_pengajuan != 1) {
            return redirect()->back()->with('alert','Tidak bisa melakukan proses edit');
        }
        $kategori = KategoriKomoditas::all();
        return view('user.komoditas.edit', compact(
            'komoditas',
            'kategori',
        ));
    }

    public function update(Request $request, $id)
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

        $komoditas = Komoditas::findOrFail($id);
        $komoditas->harga_harapan = $request->harga;
        $komoditas->kuantitas = $request->kuantitas;
        $komoditas->kategori_komoditas_detail()->associate($detailKomoditas);
        $komoditas->user_info()->associate(Auth::user()->user_info);
        $saved = $komoditas->save();

        if ($saved) {
            return redirect()->route('komoditas.index')->with('alert','Ubah pengajuan komoditas '.$detailKomoditas->keterangan.' berhasil');
        }

        return redirect()->route('komoditas.index')->with('alert','Ubah pengajuan komoditas '.$detailKomoditas->keterangan.' gagal');
    }

    public function destroy($id)
    {
        $id = (int)$id;
        $komoditas = Komoditas::findOrFail($id);
        $deleted = $komoditas->delete();

        if ($deleted) {
            return redirect()->route('komoditas.index')->with('alert','Komoditas '.$komoditas->kategori_komoditas_detail->keterangan.' berhasil dihapus');
        }

        return redirect()->route('komoditas.index')->with('alert','Hapus pengajuan komoditas '.$komoditas->kategori_komoditas_detail->keterangan.' gagal');
    }

    public function penggudangan(Request $request)
    {
        request()->validate(
            [
                'desa' => 'required|numeric',
                'gudang' => 'required|numeric',
                'harga_jual' => 'required|numeric'
            ],
            [
                'required' => 'Harap isi pilih salah satu',
                'numeric' => 'Tidak valid',
            ]
        );
        $gudang = Gudang::findOrFail($request->gudang);
        if ($gudang->terisi < $gudang->kuota) {
            $komoditas = Komoditas::findOrFail($request->komoditas);
            
            $gudang->terisi = $gudang->terisi + $komoditas->kuantitas;
            $gudang->save();

            $komoditas->status_pengajuan = 3;
        }else{
            $komoditas = Komoditas::findOrFail($request->komoditas);
            $komoditas->status_pengajuan = 3;
        }

        $komoditas->harga_jual = $request->harga_jual;
        $komoditas->status_komoditas_di_gudang = 2;
        $komoditas->gudang()->associate($gudang);
        $saved = $komoditas->save();

        if ($saved) {
            return redirect()->route('komoditas.index')->with('alert','Komoditas '.$komoditas->kategori_komoditas_detail->keterangan.' berhasil masuk gudang');
        }

        return redirect()->route('komoditas.index')->with('alert','Komoditas '.$komoditas->kategori_komoditas_detail->keterangan.' gagal diproses');
    }

    public function manage(Request $request)
    {
        request()->validate(
            [
                'komoditas_id' => 'required|numeric'
            ],
            [
                'required' => 'Harap isi pilih salah satu',
                'numeric' => 'Tidak valid',
            ]
        );
        $komoditas = Komoditas::findOrFail($request->komoditas_id);
        $komoditas->status_komoditas_di_gudang = 3;
        
        $komoditas->gudang->terisi = $komoditas->gudang->terisi - $komoditas->kuantitas;
        
        $saved = $komoditas->gudang->save();
        if ($saved) {
            $saved = $komoditas->save();
    
            if ($saved) {
                return redirect()->back()->with('alert','Komoditas '.$komoditas->kategori_komoditas_detail->keterangan.' berhasil dikosongkang');
            }

            return redirect()->back()->with('alert','Komoditas '.$komoditas->kategori_komoditas_detail->keterangan.' gagal diproses');
        }

        return redirect()->back()->with('alert','Komoditas '.$komoditas->kategori_komoditas_detail->keterangan.' gagal diproses');
    }
}
