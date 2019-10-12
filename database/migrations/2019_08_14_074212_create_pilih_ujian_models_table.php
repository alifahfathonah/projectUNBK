<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePilihUjianModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilih_ujian_models', function (Blueprint $table) {
            $table->bigIncrements('id_pilih');
            $table->integer('id_ujian')->usigned();
            $table->integer('id_mata_pelajaran')->usigned();
            $table->integer('id_kelas')->usigned();
            $table->integer('id_siswa')->usigned();
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
        Schema::dropIfExists('pilih_ujian_models');
    }
}
