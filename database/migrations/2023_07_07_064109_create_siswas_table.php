<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->integer('usia');
            $table->string('tmp_lahir');
            $table->string('tgl_lahir');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('agama');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
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
        Schema::dropIfExists('siswas');
    }
}
