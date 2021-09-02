<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriKomoditasDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_komoditas_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_komoditas_id');
            $table->foreign('kategori_komoditas_id')->references('id')->on('kategori_komoditas');
            $table->string('keterangan');
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
        Schema::dropIfExists('kategori_komoditas_details');
    }
}
