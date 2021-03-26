<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZadanieLinks extends Migration
{
    public function up()
    {
        Schema::create('zadanie_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zadanie_id');
            $table->string('title');
            $table->string('url');
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
        Schema::dropIfExists('zadanie_links');
    }
}
