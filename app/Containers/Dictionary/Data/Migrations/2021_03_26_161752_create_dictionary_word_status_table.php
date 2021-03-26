<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDictionaryWordStatusTable extends Migration
{
    public function up()
    {
        Schema::create('dictionary_word_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dictionary_id');
            $table->set('status', ['process', 'finish'])->default('process');
            $table->tinyInteger('slovo_perevod')->default(0);
            $table->tinyInteger('perevod_slovo')->default(0);
            $table->tinyInteger('construct_words')->default(0);

            $table->foreign('dictionary_id')
                ->on('dictionaries')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dictionary_word_status');
    }
}
