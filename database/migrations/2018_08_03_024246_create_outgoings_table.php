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
            $table->integer('id_supplier')->unsigned();
            $table->foreign('id_supplier')->references('id')->on('suppliers');
            $table->integer('id_pelanggan')->unsigned();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('cascade');
            $table->text('kode_barang');
            $table->text('nama_barang');
            $table->integer('qty');
            $table->string('keterangan')->enum(['Masuk', 'Keluar']) ->nullable();
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
