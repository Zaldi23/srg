<?php

use App\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    private $data = [
        [
            'nama_kecamatan' => 'Ambal'
        ],
        [
            'nama_kecamatan' => 'Buluspesantren'
        ],
        [
            'nama_kecamatan' => 'Karanganyar'
        ],
        [
            'nama_kecamatan' => 'Mirit'
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
