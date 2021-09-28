<?php

use App\Desa;
use App\User;
use App\UserGudang;
use Illuminate\Database\Seeder;

class UserGudangSeeder extends Seeder
{
    private $data = [
        [
            'desa' => 'Mirit',
            'user' => 'desamirit',
        ],
    ];

    public function run()
    {
        collect($this->data)
            ->map(function (array $data) {
                $user = User::where('name',$data['user'])->firstOrFail();
                $desa = Desa::where('nama_desa',$data['desa'])->firstOrFail();
                
                $userGudang = new UserGudang();
                $userGudang->user()->associate($user);
                $userGudang->desa()->associate($desa);
                $userGudang->save();
            })
        ;
    }
}
