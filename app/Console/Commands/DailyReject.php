<?php

namespace App\Console\Commands;

use App\Komoditas;
use Illuminate\Console\Command;

class DailyReject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reject:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menolak komoditas petani jika pengelola gudang tidak memproses dalam waktu 1 hari';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $komoditas = Komoditas::where('status_pengajuan',1)->get();

        foreach ($komoditas as $item) {
            $item->status_pengajuan = 2;
            $item->save();
        }

        $this->info('Successfully rejected.');
    }
}
