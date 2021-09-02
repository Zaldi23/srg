<?php

use App\KategoriKomoditas;
use Illuminate\Database\Seeder;

class KategoriKomoditasSeeder extends Seeder
{
    private $data = [
        [
            'keterangan' => 'Cabai'
        ],
    ];

    public function run()
    {
        collect($this->data)
            ->map(function (array $data) {
                $kategori = new KategoriKomoditas(
                    [
                        'keterangan' => $data['keterangan'],
                    ]
                );
                $kategori->save();
            })
        ;
    }
}
