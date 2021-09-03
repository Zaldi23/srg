<?php

use App\Desa;
use App\User;
use App\UserInfo;
use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    private $data = [
        [
            'nama' => 'Irfan Agus Tiawan',
            'luas_lahan' => 100,
            'desa' => 'Winong',
            'user' => 'irfan',
        ],
        [
            'nama' => 'Nawait',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'user' => 'agus',
        ],
    ];

    public function run()
    {
        collect($this->data)
            ->map(function (array $data) {
                $user = User::where('name',$data['user'])->firstOrFail();
                $desa = Desa::where('nama_desa',$data['desa'])->firstOrFail();

                $userInfo = new UserInfo(
                    [
                        'nama' => $data['nama'],
                        'luas_lahan' => $data['luas_lahan'],
                    ]
                );
                $userInfo->user()->associate($user);
                $userInfo->desa()->associate($desa);
                $userInfo->save();
            })
        ;
    }
}
