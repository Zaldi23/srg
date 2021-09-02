<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    protected $guarded = [];

    public function komoditas()
    {
        return $this->hasMany(Komoditas::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
