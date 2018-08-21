<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fixpelanggans');
            $table->string('kode_outlet')->unique();
            $table->text('nama_outlet');
            $table->text('alamat');
            $table->integer('telepon');
            $table->integer('npwp');
            $table->text('email');
            $table->timestamps();
        });

        DB::table('pelanggans')->insert([
            'fixpelanggans' => date('Y-m-d'),
            'kode_outlet' => str_random(8),
            'nama_outlet' => "PT Mantaff",
            'alamat' => "jl mayjen sutoyo",
            'telepon' => "0895959534",
            'npwp' => "88888",
            'email' => "ptmantaff@gmail.com"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggans');
    }
}
