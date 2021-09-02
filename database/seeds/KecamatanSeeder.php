<?php

use App\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    private $data = [
        [
            'nama_kecamatan' => 'Adimulyo'
        ],
        [
            'nama_kecamatan' => 'Alian'
        ],
        [
            'nama_kecamatan' => 'Ambal'
        ],
        [
            'nama_kecamatan' => 'Ayah'
        ],
        [
            'nama_kecamatan' => 'Bonorowo'
        ],
        [
            'nama_kecamatan' => 'Buayan'
        ],
        [
            'nama_kecamatan' => 'Buluspesantren'
        ],
        [
            'nama_kecamatan' => 'Gombong'
        ],
        [
            'nama_kecamatan' => 'Karanganyar'
        ],
        [
            'nama_kecamatan' => 'Karanggayam'
        ],
        [
            'nama_kecamatan' => 'Karangsambung'
        ],
        [
            'nama_kecamatan' => 'Kebumen'
        ],
        [
            'nama_kecamatan' => 'Klirong'
        ],
        [
            'nama_kecamatan' => 'Kutowinangun'
        ],
        [
            'nama_kecamatan' => 'Kuwarasan'
        ],
        [
            'nama_kecamatan' => 'Mirit'
        ],
        [
            'nama_kecamatan' => 'Padureso'
        ],
        [
            'nama_kecamatan' => 'Pejagoan'
        ],
        [
            'nama_kecamatan' => 'Petanahan'
        ],
        [
            'nama_kecamatan' => 'Poncowarno'
        ],
        [
            'nama_kecamatan' => 'Prembun'
        ],
        [
            'nama_kecamatan' => 'Puring'
        ],
        [
            'nama_kecamatan' => 'Rowokele'
        ],
        [
            'nama_kecamatan' => 'Sadang'
        ],
        [
            'nama_kecamatan' => 'Sempor'
        ],
        [
            'nama_kecamatan' => 'Sruweng'
        ],
    ];

    public function run()
    {
        collect($this->data)
            ->map(function (array $data) {
                $kecamatan = new Kecamatan(
                    [
                        'nama_kecamatan' => $data['nama_kecamatan'],
                    ]
                );
                $kecamatan->save();
            })
        ;
    }
}
