<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $guarded = [];

    public function komoditas()
    {
        return $this->hasMany(Komoditas::class);
    }

    public function komoditas_disetujui()
    {
        return $this->komoditas()->where('status',3);
    }

    public function komoditas_menunggu()
    {
        return $this->komoditas()->where('status',2);
    }

    public function komoditas_diajukan()
    {
        return $this->komoditas()->where('status',1);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
