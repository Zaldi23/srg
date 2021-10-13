<?php

use App\Desa;
use App\KelompokTani;
use App\User;
use App\UserInfo;
use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    private $data = [
        [
            'nama' => 'Irfan Agus Tiawan',
            'luas_lahan' => 100,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
            'user' => 'irfan',
        ],
        [
            'nama' => 'Nawait',
            'luas_lahan' => 150,
            'desa' => 'Rowo',
            'kelompok_tani' => 'Evos',
            'user' => 'agus',
        ],
        [
            'nama' => 'mustofa',
            'user' => 'mustofa',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'ngaiso',
            'user' => 'ngaiso',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'suyoto',
            'user' => 'suyoto',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'tarwan',
            'user' => 'tarwan',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'sutrisno',
            'user' => 'sutrisno',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'sugiyono',
            'user' => 'sugiyono',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'den',
            'user' => 'den',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'wahid',
            'user' => 'wahid',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'lekas',
            'user' => 'lekas',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'wakidin',
            'user' => 'wakidin',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'sunar',
            'user' => 'sunar',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'rojingun',
            'user' => 'rojingun',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'yuli',
            'user' => 'yuli',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'ipin',
            'user' => 'ipin',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'sugi',
            'user' => 'sugi',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'soleh',
            'user' => 'soleh',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'amir',
            'user' => 'amir',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'sabar',
            'user' => 'sabar',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'wagino',
            'user' => 'wagino',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'arifyanto',
            'user' => 'arifyanto',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'wagiatno',
            'user' => 'wagiatno',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'paryanto',
            'user' => 'paryanto',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'harun',
            'user' => 'harun',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'puji',
            'user' => 'puji',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'riyadi',
            'user' => 'riyadi',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'toyibmustofa',
            'user' => 'toyibmustofa',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'pardi',
            'user' => 'pardi',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'jumadi',
            'user' => 'jumadi',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'eko',
            'user' => 'eko',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'yusuf',
            'user' => 'yusuf',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'penjol',
            'user' => 'penjol',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'pairah',
            'user' => 'pairah',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'sangid',
            'user' => 'sangid',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'suyat',
            'user' => 'suyat',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'ahmad',
            'user' => 'ahmad',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'saipul',
            'user' => 'saipul',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'kipli',
            'user' => 'kipli',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'iwan',
            'user' => 'iwan',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'bejo',
            'user' => 'bejo',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'subur',
            'user' => 'subur',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'warso',
            'user' => 'warso',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'wahid2',
            'user' => 'wahid2',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'rajim',
            'user' => 'rajim',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'hamid',
            'user' => 'hamid',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'ngayit',
            'user' => 'ngayit',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'muji',
            'user' => 'muji',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'tohirin',
            'user' => 'tohirin',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'daryanto',
            'user' => 'daryanto',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'manijo',
            'user' => 'manijo',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        [
            'nama' => 'marno',
            'user' => 'marno',
            'luas_lahan' => 150,
            'desa' => 'Mirit',
            'kelompok_tani' => 'Evos',
        ],
        
    ];

    public function run()
    {
        collect($this->data)
            ->map(function (array $data) {
                $user = User::where('name',$data['user'])->firstOrFail();
                $desa = Desa::where('nama_desa',$data['desa'])->firstOrFail();
                $kelompokTani = KelompokTani::where('keterangan', $data['kelompok_tani'])->firstOrFail();

                $userInfo = new UserInfo(
                    [
                        'nama' => $data['nama'],
                        'luas_lahan' => $data['luas_lahan'],
                    ]
                );
                $userInfo->kelompok_tani()->associate($kelompokTani);
                $userInfo->user()->associate($user);
                $userInfo->desa()->associate($desa);
                $userInfo->save();
            })
        ;
    }
}
