<?php

use App\Desa;
use App\Kecamatan;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    private $data = [
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Karanggede'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Kertodeso'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Krubungan'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Lembupurwo'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Mangunranan'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Mirit'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Miritpetikusan'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Ngabeyan'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Patukgawemulyo'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Patukrejomulyo'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Pekutan'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Rowo'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Sarwogadung'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Selotumpeng'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Singoyudan'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Sitibentar'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Tlogodepok'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Tlogopragoto'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Wergonayan'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Winong'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Wirogaten'
        ],
        [
            'nama_kecamatan' => 'Mirit',
            'nama_desa' => 'Wiromartan'
        ],
    ];

    public function run()
    {
        collect($this->data)
            ->map(function (array $data) {
                $kecamatan = Kecamatan::where('nama_kecamatan',$data['nama_kecamatan'])->firstOrFail();
                $desa = new Desa(
                    [
                        'nama_desa' => $data['nama_desa'],
                    ]
                );
                $desa->kecamatan()->associate($kecamatan);
                $desa->save();
            })
        ;
    }
}
