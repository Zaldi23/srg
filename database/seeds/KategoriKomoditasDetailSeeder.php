<?php

use App\KategoriKomoditas;
use App\KategoriKomoditasDetail;
use Illuminate\Database\Seeder;

class KategoriKomoditasDetailSeeder extends Seeder
{
    private $data = [
        [
            'kategori' => 'Cabai',
            'keterangan' => 'Cabai Rawit'
        ],
        [
            'kategori' => 'Cabai',
            'keterangan' => 'Cabai Keriting'
        ],
        [
            'kategori' => 'Cabai',
            'keterangan' => 'Cabai Merah'
        ],
        [
            'kategori' => 'Cabai',
            'keterangan' => 'Cabai Putih'
        ],
        [
            'kategori' => 'Cabai',
            'keterangan' => 'Cabai Bubuk'
        ],
        [
            'kategori' => 'Cabai',
            'keterangan' => 'Cabai Paprika'
        ],
    ];

    public function run()
    {
        collect($this->data)
            ->map(function (array $data) {
                $kategori = KategoriKomoditas::where('keterangan', $data['kategori'])->firstOrFail();
                $kategoriDetail = new KategoriKomoditasDetail(
                    [
                        'keterangan' => $data['keterangan'],
                    ]
                );
                $kategoriDetail->kategori_komoditas()->associate($kategori);
                $kategoriDetail->save();
            })
        ;
    }
}
