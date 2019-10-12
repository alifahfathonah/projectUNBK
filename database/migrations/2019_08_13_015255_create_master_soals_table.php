<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_soals', function (Blueprint $table) {
            $table->bigIncrements('id_soal');
            $table->integer('no_soal')->usigned();
            $table->integer('id_ujian')->usigned();
            $table->integer('id_semester')->usigned();
            $table->integer('type')->usigned();
            $table->integer('jenis')->usigned();
            $table->longText('soal');
            $table->longText('keterangan')->nullable();
            $table->longText('pil_a');
            $table->longText('pil_b');
            $table->longText('pil_c');
            $table->longText('pil_d');
            $table->longText('pil_e');
            $table->longText('tingkat');
            $table->longText('jawaban');
            $table->string('skor');
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
        Schema::dropIfExists('master_soals');
    }
}
