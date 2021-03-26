<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZadanieFiles extends Migration
{
    public function up()
    {
        Schema::create('zadanie_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zadanie_id');
            $table->string('title');
            $table->string('hash');
            $table->string('size');
            $table->string('ext')->default('none');
            $table->timestamps();

            $table->foreign('zadanie_id')
                ->on('zadanies')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('zadanie_files');
    }
}
