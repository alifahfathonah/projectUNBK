<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawab_models', function (Blueprint $table) {
            $table->bigIncrements('id_jawaban');
            $table->integer('id_ujian')->usigned();
            $table->integer('id_siswa')->usigned();
            $table->integer('no_soal')->usigned();
            $table->string('jawaban');
            $table->string('skor_jawab');
            $table->string('kondisi');
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
        Schema::dropIfExists('jawab_models');
    }
}
