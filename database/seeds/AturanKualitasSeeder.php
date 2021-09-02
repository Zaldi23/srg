<?php

use App\AturanKualitas;
use Illuminate\Database\Seeder;

class AturanKualitasSeeder extends Seeder
{
    private $data = [
        [
            'keterangan' => 'Warna',
            'presentase' => 0.5,
        ],
        [
            'keterangan' => 'Kesegaran',
            'presentase' => 0.5,
        ],
    ];

    public function run()
    {
        collect($this->data)
            ->map(function (array $data) {
                $aturan = new AturanKualitas(
                    [
                        'keterangan' => $data['keterangan'],
                        'presentase' => $data['presentase'],
                    ]
                );
                $aturan->save();
            })
        ;
    }
}
