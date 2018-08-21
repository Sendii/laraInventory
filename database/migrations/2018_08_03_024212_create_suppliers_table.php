<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fixsupplier');
            $table->text('nm_supplier');
            $table->text('alamat');
            $table->integer('telepon');
            $table->timestamps();
        });

        DB::table('suppliers')->insert([
            'fixsupplier' => date('Y-m-d'),
            'nm_supplier' => "Supplier ABC",
            'alamat' => "Jalan jalan yukk",
            'telepon' => '0894949'
        ]);
        DB::table('suppliers')->insert([
            'fixsupplier' => date('Y-m-d'),
            'nm_supplier' => "Supplier BCD",
            'alamat' => "Jalan yukk",
            'telepon' => '08999'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
