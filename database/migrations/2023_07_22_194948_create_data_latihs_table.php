<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataLatihsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_latihs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->integer('usia');
            $table->string('motorik_kasar');
            $table->string('motorik_halus');
            $table->string('kognitif_anak');
            $table->string('kemandirian');
            $table->string('kompetensi_dasar_akhlak_perilaku_sosial_emosi');
            $table->string('kompetensi_dasar_umum');
            $table->string('kesiapan');
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
        Schema::dropIfExists('data_latihs');
    }
}
