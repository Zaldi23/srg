<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifikasiKualitas extends Model
{
    protected $guarded = [];

    public function komoditas()
    {
        return $this->belongsTo(Komoditas::class);
    }
}
