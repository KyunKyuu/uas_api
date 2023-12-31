<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('keranjangs', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('produk_id');
    $table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade');
    $table->integer('jumlah');
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
        Schema::dropIfExists('keranjangs');
    }
}
