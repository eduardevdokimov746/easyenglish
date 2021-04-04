<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDictionariesTable extends Migration
{
    public function up()
    {
        Schema::create('dictionaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('english_word_id');
            $table->unsignedBigInteger('rus_translate_id');

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('english_word_id')
                ->on('english_words')
                ->references('id')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('rus_translate_id')
                ->on('rus_translate_words')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dictionaries');
    }
}
