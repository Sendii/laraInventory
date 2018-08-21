<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('kelas');
            $table->timestamps();
        });
        DB::table('kelas')->insert([
            'kelas' => "X-AK1"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "X-AK2"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XI-AK1"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XI-AK2"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XII-AK1"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XII-AK2"
        ]);

        DB::table('kelas')->insert([
            'kelas' => "X-AP1"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "X-AP2"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XI-AP1"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XI-AP2"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XII-AP1"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XII-AP2"
        ]);

        DB::table('kelas')->insert([
            'kelas' => "X-PM1"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "X-PM2"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XI-PM1"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XI-PM2"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XII-PM1"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XII-PM2"
        ]);

        DB::table('kelas')->insert([
            'kelas' => "X-RPL"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XI-RPL"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XII-RPL"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
