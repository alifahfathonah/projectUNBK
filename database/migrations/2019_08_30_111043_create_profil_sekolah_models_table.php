<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilSekolahModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_sekolah_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namasekolah');
            $table->string('tingkat');
            $table->string('provinsi');
            $table->string('kotaorkab');
            $table->string('npsn');
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
        Schema::dropIfExists('profil_sekolah_models');
    }
}
