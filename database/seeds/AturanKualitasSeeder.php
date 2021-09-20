<?php

use App\AturanKualitas;
use Illuminate\Database\Seeder;

class AturanKualitasSeeder extends Seeder
{
    private $data = [
        [
            'keterangan' => 'warna',
            'nilai_min' => 0,
            'nilai_max' => 94,
            'poin' => 1,
        ],
        [
            'keterangan' => 'warna',
            'nilai_min' => 95,
            'nilai_max' => 100,
            'poin' => 3,
        ],
        [
            'keterangan' => 'seragam',
            'nilai_min' => 0,
            'nilai_max' => 95,
            'poin' => 1,
        ],
        [
            'keterangan' => 'seragam',
            'nilai_min' => 96,
            'nilai_max' => 97,
            'poin' => 2,
        ],
        [
            'keterangan' => 'seragam',
            'nilai_min' => 98,
            'nilai_max' => 100,
            'poin' => 3,
        ],
        [
            'keterangan' => 'panjang',
            'nilai_min' => 0,
            'nilai_max' => 8,
            'poin' => 1,
        ],
        [
            'keterangan' => 'panjang',
            'nilai_min' => 9,
            'nilai_max' => 11,
            'poin' => 2,
        ],
        [
            'keterangan' => 'panjang',
            'nilai_min' => 12,
            'nilai_max' => 20,
            'poin' => 3,
        ],
        [
            'keterangan' => 'pangkal',
            'nilai_min' => 0,
            'nilai_max' => 0.9,
            'poin' => 1,
        ],
        [
            'keterangan' => 'pangkal',
            'nilai_min' => 1.0,
            'nilai_max' => 1.3,
            'poin' => 2,
        ],
        [
            'keterangan' => 'pangkal',
            'nilai_min' => 1.4,
            'nilai_max' => 2.0,
            'poin' => 3,
        ],
        [
            'keterangan' => 'kotor',
            'nilai_min' => 3.0,
            'nilai_max' => 5.0,
            'poin' => 1,
        ],
        [
            'keterangan' => 'kotor',
            'nilai_min' => 1.1,
            'nilai_max' => 2.9,
            'poin' => 2,
        ],
        [
            'keterangan' => 'kotor',
            'nilai_min' => 0.0,
            'nilai_max' => 1.0,
            'poin' => 3,
        ],
        [
            'keterangan' => 'busuk',
            'nilai_min' => 0.0,
            'nilai_max' => 0.9,
            'poin' => 3,
        ],
        [
            'keterangan' => 'busuk',
            'nilai_min' => 1.0,
            'nilai_max' => 1.9,
            'poin' => 2,
        ],
        [
            'keterangan' => 'busuk',
            'nilai_min' => 2.0,
            'nilai_max' => 5.0,
            'poin' => 1,
        ],
    ];

    public function run()
    {
        collect($this->data)
            ->map(function (array $data) {
                $aturan = new AturanKualitas(
                    [
                        'keterangan' => $data['keterangan'],
                        'nilai_min' => $data['nilai_min'],
                        'nilai_max' => $data['nilai_max'],
                        'poin' => $data['poin'],
                    ]
                );
                $aturan->save();
            })
        ;
    }
}
