<?php

use App\Desa;
use App\KelompokTani;
use Illuminate\Database\Seeder;

class KelompokTaniSeeder extends Seeder
{
    private $data = [
        [
            'keterangan' => 'Evos',
            'desa' => 'Mirit'
        ],
    ];

    public function run()
    {
        collect($this->data)
            ->map(function (array $data) {
                $desa = Desa::where('nama_desa',$data['desa'])->firstOrFail();

                $ktani = new KelompokTani(
                    [
                        'keterangan' => $data['keterangan'],
                    ]
                );
                $ktani->desa()->associate($desa);
                $ktani->save();
            })
        ;
    }
}
