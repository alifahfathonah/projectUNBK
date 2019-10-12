<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMulaiUjianModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mulai_ujian_models', function (Blueprint $table) {
            $table->bigIncrements('id_mulai_ujian');
            $table->integer('id_ujian')->usigned();
            $table->integer('id_siswa')->usigned();
            $table->integer('id_kelas')->usigned();
            $table->date('tgl_ujian');
            $table->integer('alokasi_waktu')->usigned();
            $table->time('waktu_mulai');
            $table->time('waktu_selesai')->nullable();
            $table->dateTime('batas_waktu');
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
        Schema::dropIfExists('mulai_ujian_models');
    }
}
