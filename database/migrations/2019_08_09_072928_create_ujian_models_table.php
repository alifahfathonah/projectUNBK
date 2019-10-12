<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjianModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian_models', function (Blueprint $table) {
            $table->bigIncrements('id_ujian');
            $table->integer('id_mata_pelajaran')->usigned();
            $table->date('tgl_ujian');
            $table->string('waktu_ujian');
            $table->string('paket_ujian');
            $table->integer('alokasi_waktu')->usigned();
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
        Schema::dropIfExists('ujian_models');
    }
}
