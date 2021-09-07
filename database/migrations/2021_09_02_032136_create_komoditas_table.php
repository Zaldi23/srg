<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomoditasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komoditas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_info_id');
            $table->foreign('user_info_id')->references('id')->on('user_infos');
            $table->decimal('harga_harapan',15,2);
            $table->double('kuantitas');

            $table->unsignedBigInteger('kategori_komoditas_detail_id');
            $table->foreign('kategori_komoditas_detail_id')->references('id')->on('kategori_komoditas_details');

            $table->decimal('harga_jual',15,2)->nullable();
            $table->integer('status_pengajuan')->default(1);
            $table->integer('status_uji_kualitas')->default(1);
            $table->unsignedBigInteger('gudang_id')->nullable();
            $table->foreign('gudang_id')->references('id')->on('gudangs');
            $table->integer('status_komoditas_di_gudang')->default(1);
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
        Schema::dropIfExists('komoditas');
    }
}
