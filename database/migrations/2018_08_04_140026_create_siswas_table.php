<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('nis')->nullable();
            $table->text('nohp')->nullable();
            $table->text('nik')->nullable();
            $table->text('nisn')->nullable();
            $table->text('nama')->nullable();
            $table->integer('id_kelas')->unsigned();
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->text('jenkel')->nullable();
            $table->string('tempat')->nullable();
            $table->string('tanggallahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('namaayah')->nullable();
            $table->string('namaortu')->nullable();
            $table->string('namaibu')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nomorijazah')->nullable();
            $table->string('tahun')->nullable();
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
