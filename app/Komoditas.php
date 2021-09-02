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

    public function kategori_komoditas()
    {
        return $this->belongsTo(KategoriKomoditas::class);
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class);
    }

    public function aturan_kualitas()
    {
        return $this->belongsToMany(AturanKualitas::class);
    }
}
