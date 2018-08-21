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
            $table->integer('id_kelas')->unsigned();
            $table->foreign('id_kelas')->references('id')->on('kelas');
            $table->text('namalengkap');
            $table->integer('phone');
            $table->integer('nisn');
            $table->timestamps();
        });

        DB::table('siswas')->insert([
            'id_kelas' => 12,
            'namalengkap' => "Sendi Dian Hadiwijaya",
            'phone' => '0895434312',
            'nisn' => '11083'
        ]);
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
