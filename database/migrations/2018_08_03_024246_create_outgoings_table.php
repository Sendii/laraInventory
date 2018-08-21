<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutgoingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasibarang', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nm_supplier');
            $table->string('status')->enum(['Bagus', 'Tidak Bagus'])->default('Bagus');
            $table->integer('banyak_brg')->nullable();
            $table->text('kode_barang');
            $table->text('nama_barang');
            $table->integer('qty');
            $table->string('keterangan')->enum(['Diterima', 'Ditolak']) ->nullable();
            $table->text('keterangantolak')->nullable();
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
        Schema::dropIfExists('outgoings');
    }
}
