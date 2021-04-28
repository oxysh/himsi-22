<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanCurhatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan_curhats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curhat_id');
            $table->longText('chat');
            $table->boolean('psdm')->default(false);
            $table->timestamps();

            $table->foreign('curhat_id')->references('id')->on('curhats')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesan_curhats');
    }
}
