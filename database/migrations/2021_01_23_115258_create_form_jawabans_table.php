<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_jawabans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pertanyaan_id');
            $table->unsignedBigInteger('penjawab_id');
            $table->text('jawaban')->nullable();
            $table->timestamps();

            $table->foreign('pertanyaan_id')->references('id')->on('form_pertanyaans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('penjawab_id')->references('id')->on('form_penjawabs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_jawabans');
    }
}
