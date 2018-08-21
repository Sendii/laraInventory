<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('akses')->default('Users');
            $table->integer('id_outlet')->unsigned()->nullable();
            $table->foreign('id_outlet')->references('id')->on('pelanggans')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => "Sendii",
            'email' => "admin@gmail.com",
            'password' => bcrypt("888888"),
            'akses' => "Admin"
        ]);
        DB::table('users')->insert([
            'name' => "Sophiaa",
            'email' => "users@gmail.com",
            'password' => bcrypt("888888"),
            'akses' => "Users",
            'id_outlet' => "1"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
