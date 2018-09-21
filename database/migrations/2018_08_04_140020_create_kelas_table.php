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
            $table->string('walikelas');
            $table->timestamps();
        });
        DB::table('kelas')->insert([
            'kelas' => "Manayaa",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "X-AK1",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "X-AK2",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XI-AK1",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XI-AK2",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XII-AK1",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XII-AK2",
            'walikelas' => "Bu siapa"
        ]);

        DB::table('kelas')->insert([
            'kelas' => "X-AP1",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "X-AP2",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XI-AP1",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XI-AP2",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XII-AP1",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XII-AP2",
            'walikelas' => "Bu siapa"
        ]);

        DB::table('kelas')->insert([
            'kelas' => "X-PM1",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "X-PM2",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XI-PM1",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XI-PM2",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XII-PM1",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XII-PM2",
            'walikelas' => "Bu siapa"
        ]);

        DB::table('kelas')->insert([
            'kelas' => "X-RPL",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XI-RPL",
            'walikelas' => "Bu siapa"
        ]);
        DB::table('kelas')->insert([
            'kelas' => "XII-RPL",
            'walikelas' => "Bu siapa"
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
