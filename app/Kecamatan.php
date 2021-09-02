<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $guarded = [];

    public function desa()
    {
        return $this->hasMany(Desa::class);
    }
}
