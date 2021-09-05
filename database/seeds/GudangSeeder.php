<?php

use App\Desa;
use App\Gudang;
use Illuminate\Database\Seeder;

class GudangSeeder extends Seeder
{
    private $data = [
        [
            'nama_gudang' => 'Maju Jaya',
            'kuota' => 100,
            'nama_desa' => 'Mirit',
        ],
    ];

    public function run()
    {
        collect($this->data)
            ->map(function (array $data) {
                $desa = Desa::where('nama_desa',$data['nama_desa'])->firstOrFail();
                $gudang = new Gudang(
                    [
                        'nama_gudang' => $data['nama_gudang'],
                        'kuota' => $data['kuota'],
                    ]
                );
                $gudang->desa()->associate($desa);
                $gudang->save();
            })
        ;
    }
}
