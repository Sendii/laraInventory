<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangRusakHsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Data barang yang rusak atau hilang
        Schema::create('barang_rusak_hs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_siswa')->unsigned();
            $table->foreign('id_siswa')->references('id')->on('siswas');
            $table->integer('id_barang')->unsigned();
            $table->foreign('id_barang')->references('id')->on('barangs');
            $table->integer('id_peminjaman')->unsigned();
            $table->foreign('id_peminjaman')->references('id')->on('peminjamans');
            $table->string('kode_barang');
            $table->integer('jumlah_brg');
            $table->text('keterangan')->enum(['Rusak', 'Hilang']);
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
        Schema::dropIfExists('barang_rusak_hs');
    }
}
