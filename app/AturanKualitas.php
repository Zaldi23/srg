<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AturanKualitas extends Model
{
    protected $guarded  = [];

    public function komoditas()
    {
        return $this->belongsToMany(Komoditas::class);
    }
}
