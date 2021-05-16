<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnglishWordSoundsTable extends Migration
{
    public function up()
    {
        Schema::create('english_word_sounds', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('english_word_id');
            $table->string('normal');
            $table->string('slow');

            $table->foreign('english_word_id')
                ->on('english_words')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('english_word_sounds');
    }
}
