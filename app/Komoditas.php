<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    protected $guarded = [];

    public function user_info()
    {
        return $this->belongsTo(UserInfo::class);
    }

    public function kategori_komoditas_detail()
    {
        return $this->belongsTo(KategoriKomoditasDetail::class);
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class);
    }

    public function verifikasi_kualitas()
    {
        return $this->hasOne(VerifikasiKualitas::class);
    }
}
