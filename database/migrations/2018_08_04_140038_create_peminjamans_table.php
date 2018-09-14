<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_siswa')->unsigned();
            $table->foreign('id_siswa')->references('id')->on('siswas');
            $table->integer('id_barang')->unsigned();
            $table->foreign('id_barang')->references('id')->on('barangs');
            $table->text('nama_barang');
            $table->integer('jumlahminjam');
            $table->text('status')->enum(["Meminjam" ,"Sudah Dikembalikan"]);
            $table->text('keterangan')->enum(["Rusak", "Bagus"]);
            $table->string('waktukembali')->nullable();
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
        Schema::dropIfExists('peminjamans');
    }
}
