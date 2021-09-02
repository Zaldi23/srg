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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
