<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasMOdelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_m_odels', function (Blueprint $table) {
            $table->bigIncrements('id_kelas');
            $table->string('jurusan');
            $table->integer('no_kelas')->usigned();
            $table->string('judul_kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas_m_odels');
    }
}
