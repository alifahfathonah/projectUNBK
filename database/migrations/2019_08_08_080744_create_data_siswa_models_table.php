<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataSiswaModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_siswa_models', function (Blueprint $table) {
            $table->bigIncrements('id_siswa');
            $table->integer('id_periode')->usigned();
            $table->integer('id_kelas')->usigned();
            $table->string('nis');
            $table->string('noujian');
            $table->string('namadepan');
            $table->string('namabelakang');
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_siswa_models');
    }
}
