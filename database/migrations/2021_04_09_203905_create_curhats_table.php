<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurhatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curhats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('token');
            $table->text('quote')->nullable(true);
            $table->boolean('selesai')->default(false);
            $table->boolean('dibalas')->default(false);
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
        Schema::dropIfExists('curhats');
    }
}
