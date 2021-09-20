<?php

use App\AturanMutu;
use Illuminate\Database\Seeder;

class AturanMutuSeeder extends Seeder
{
    private $data = [
        [
            'total_poin_min' => 0,
            'total_poin_max' => 7,
            'keterangan' => 'Mutu III',
        ],
        [
            'total_poin_min' => 8,
            'total_poin_max' => 13,
            'keterangan' => 'Mutu II',
        ],
        [
            'total_poin_min' => 14,
            'total_poin_max' => 20,
            'keterangan' => 'Mutu I',
        ],
    ];

    public function run()
    {
        collect($this->data)
            ->map(function (array $data) {
                $aturan = new AturanMutu(
                    [
                        'total_poin_min' => $data['total_poin_min'],
                        'total_poin_max' => $data['total_poin_max'],
                        'keterangan' => $data['keterangan'],
                    ]
                );
                $aturan->save();
            })
        ;
    }
}
