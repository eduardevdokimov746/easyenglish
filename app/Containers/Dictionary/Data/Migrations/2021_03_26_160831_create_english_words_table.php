<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnglishWordsTable extends Migration
{
    public function up()
    {
        Schema::create('english_words', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('word')->unique();

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('no action')
                ->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('english_words');
    }
}
