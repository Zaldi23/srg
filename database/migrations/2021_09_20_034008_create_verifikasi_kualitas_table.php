<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifikasiKualitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifikasi_kualitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('komoditas_id')->constrained();
            $table->double('warna');
            $table->double('seragam');
            $table->double('panjang');
            $table->double('pangkal');
            $table->double('kotor');
            $table->double('busuk');
            $table->integer('total_poin');
            $table->string('mutu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verifikasi_kualitas');
    }
}
