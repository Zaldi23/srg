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
        return $this->komoditas()->where('status_pengajuan',3)->where('status', true);
    }

    public function komoditas_menunggu()
    {
        return $this->komoditas()->where('status_pengajuan',2)->where('status', true);
    }

    public function komoditas_diajukan()
    {
        return $this->komoditas()->where('status_pengajuan',1)->where('status', true);
    }

    public function komoditas_dihapus()
    {
        return $this->komoditas()->where('status', false);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function kelompok_tani()
    {
        return $this->belongsTo(KelompokTani::class);
    }

    
}
