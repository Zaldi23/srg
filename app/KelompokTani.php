<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelompokTani extends Model
{
    protected $guarded = [];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function user_info()
    {
        return $this->hasMany(UserInfo::class);
    }
}
