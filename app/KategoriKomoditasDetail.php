<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriKomoditasDetail extends Model
{
    protected $guarded = [];

    public function kategori_komoditas()
    {
        return $this->belongsTo(KategoriKomoditas::class);
    }

    public function komoditas()
    {
        return $this->hasMany(Komoditas::class);
    }
}
