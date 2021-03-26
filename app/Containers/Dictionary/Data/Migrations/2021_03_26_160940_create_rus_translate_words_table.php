<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRusTranslateWordsTable extends Migration
{
    public function up()
    {
        Schema::create('rus_translate_words', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('english_word_id');
            $table->string('translate');
            $table->unsignedInteger('count_add')->default(0);
            $table->softDeletes();

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('no action')
                ->onDelete('no action');

            $table->foreign('english_word_id')
                ->on('english_words')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rus_translate_words');
    }
}
