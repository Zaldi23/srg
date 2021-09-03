<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriKomoditas extends Model
{
    protected $guarded = [];

    public function kategori_komoditas_detail()
    {
        return $this->hasMany(KategoriKomoditasDetail::class);
    }
}
